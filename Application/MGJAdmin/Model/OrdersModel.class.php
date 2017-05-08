<?php

namespace MGJAdmin\Model;

use Think\Model;

class OrdersModel extends Model
{

    public function showOrdersList()
    {

            $orderInfo = M('orders o')->join('left join mgj_address a ON  o.aid= a.id')->field('a.uid,a.address,a.det_detail,a.name,a.tel,a.code,o.num_id,o.total,o.status,o.addtime,o.num,o.id')->select();
            return $orderInfo;
    }


    public function showDetail()
    {

        $oid = I('get.oid');

        $data['oid'] = $oid;

        $orderDetail = M('order_detail')->where($data)->select();

        $uid['id'] = $orderDetail[0]['uid'];

        $username  = M('user')->field('username')->where($uid)->find();

        $map['id'] = $oid; 

        $num_id = M('orders')->field('num_id')->where($map)->find();

        for($i=0; $i < count($orderDetail); $i++){

            $orderDetail[$i]['num_id'] = $num_id['num_id'];

            $orderDetail[$i]['username'] = $username['username'];
        }

        return $orderDetail;   
    }

    public function changeOrderStatus()
    {

        $id = I('post.id');

        $sel = $this->field('status')->where('id='.$id)->find();
        
        if ($sel['status'] != 2) {

            return false;
        }

        $data['status'] = 3;

        return $this->where('id='.$id)->save($data);
    }   
}
