<?php 

namespace Home\Controller;

use Think\Controller;

class ListController extends Controller
{

    public function showList()
    {

        $firstType = D('list')->showFirstType();

        $types = D('List')->showType();

        $goods = D('List')->showGoods();

        $this->assign('goods', $goods);

        $this->assign('firstType', $firstType);

        $this->assign('types', $types);

        $this->display('list');

    }

    public function ajaxShowGoods()
    {

        $this->ajaxReturn( D('List')->showGoods( I('get.start'), 10) );
    }
}