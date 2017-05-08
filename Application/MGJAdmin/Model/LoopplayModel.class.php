<?php

namespace MGJAdmin\Model;

use Think\Model;

class LoopplayModel extends Model
{

    protected $tableName = 'slide_show';

    public function showPic()
    {

        return $this->select();
    }

    public function categoryList()
    {
        $list = M('category')->order('concat(path,id)')->select();

        foreach ($list as $k=>$v) {

            $arr = [];

            $num = substr_count($v['path'],',');

            $str = '┡'.str_repeat('>>', $num);

            $v['cname'] = $str.$v['cname'];

            $list[$k]['cname'] = $v['cname'];
            
        }

           return $list;
   }

   public function addPlay()
   {

        $res = A('Loopplay')->upload();

        if ($res) {

            $data['pic'] = $res['pic']['savepath'].$res['pic']['savename'];

            $data['tid'] = I('post.categoryparent');    

            $data['rgb'] = I('post.rgb');

            $bool = $this->add($data);

            if ($bool) {

                return $bool;
            } else {

                unlink('./Public/'.$data['pic']);
                return false;
            }
        } else {

            return false;
        }
    }

    public function showOne()
    {

        return $this->where( 'id='.I('get.id') )->find();
    }

    public function editplay()
    {

        if (empty($_FILES['pic']['name'])) {

            $data['tid'] = I('post.categoryparent');

            $data['rgb'] = I('post.rgb');

            return  $this->where('id='.I('post.id'))->save($data);
        }
    }

    public function deleteOne()
    {
        
        $data =  $this->where( 'id='.I('post.id') )->find();

        $res = unlink('./Public/Uploads/'.$data['pic']);

        if ($res) {

            return $this->where('id='.I('post.id'))->delete();

        } else{

            return false;
        }
    }

}