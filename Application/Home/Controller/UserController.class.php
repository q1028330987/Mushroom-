<?php


    namespace Home\Controller;

    use Think\Controller;

    class UserController extends Controller
    {

        /**
         * 这个方法是用来判断登录没有
         * @return [type] [description]
         */
        public function login()
        {   
            if(IS_POST){

                //先判断验证码是否正确
                
                if( I('post.code')!="" ){
                    $bool = $this->checkCode( I('post.code') );

                    if (!$bool ) {

                        $this->error('验证码错误');
                    }
                }

                $res =D('User')->loginUserData();

                if(!$res){



                    $this->error('用户名或者密码错误或者未激活帐户');

                }else{

                    // 登录成功去哪？
                    $this->redirect('Index/index');
                }
            }else{
                // dump($_SESSION);

                $this->display();

            }

        }


        /**
         * 这个方法是用来显示注册页面
         */
        public function register()
        {

            if(IS_GET){

                $this->display();

            }else if(IS_POST){

                $UserModel = D('User');

                if(!$UserModel->create()){

                    $this->error( $UserModel->getError() );

                    exit;
                }
                //调用处理用户数据的方法
                $res = $UserModel->addRegisterUser();

                if(!$res){

                    $this->error('服务器错误异常');exit;

                }

                $this->display('showEmail');
            }

        } 

        /**
         * [showEmail 这个方法是显示邮箱页面]
         * @return [type] [description]
         */
        public function showEmail()
        {
            if(IS_GET){

                $this->display();

            }else if(IS_POST){

                $bool = D('User')->userRegisterDetail();

                    
                if($bool==1){

                    $this->error('邮箱不能为空');

                }else if($bool==2){

                    $this->error('邮箱格式不对');

                }else if($bool==3){

                    $this->error('亲，该邮箱已经注册,请换个邮箱');

                }else if($bool==4){
                    exit;
                    $this->error('亲，邮箱发送失败，请联系管理员');

                }else{ 


                    $_SESSION["home1"]['email'] = $bool['email'];

                    //开启事务
                    M()->startTrans();

                    $res = M('user')->add($_SESSION['home1']); 

                    //为了避免垃圾数据，用户电话来关联
                    $userDetailData['phone'] =$_SESSION['home1']['phone']; 

                    $userInsertRes =M('user_detail')->add($userDetailData);


                    if( $res && $userInsertRes ){
                        
                        //事务提交
                        M()->commit();

                         $this->success('验证邮箱码已经发送，请前往邮箱进行验证',U('EmailSuccess'));
                       

                    }else{

                        //事务回滚
                        
                        M()->rollback();

                        $this->error('异常错误');
                    }
                   
                }
            }


        } 

        /**
         * 这个方法是用来显示邮箱发送成功页面
         */
        public function EmailSuccess()
        {       

            $this->display();

        }


        /**
         * ajax检验用户名是否存在
         */

        public function checkUser()
        {
            if(!IS_AJAX){
                
                $this->error('非礼勿视！');

            }
                $userphone = I('post.userphone');

                $map['phone'] = $userphone;

                $res = M('user')->field('phone')->where($map)->find();

                // dump($res);
                if($res){
                    echo 1;//手机号存在
                }else{
                    echo 2;//手机号不存在
                }
                exit;

        }



        /**
         * 验证用户点击过来的链接
         */
        
        public function checkLinkUser()
        {
            if(IS_GET){
                $email = I('get.verify_email');

                $time = I('get.verify_time');

                $time = substr($time, 0, strpos($time, $email));
                $a = date("Y-m-d H:i:s",$time);
                $b= date("Y-m-d H:i:s", time());
                dump($a);
                dump($b);
                exit;
                if( time()-$time > 24*60*60 ){

                    $this->error('亲，邮箱相连接已经失效了');

                    exit;
                }

                if( time()-$time < 24*60*60 ){

                        $userData = M('user')->select();

                        foreach($userData as $v){

                            if(md5($v['email']) == $email){
                                 $userId = $v['id'] ;
                            }
                            if($userId ==$v['id'] ){

                                $UserArr= $v;
                            }


                        }
                        if(!$UserArr){

                            $this->error('非法错误！别来玩');

                        }else{
                            //将密码保护起来
                            unset($UserArr['userpass']);

                            $_SESSION['home'] = $UserArr;

                            $map['status']=1;//表示邮箱已经激活

                            $data['phone'] = $UserArr['phone'];

                            $res = M('user')->where($data)->save($map);

                            if(!$res){

                                $this->error('邮箱还未激活');
                                exit;
                            }
                            // 这里调到首页保存登录状态
                            $this->success('验证成功',U('Index/index'));

                        }
                      

                }

            }

            
           
        }

        /**
         * 登录时的ajax的检验
         * @return [type] int
         */
        public function loginUserAjaxCheck()
        {

            $username = I('post.username');

             //手机号的正则匹配
            $preg = "/^1[34578]\d{9}$/";

             //邮箱的验证方式
            $preg1 = "/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/";

            if( preg_match($preg, $username) ){

                $map['phone']= $username;

                $res = M('user')->where($map)->find();

            }else if( preg_match($preg1, $username) ){

                $map1['email']= $username;

                $res = M('user')->where($map1)->find();

            }else{

                $map2['username']= $username;

                $res = M('user')->where($map2)->find();

            }

            if(!$res){
                echo 1;//用户名不存在;
            }

        }


        //这个方法是检验用户密码是否正确
        public function ajaxCheckPass()
        {
           $pass =  I('post.pass');

           $username = I('post.user');

             //手机号的正则匹配
            $preg = "/^1[34578]\d{9}$/";

             //邮箱的验证方式
            $preg1 = "/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/";

            if( preg_match($preg, $username) ){

                $map['phone']= $username;

                $res = M('user')->where($map)->find();


            }else if( preg_match($preg1, $username) ){

                $map1['email']= $username;

                $res = M('user')->where($map1)->find();

            }else{

                $map2['username']= $username;

                $res = M('user')->where($map2)->find();

            }

            $bool = password_verify($pass, $res['userpass']);



            if($bool){
                $this->ajaxReturn(1);//成功
            }else{
               
                 if( empty($_SESSION['errortimes']) ){

                        $_SESSION['errortimes']=2;

                    }else{
                        
                        $_SESSION['errortimes']++;
                    }

                ECHO $_SESSION['errortimes'];exit;


                 // $this->ajaxReturn(2);//失败表示用户密码不正或者密码不对
            }


        }



        /**
         * 这个方法是用来生成验证码的
         * @return 没有返回值
         */
        public function makeCode()
        {
            
            $config =    array(   
             'fontSize'    =>25,   
             // 验证码字体大小 
                'length' => 4,  
            //验证码宽度、高度
                'imageW'  =>180,
                'imageH' =>50,
                 // 验证码位数    
                 );
            $Verify = new \Think\Verify($config);

            $Verify->entry();

        }

        /**
         * 这个方法是用来ajax检验登录的验证码是否正确
         * @return [int] [1表示验证正确，0表示验证失败]
         */
        public function ajaxCheckLoginCode()
        {
            if(!IS_AJAX){

                $this->error('亲，别乱来！',1);

            }else if(IS_AJAX){

                $codeVal = I('post.codeVal');


                if( $this->checkCode($codeVal) ){

                    echo 1;

                }else{

                    echo 0;
                }
            }
        }

        /**
         * 这个方法是检验验证码是否正确的
         * @param  [string] $code [需要验证的验证码]
         * @return [bool]       [true表示验证成功，false表示验证失败]
         */
        public function checkCode($code)
        {


            $Verify = new \Think\Verify(array('reset'=>false) );

            if($Verify->check($code)){

                return  true;

            }else{

                return false;
            }


        }

        /**
         * 这个方法用来显示用户找回密码页面
         * 
         */
        public function forgetPass()
        {

            if(IS_GET){

                $this->display();

            }else if(IS_POST){


               $res = D('User')->forgetPassword();

               if($res){

                    //显示重置密码页面
                    $this->showEmialSendSuccess();

               }else{

                    $this->error('邮箱不存在');exit;
               }

            }

        }

        /**
         * 这个方法是用户ajax请求邮箱验证是否合法
         * @return int 1表示邮箱已经存在，0表示邮箱不存在
         */
        
        public function ajaxCheckEmail()
        {
            if(IS_AJAX){
                $email = I('post.email');

                $map['email'] = $email;

                $userData = M('user')->where($map)->find();

                if($userData){

                    echo 1;//邮箱存在

                }else{

                    echo 0;//邮箱不纯在
                }
            }
        }

        /**
         * 这个方法是用来显示邮箱发送成功
         * 
         */
        public function showEmialSendSuccess()
        {   

            $this->display('showEmialSendSuccess');



        }

        /**
         * 这个方法是用来处理改密码的控制器
         * 没有返回值
         */
        public function checkLinkUserResetPass()
        {
            if(IS_GET){

                $email = I('get.verify_email');

                $time = I('get.verify_time');

                $time = substr($time, 0, strpos($time, $email));

                if( time()-$time > 24*60*60 ){

                    $this->error('亲，邮箱连接已经失效了');

                    exit;
                }

                if( time()-$time < 24*60*60 ){

                        $userData = M('user')->select();

                        foreach($userData as $v){

                            if(md5($v['email']) == $email){

                                $userId = $v['id'] ;
                            }
                            if($userId ==$v['id'] ){

                                $UserArr= $v;
                            }

                        }

                        if(!$UserArr){

                            $this->error('非法错误！别来玩');

                        }else{
                                
                           // 调用这个方法去处理修改密码把用户ID传过去
                            $this->showUserResetPass( $UserArr['id'] );
                        }
                }

            }



        } 
    
        /**
         * 这个方法是用来显示用户修改密码的
         * @param  [int] $id [用户ID]
         *
         */
        public function showUserResetPass($id)
        {
            
           
            if(IS_POST){

                $id = I('post.id');

                $newpwd1 = I('post.newPwd1');

                $newpwd2 = I('post.newPwd2');

                if($newpwd2!=$newpwd1){

                    $this->error('两次密码不一致');

                }
                
                $res = D('User')->resetUserPass();

                if($res==1){

                    $this->error('亲，你被禁用了，不能修改密码');

                }else if($res==2){

                    $this->success('修改成功',U('login'));

                }else if($res==3){

                    $this->error('修改失败');

                }

            }else{
                $this->assign('id',$id);

                $this->display('showUserResetPass');  
            }


        }
        

        /**
         * 用户退出
         * 
         */
        public function userLogout()
        {

                if(IS_GET){

                     if(isset($_COOKIE[session_name()]))setCookie(session_name(),'',time()-1,'/');

                    // 摧毁垃圾文件
                    session_destroy($_SESSION['home']);
                    // 清除错误次数
                    $_SESSION['errortimes']=2;

                    $this->display('User/login');
                }

        }
        

    }