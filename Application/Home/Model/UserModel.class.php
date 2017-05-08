<?php


    namespace Home\Model;

    use Think\Model;

    require 'class.phpmailer.php';

    require 'class.smtp.php';

    class UserModel extends Model
    {
            //映射
        protected $_map = array(       
            'userphone' =>'phone', 
            // 把表单中name映射到数据表的username字段       
            'userpassword'  =>'userpass',
             
        );

        protected  $_validate = array(    

            array('phone','require','手机号必须'), 

            array('phone','','手机号已经注册，可以直接登录',0,'unique',1),

            array('userpass','require','密码不能不能为空'),  

             array('userpassword1','require','确认密码不能不能为空'),  

             array('userpassword1','userpass','确认密码不正确',2,'confirm'),

             array('phone', '/^1[34578]\d{9}$/', '手机号格式不正确'),

             array('userpass', '/^(?![\d]+$)(?![a-zA-Z]+$)(?![!#$%^&*]+$)[\da-zA-Z!#$%^&*]{6,20}$/', '用户密码由6-20大小写英文字母、或数字或字符组合'),

            );
        
        // 用户注册的数据
        public function addRegisterUser()
        {   

            $data['phone'] = I('post.userphone');

            $data['username'] = "user_".I('post.userphone');

            $data['pass'] =  I('post.userpassword');

            $data['status']   = 2;//表示邮箱还未激活

            $data['addtime'] = time();

            $data['userpass'] = password_hash($data['pass'], PASSWORD_DEFAULT);


             unset($data['pass']);
            // 将用户信息存在session中
            $_SESSION['home1'] = $data;

            return $data;

        }  

        // 该方法是处理注册邮箱逻辑关系
        public function userRegisterDetail()
        {   

                $email = I('post.email');


                if(strlen($email)==0 || $email==""){

                    return 1;
                }

                $res = preg_match('/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/', $email);

                if(!$res){
                    return 2;
                }
                $map['email']=$email;

                $userData = $this->where($map)->find();

                //这里没有拿到数据
                if($userData){

                    return 3;//该邮箱已经注册

                }else{
                    // 调用邮箱发送方法
                    $data['pic'] = I('post.defaultPic');

                    $data['email'] = $email;
                    $content = '亲爱的用户：
                <a href="http://192.168.42.114/Project/thinkphp_3.2.3_full/index.php/Home/User/checkLinkUser/verify_email/'.md5($email).'/verify_time/'.time().md5($email).'">感谢你注册蘑菇街，请点击验证这个连接进行注册验证。验证有效时间为24小时</a>';


                    $res = $this->sendMail($email, $content);

                    if($res ==1){

                        return 4;//邮箱验证发送失败
                    }else{
                        return $data;//邮箱验证成功
                    }
                }

        }


        // 该方法是用来发送邮箱验证码的
        public function sendMail($email, $content)
        {
              $mail = new \PHPMailer;

                //$mail->SMTPDebug = 3;                               // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.aliyun.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'luozhengbo9850@aliyun.com';   

                $mail->CharSet ="UTF-8";

                // SMTP username
                $mail->Password = 'luozhengbo9850';                           // SMTP password
                $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 465;                                    // TCP port to connect to

                $mail->setFrom('luozhengbo9850@aliyun.com', '蘑菇街');
                $mail->addAddress($email, 'Joe User');     // Add a recipient
                // $mail->addAddress('ellen@example.com');               // Name is optional
                $mail->addReplyTo('luozhengbo9850@aliyun.com', '蘑菇街');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');

                // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                $mail->isHTML(true);                                  // Set email format to HTML

                $mail->Subject = '蘑菇街';
                $mail->Body    = $content;
                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                if(!$mail->send()) {
                    //输出错误信息
                    echo 'Mailer Error: '.$mail->ErrorInfo;
                    return 1;//邮件发送失败
                } else {
                        
                    return 2;//邮件发送成功
                }


        }


        // 接受用户登录过来的数据
        public function loginUserData()
        {
            if(IS_POST){

                $username = I('post.uname');

                 //手机号的正则匹配
                $preg = "/^1[34578]\d{9}$/";

                 //邮箱的验证方式
                $preg1 = "/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/";

                if( preg_match($preg, $username) ){

                    $map['phone']= $username;

                    $map['status'] =1;

                    $res = $this->where($map)->find();

                }else if( preg_match($preg1, $username) ){

                    $map1['email']= $username;

                    $map1['status'] =1;

                    $res = $this->where($map1)->find();

                }else{

                    $map2['username']= $username;

                    $map2['status'] =1;

                    $res = $this->where($map2)->find();

                }

                $userpass = I('post.pass');

                $bool = password_verify($userpass, $res['userpass']);


                if($res && $bool){
                    
                    unset($res['userpass']);

                    $_SESSION['home'] =$res;

                    return $res;

                }else{

                    return  false;
                }


            }

        }


        //这个方法是处理忘记密码的数据
        public function forgetPassword()
        {

            $email =  I('post.email') ;

            $map['email']= $email;

            $userData = $this->where($map)->find();

            if($userData){

                $content = '亲爱的用户：
                <a href="http://192.168.42.114/Project/thinkphp_3.2.3_full/index.php/Home/User/checkLinkUserResetPass/verify_email/'.md5($email).'/verify_time/'.time().md5($email).'">蘑菇街修改密码，请确保是个人操作，请点击验证这个连接进行验证修改密码。验证有效时间为24小时</a>';

                $res = $this->sendMail($email, $content);

                if($res==1){

                    return 1;

                }else if($res==2){

                    return $userData;
                }

            }else{

                return false;
            }
            
        }


        // 这个方法是用重置密码
        public function resetUserPass()
        {
            $map['id'] = I('post.id');

            $map['status'] =1;

            $newpwd1['userpass'] = I('post.newPwd1');

            $res = $this->where("status=2 and id={$map['id']}")->find();
            if($res){
                return 1;//你已经被禁用了
            }

            $newpwd1['userpass'] = password_hash($newpwd1['userpass'], PASSWORD_DEFAULT);
            
            $bool = $this->where($map)->save($newpwd1);

            if($bool){
                return 2;//密码修改成功
            }else{
                return 3;//修改失败
            }

        }

    }