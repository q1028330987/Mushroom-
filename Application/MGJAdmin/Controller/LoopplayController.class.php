<?php

namespace MGJAdmin\Controller;

use Think\Controller;

class LoopplayController extends Controller
{

    public function showLoopPlay()
    {

        $list = D('Loopplay')->showPic();

        $this->assign('list', $list);

        $this->display('loop-play');
    }

    public function addPic()
    {

        if (IS_POST) {

            $res = D('Loopplay')->addPlay();
            
            if ($res) {

                echo "<script>parent.document.location.reload()</script>";
            } else {

                $this->error('添加失败');
            }

        } else {

            $list = D('Loopplay')->categoryList();

            $this->assign('list', $list);

            $this->display('add-pic');
        }
    }

    public function upload()
   {

        $upload = new \Think\Upload();

        $upload->maxsize   = 3145728;

        $upload->exts      = array('jpg', 'gif', 'png', 'jpeg', 'webp');

        $uplaod->savePath  = '';

        $upload->rootPath  = './Public/Uploads/';


        $info   =   $upload->upload();

        if(!$info) {

          $this->error($upload->getError());

          return false;

        }else{

            return $info;
        }
   }

   public function editPlay()
   {

        if (IS_POST) {

            $res = D('Loopplay')->editplay();

            if ( $res ) {

                echo "<script>parent.document.location.reload()</script>";                
            } else {

                $this->error('修改失败');
            }

        } else {

            $list = D('Loopplay')->categoryList();

            $one = D('Loopplay')->showOne();

            $this->assign('one', $one);
            
            $this->assign('list', $list);

            $this->display( 'edit-play' );
        }
   }

   public function ajaxDelete()
   {

        if (IS_AJAX) {

            $res = D('Loopplay')->deleteOne();

            if ($res) {

                $this->ajaxReturn(true);
            } else {

                $this->ajaxReturn(false);
            }
        } else {

            $this->ajaxReturn(false);
        }
   }
}