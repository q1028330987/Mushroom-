<?php

    namespace MGJAdmin\Controller;


    use Think\Controller;

    class CommonController extends Controller
    {

        public function __construct()
        {

            // 重载父类的方法
            parent::__construct();


                    if ( !$_SESSION['mgjAdmin'] ) {


                        $this->error('请登录！', U('Public/login'));

                    }


            //登录成功后还需要判断对某个方法是有权限


            $auth = new \Think\Auth;


            $uid = I('session.mgjAdmin')['id'];

            $name = MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME;

            /*// 调用check方法进行权限验证
            $bool = $auth->check($name, $uid);
            
            if ( !$bool ) {
                // 没有权限
                $this->display('Public/404');
                exit;
            }*/


        }

        //权限操作
         

    }
