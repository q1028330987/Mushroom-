<?php

    namespace Home\Model;

    use Think\Model;

    class OrderModel extends Model
    {
        protected $trueTableName = "mgj_orders";

          /**
         *[处理地址数据添加到数据库]
         * @return [mixed]        [返回混合类型]
         */
        public function handleUserAddress()
        {
            if(IS_POST){

                $data = I('post.');
                // 后台判断
                if( empty($data['uid']) ){
                    return 0;//用户ID为空
                }
                if( empty($data['province']) || empty($data['city']) || empty($data['area'])){
                   return 1;//地址不和合法
                }

                // PHP中匹配中文字符的编码
                $pattern = '/^[\x{4e00}-\x{9fa5}]+$/u';

                if((!preg_match($pattern, $data['province']) ) || (!preg_match($pattern,$data['city'])) || (!preg_match($pattern, $data['area'])) ){
                    return  1;//地址不合法
                }

                    // 邮编的匹配
                $preg = '/^\d{6}$/';

                if( !preg_match($preg, $data['postcode']) ){
                     return 4;//邮遍不合法
                }  
                // PHP匹配中文字符
                // $pattern1 = '/^[\x{4e00}-\x{9fa5}]{5,100}$/u';

                if( strlen($data['street'])<5  ){

                   return 2;//详情地址不合法
                }

                // 收货人不能为空
                if( empty($data['name']) ){

                   return 3;//收货人不能为空
                }

                // 电话匹配
                $preg2 = '/^1[34578]\d{9}$/';

                if( !preg_match($preg2, $data['mobile']) ){

                   return 5;//电话不合法
                }

                $address['address'] = $data['province'].','.$data['city'].','.$data['area'];
                $address['det_detail'] = $data['street'];
                $address['uid'] = $data['uid'];
                $address['code'] = $data['postcode'];
                $address['name'] = $data['name'];
                $address['tel'] = $data['mobile'];
                $address['status'] = 2;//不设为默认地址

                $res = M('address')->add($address);
                if($res){
                    return $address;
                }else{
                    return 6;
                }

            }
           
        } 

        /**
         * 处理订单数据
         */
        public function handleOrderData()
        {
            // 如果session没有订单数据
            if($_SESSION['order']){

                $uid = I('post.uid');

               $map['aid'] =I('post.addressId');
               
               //总数量
               // 总价
               $total = I('post.total');

                // 组合订单的数据
                $data['uid'] = $uid;
                //
                $data['num_id'] = substr(time(), 8, 10).substr(date('Y'), 2).mt_rand(1, 9).date('m').mt_rand(1, 9).date('d').substr(uniqid(), 10, 12);

                $data['total'] = $total;

                
                $data['status'] = 1;//表示未付款

                $data['addtime'] = time();

                // 商品总数量
                $data['num'] = I('post.goodsNum');

                $data['aid'] =I('post.addressId');//一个

                $comment['comment'] = I('post.comment');//数组
                $goodId['gid'] = I('post.goodId');//数组
                $size['size'] =I('post.size');//数组
                $color['color'] =I('post.color');//数组
                $price['price'] =I('post.price');//数组
                $pic['pic'] =I('post.pic');//数组
                $gname['gname'] = I('post.gname');//数组
                $gtotal['gtotal'] = I('post.gtotal');//数组
                $gnum['gnum'] = I('post.gnum');//数组
                if (!M('orders')->autoCheckToken($_POST)){
                 // 令牌验证错误
                    return 'a';//表示令牌错误
                 }
                M()->startTrans();

                $oid = M('orders')->add($data);

              
                if( $oid ){

                    for( $i=0; $i<count($goodId['gid']); $i++){

                        $Info[] = 
                            [
                            'gid'=>$goodId['gid'][$i],
                             'pic'=>$pic['pic'][$i], 
                            'comment'=>$comment['comment'][$i], 
                            'size'=>$size['size'][$i],
                            'color'=>$color['color'][$i],
                            'price'=> $price['price'][$i], 
                            'gname'=>$gname['gname'][$i],
                             'gtotal'=>$gtotal['gtotal'][$i],
                             'oid'=>$oid,
                             'uid'=>$uid,
                            'gnum'=>$gnum['gnum'][$i],
                                ];

                    }   
                  
                    $res = M('order_detail')->addAll($Info);

                    if( $res ){
                        // 清空订单
                        unset($_SESSION['order']);
                        // 减掉相应的库存

                        // 由于商品库存表值有null,暂时不做这一步
                        

                        M()->commit();//事务提交
                        return $oid;//订单ID

                    }else{

                        M()->rollback();
                        return false;
                    }

                }else{

                    M()->rollback();//事务回滚

                    return false;
                }

            }else{

                $this->display('Index/index');
            }

          

        } 

        /**
         * 处理付款成功页面，将状态修改为2，表示已付款，但是未发货
         */
        public  function handlePaySuccess()
        {

            if(IS_POST){

                $oid = I('post.oid');

                $map['id']=$oid;

                $map['status']=2;

                $bool = M('orders')->where($map)->find();

                if( $bool ){

                    return 3;//表示已经付过钱了
                }


                $where['oid']=$oid;

                $orderInfo = M('order_detail')->where($where)->field('gnum,gid')->select();

                $a=0;

                for( $i=0; $i<count($orderInfo); $i++ ){


                    $aa['id'] =intval($orderInfo[$i]['gid']);
                    // 将库存量减少对应的数量，将购买量增加对应的数量
                    $resStore = M('goods')->where('id=1')->setDec('totalstore', $orderInfo[$i]['gnum']);
                    // 将对应的购买量增加
                    $resBuy =  M('goods')->where($aa)->setInc('buy', $orderInfo[$i]['gnum']);

                    $a++;
                }

                if( $a ){

                    $Info['id'] =$oid;//通过订单ID查出订单详情表中gid,通过gid修改goods中的库存量和购买量

                    $data['status'] = 2;//修改状态zzzz

                    $res =  M('orders')->where($Info)->save($data);

                    if( $res ){ 

                        M()->commit();
                        return 1;//表示付款成功

                    }else{

                        M()->rollback();
                        return 2;//表示付款失败
                    }

                    }else{

                    M()->rollback();
                    return 2;//表示付款失败
                }

            }
            
            
        }


    }
