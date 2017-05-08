<?php


    namespace Home\Controller;

    use Think\Controller;

    class CommonController extends Controller
    {


        public function  __construct()
        {   

            // 重载父类的构造方法
            parent::__construct();

            // 如果用户没有登录直接去登录页面
            if( !$_SESSION['home'] ){

                $this->error('请登录！', U('User/login'));
                exit;
            }

        }

    }