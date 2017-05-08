<?php

namespace MGJAdmin\Controller;

use Think\Controller;

class OrdersController extends Controller
{

    /**
     * 显示所偶有的订单
     * @return [type] [description]
     */
    public function showOrders()
    {

        $list = D('Orders')->showOrdersList();

        $state = array(1=>'未付款', '待发货', '待收货', '待评价', '已评价');

        $this->assign('state', $state);

        $this->assign('list', $list);


        $this->display('order-list');
    }

    /**
     * 显示订单详情表
     * @return [type] [description]
     */
    public function showOrdersDetail()
    {

        $detail = D('Orders')->showDetail();

        $this->assign('orderDetail', $detail);

        $this->display('order-detail');
    }

    /**
     * [sendGoods 用于发货]
     * @return [int] []
     */
    public function sendGoods()
    {

        if (IS_AJAX) {

            $res = D('Orders')->changeOrderStatus();

            if ( $res ) {

                $this->ajaxReturn(1);
            } else {

                $this->ajaxReturn(2);
            }
        }
    }
}