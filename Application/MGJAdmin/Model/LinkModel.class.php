<?php

namespace MGJAdmin\Model;

use Think\Model;

class LinkModel extends Model
{  
    public function showLinkList()
    {
        return $this->select();
    }

    public function addLink()
    {

        $data['contents'] = I('post.name');

        $data['url']= I('post.url');   
        
        // dump($data);

        $tianjian = $this->add($data); 

        // echo $this->getLastSql();
        if( $tianjian )
        {

            return true;
        }else{

            return false;
        }
    }
    public function del()
    {
        return $this->where('id='.I('get.id'))->delete();

    }
        // $Page = new \Think\page\($count , 3);//每页显示条数

        // $show = $Page->show();//分页显示输出

        // $list = M('mgj')->limit($Page->firstRow.','.$Page->listRows)->select();

        // echo M('mgj')->getLastSql();
        // $this->assign('pageBth', $show);

        // $this->assign('list', $list);

        // $this->display('index')
    
} 
