<?php

namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {       

        $index = D('Index');

        $loopPlayList = $index->showLoopPlay();

        $type = $index->showFirstType();

        $brand = $index->showBrand();

        $brandGoods = $index->showBrandGoods();

        $bigbrand = array_shift( $brandGoods );

        //第一张轮播图
        $first = array_shift($loopPlayList);

        $this->assign('first', $first);

        $this->assign('typeInfo', $typeInfo);

        $this->assign('brand', $brand);

        $this->assign('brandGoods', $brandGoods);

        $this->assign('bigbrand', $bigbrand);

        $this->assign('type', $type);

        $this->assign('loopplay', $loopPlayList);

        $this->display();
    }

    public function ajaxShowType()
    {

        if (IS_AJAX) {

            $Info['type'] = D('Index')->ajaxShowType();

            $Info['goods'] = D('Index')->ajaxShowGoods(6);

            $this->ajaxReturn($Info);
        } else {

            $this->error('请通过ajax访问');
        }
    }

    public function ajaxShowGoods()
    {

        if (IS_AJAX) {

            $goods = D('Index')->ajaxShowGoods(8);

            $this->ajaxReturn($goods);
        } else {

            $this->error('请通过ajax访问');
        }
    }

    public function randGoods()
    {
        if (IS_AJAX) {

            $goods = D('Index')->ajaxShowGoods(1, 'rand()')[0];

            $this->ajaxReturn($goods);
        } else {

            $this->error('请通过ajax访问');
        }
    }

    public function showGoods() 
    {

        $list = D('index')->showGoods( I('post.start') );

        if ($list == null) {

            $this->ajaxReturn(false);

        } else if( I('post.start') >= 200){

            $this->ajaxReturn(false);

        }

        $this->ajaxReturn($list);
    }
}