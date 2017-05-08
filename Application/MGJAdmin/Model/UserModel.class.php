<?php

    namespace MGJAdmin\Model;

    use Think\Model;


    class UserModel extends Model
    {
         protected $trueTableName ="mgj_administrators";

         // 数据映射
         protected $_map = array(  
          // 把表单中name映射到数据表的username字段   
               'username' =>'username',
                'userpassword'  =>'password', 
                // 把表单中的mail映射到数据表的email字段     
                );

        //检查用户名是否存在


       protected $_validate = array(   
            array('username','require','用户名必须'), 
             array('password','require','用户密码必须'), 
            // 都有时间都验证   
            array('username','checkName','帐号错误！',1,'callback'),  // 只在登录时候验证  
            // array('password','checkPwd','密码错误！',1,'callback'),
                // 只在登录时候验证 
        );


        public function  checkName()
        {

                $username = I('post.username');

                $map['username'] = $username;

                $res = $this->field('username')->where($map)->find();

                if(!$res){

                    return false;
                }   
        }


        // 处理登录
        public function signIn()
        {

            $data = I('post.'); 

            $map['username'] = $data['username'];

            $map['status'] = 1; 

            $userInfo = $this->where($map)->find();
            
            if(!$userInfo){

                return 1;//用户名不存在或者已经被禁用

            }
            //检查用户最近30分钟密码错误次数

            $res = $this->checkPassWrongTime($userInfo['id']);
            
                
            if(!$res){

                    return 30;//表示被禁用30分钟
            }


            $bool = password_verify($data['userpassword'], $userInfo['password']);

            if(!$bool){

                //记录密码错误次数
                $this->recordPassWrongTime($userInfo['id']);
                return 2;//密码不正确

                }else{

                // 登录成功，将用户信息保存在session中，不保存用户的密码
                unset($userInfo['password']);
                
                $_SESSION['mgjAdmin'] = $userInfo;

                return 3;//登录成功
            }

        } 


        //这个方法是用来检验用户近30 分钟错误的次数
        public function checkPassWrongTime($uid, $min=30, $wTime =4)
        {

            if ( empty($uid) ){

                    throw new \Exception('第一个参数不能为空');

            }

            $time = time();//当前时间

            $prevTime = time() - $min*60;

            //用户登录ip
            $ip = -ip2long( $_SERVER['REMOTE_ADDR'] ) ;


            $map['uid'] = $uid;

            $map['pass_wrong_time_status'] =2;//表示错误的

            $map['ipaddr'] = $ip;

            $map['longintime'] = array( 'between', $prevTime, $time );
            
            $worngData = M('user_lock')->field('id,uid,ipaddr,logintime,pass_wrong_time_status')->where($map)->select();


           //错误次数的统计
            $worngTimes = count($worngData);

            // 判断错误次数是否超过了限制次数
            if( $worngTimes > $wTime ){
                // 如果错误大于了还需要查询最后一次错误的时间
                
                $map['uid'] = $uid;

                $userLockTime = M('user_lock')->where($map)->order('logintime desc')->find();

                if( $userLockTime['logintime'] -time() < 60*30 ){
                    // 将状态修改为1，正确状态
                    $data['pass_wrong_time_status'] = 1;

                    M('user_lock')->where("uid=".$uid)->save($data);
                }
               
                return false;
                
                }else{

                return true;
            }

        }


        //这个方法是用来记录密码错误的次数的
        protected function recordPassWrongTime($uid)
        {

            //ip2lon()函数可以将IP地址转化为数字
            $ip = ip2long( $_SERVER['REMOTE_ADDR'] );

            //时间为时间戳
            $time = time();

            $data['uid'] =$uid;

            $data['ipaddr'] = $ip;

            $data['logintime'] = $time;

            //状态为2表示正常，没有被锁定
            $data['pass_wrong_time_status'] = 2;

            M('user_lock')->add($data);
             
        }



    }