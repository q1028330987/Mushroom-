<?php
    namespace MGJAdmin\Controller;

    use Think\Controller;


    class MemberController extends CommonController
    {
        public function index()
        {   

            $arr= D('Member')->showUser();

            $count = count($userData);

            $this->assign('total', $arr['total']);

            $this->assign('list', $arr['list']);

            $this->assign('show', $arr['show']);

            $this->display('list');

        }


        // ajax用户的停用
        public function memberStop()
        {
            if(IS_AJAX){
                $id = ( I('post.id'));

                $map['id'] =$id;

                $data['status']=2;

                $res = M('user')->where($map)->save($data);

                if($res){
                     echo 1;//停用
                 }else{
                    echo 2;//停用失败
                 }
               
            }
        }


        //ajax的启用
        public function memberStart()
        {

            if(IS_AJAX){
                $id = ( I('post.id'));

                $map['id'] =$id;

                $data['status']=1;

                $res = M('user')->where($map)->save($data);

                if($res){
                     echo 1;//启用
                 }else{
                     echo 2;//启用失败
                 }
               
            }
        }


    }