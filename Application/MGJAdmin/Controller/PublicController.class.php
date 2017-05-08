<?php


    namespace MGJAdmin\Controller;

    use Think\Controller;

    class PublicController extends Controller
    {
        /**
         * 
         */

        public function login()
        {

            if ( IS_GET ) {

                        $this->display('Index/login');

            }
        }
        

        public function signIn()
        {

           if(IS_POST){  

                if (!D('User')->create()){    
    
                    $this->error( D('User')->getError() );
                }

                //先判断验证码是否正确
                $bool = $this->checkCode( I('post.code') );

                if (!$bool ) {

                    $this->error('验证码错误');
                }

                $res = D('User')->signIn();

                if ( $res==1 ) {

                    $this->error('用户名不存在或者已经被禁用');
                   
                    exit;

                }else if($res==3){

                    // dump($_SESSION);exit;

                    $this->redirect('Index/index');
                    exit;

                }else if($res==2){

                    $this->error('用户名或者密码错误');
                    exit;

                }else if($res==30){
                    $this->error('亲，你已经被禁用30分钟，一会儿再来！');
                   
                    exit;

                }

            }
        }
        /**
         * 
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


        public function checkCode($code)
        {

            // 将array(‘reset’=>false)错误了之后不清session中验证码以便于在此验证 array('reset'=>false) 
            $Verify = new \Think\Verify(array('reset'=>false) );

            if($Verify->check($code)){

                return  true;

            }else{

                return false;
            }


        }   

        //这个方法负责ajax验证码的验证
        public function  checkAjaxVerify()
        {

            if(!IS_AJAX)$this->error('亲，别乱来！',1);

            $codeVal = I('post.codeVal');

            if( $this->checkCode($codeVal) ){
                echo 1;
            }else{
                echo 0;
            }
        }


        // 这个方法负责ajax验证
        public function ajaxCheckUser()
        {


                if(!IS_AJAX){

                    exit('亲，别乱来！');

                }else if(IS_AJAX){

                    $userval = I('post.userval');
                    // dump($userval);
                    $map['username'] = $userval;
                    $res = M('administrators')->where($map)->find();

                    if(!$res){
                        echo 1;//用户名不存在
                    }else{
                        echo 2;//有同样
                    }
                }
        } 


        //这个方法负责ajax的验证
        public function ajaxCheckCode()
        {

            if(IS_AJAX){

                $code =  I("post.code");

                $res = $this->checkCode($code);

                if($res){
                    $this->ajaxReturn(1); //成功
                }else{
                    $this->ajaxReturn(2);//失败
                }
            }
        }


        // 这个方法负责退出
        public function signOut()
        {

            // 先清除掉cookie，在清除掉session中的
            if(isset($_COOKIE[session_name()]))setCookie(session_name(),'',time()-1,'/');

            // 摧毁垃圾文件
            session_destroy($_SESSION['mgjadmin']);

            $this->display('Index/login');
        }


    }