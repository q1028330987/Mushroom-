<?php

namespace MGJAdmin\Controller;

use Think\Controller;

class LinkController extends Controller 
{
    public function index()
    {

        $list = D('Link')->showLinkList();

        $this->assign('list',$list);

        $this->display('index');

    }

    public function add()
    {
        $preg = "/(https|http):\/\/www\.(.*?)\.com|net|cn|org/";// 正则匹配
        
        if (IS_POST) {

        $res = preg_match($preg, I('post.url'));

            // dump($res);die;
            if ( !$res ) {

                $this->error('失败');
            }

        $list = D('Link')->addLink();

            if($list){

                $this->success('成功');

            }else{

                // dump(I('post.'));exit;
                $this->error('失败');

            }

            }else{

                $this->display('add');

            }
    }
    public function ajaxDeleteUser()
    {

        if(IS_AJAX){

           $del = D('Link')->del();

           if ($del){

            $this->ajaxReturn(1);

           }else{

            $this->ajaxReturn(2);

           }

        }else{

            $this->error('用AJAX方法');

        }
    }
    public function Complaint()
    {

        $this->display('Complaintfeedback');

    }

}