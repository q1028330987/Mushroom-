<?php
    
    namespace Home\Controller;

    use Think\Controller;

    class OrderController extends Controller
    {

        /**
         * 显示订单页面数据
         * @return [type] [没有返回值]
         */
        public function orderShow()
        {

            if(!empty($_SESSION['home'])){

                  $uid = intval( $_SESSION['home']['id'] );  

                $userAddressInfo = M('address')->where("uid=$uid")->select();

                //处理省市区地址
                foreach ($userAddressInfo as $key => $value) {

                    $value['address'] =explode(',', $value['address']);

                    $userAddressInfo[$key]['address'] = join($value['address']);

                }                
        
                $list = $_SESSION['order'];

                //商品件数
                $goodsNum = count($list);

                $this->assign('goodsNum',$goodsNum);

                //算出订单的总价
                foreach ($list as $v) {

                    $subtotal[] = $v['subtotal'];
                                
                }    

                $subtotal = array_sum($subtotal);

                //分配订单的总价给模板
                $this->assign('subtotal',$subtotal);

                $this->assign('allAddress', $userAddressInfo );

                //分配订单数据给模板
                $this->assign('list',$list);
                // dump($_SESSION);

                $this->display('orderShow');


            }else{

                $this->redirect('', U('User/login'));

            }

            
        }

        /**
         * 这个页面来显示订单页面
         */
        
        public function showPage()
        {
            if(!empty($_SESSION['home'])){

                //删除掉SESSION下的deletedGoods的数据,释放空间
                unset($_SESSION['deletedGoods']);

                //删除掉SESSION下的deleteOrderGoods的数据，释放空间
                unset($_SESSION['deleteOrderGoods']);           
                
                if ( I('get.') ) {

                    //将来自直接购买的商品加入到SESSION订单下，方便使用
                    $id = I('get.goodsid');

                    //加密$id,便于使用
                    $hash = password_hash($id, PASSWORD_DEFAULT);

                    $_SESSION['order'][$hash] = I('get.');

                     //加上mark下标，方便给每个数据做标记
                    $_SESSION['order'][$hash]['mark'] = $hash;

                    echo 1;//表示ajax购物网扯页面成功
                }
            }
        }

        /**
         * 这个方法是用来处理ajax获取省份的信息
         */
        public function ajaxGetProivnce()
        {
            if(IS_AJAX){

               $upid =  I('post.upid');

               $map['upid'] = $upid;

               $proivnce =  M('district')->where($map)->field('id,name,level,upid')->select();
               echo json_encode($proivnce);
            }

        } 

          /**
         * 通过ajax获取城市的值 
         * @return [null]  没有返回值
         */
        public function ajaxarea()
        {

            if(IS_AJAX){

                $proivnce =  I('post.name');

                $map['name'] = $proivnce;

                $proivnceData =  M('district')->field('id')->where($map)->find();

                $data['upid'] = $proivnceData['id'];

                $cityData = M('district')->where($data)->select();

                echo json_encode($cityData);                
            }

        }



        /**
         * 这个方法是用来添加用户地址
         */
        public function addAddress()
        {
            if(IS_POST){

                 $res = D('Personal')->handleUserAddress();
                if($res==1){

                    $this->error('地址不合法');

                }else if( $res == 4 ){
                       $this->error('邮遍不合法');
                   
                }else if( $res==3 ){

                    $this->error('收货人不能为空');

                }else if( $res==2 ){

                    $this->error('详情地址不合法');


                }else if ( $res==5 ){

                    $this->error('电话不合法');

                }else if( $res==0 ){

                    $this->error('未知错误');

                }else{

                    $this->redirect('orderShow');

                }
            }

        }
        
        /**
         * 接受订单数据.生成订单表
         */
        public function  payMoney()
        {

            if($_SESSION['home']){

                $res = D('Order')->handleOrderData();
                $total = I('post.total');

                $gname = I('post.gname');


                // 商品总数量
                $num = I('post.goodsNum');

                if( is_numeric($res) ){

                    $this->assign('oid', $res);   
                   $this->assign('total', $total);
                   $this->assign('num', $num);
                   $this->assign('gname', $gname[0]);
                   $this->assign('time', time());
                   $this->display('payMoney');

                }else if ($res=='a'){


                    $this->error('订单异常，请从新下单');

                    // $this->display('Index/index');

                }else{

                    $this->error('订单异常，请从新下单', U('Index/index'));
                }   

            }else{
                
               $this->redirect('User/login');

            }
               

        }

        /**
         * 这个方法显示支付成功页面将订单状态修改为2表示已付款
         */
        public  function paySuccess()
        {

            $res = D('order')->handlePaySuccess();
            if( $res==1 ){

                $this->display('paySuccess');


            }else if( $res==2 ){
                
                $this->error('付款失败');

                exit;

            }else if($res=="a"){
                dump($res);

                echo 'a';
                $this->redirect('Index/index');
            }else if($res==3){

                $this->error('订单已经支付过了',U('Index/index'));
            }

        }

        /**
         * 显示所有的订单页面
         */
        public function showAllOrders()
        {

            if($_SESSION['home']){

                $uid = $_SESSION['home']['id'];

                $map['uid'] = $uid;

                // 查询满足要求的总记录数
                $count = M('orders')->count();

                $Page = new \Think\Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录数(25)
              
                // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
                $show = $Page->show();

                // 查询所有的订单
                $orderData = M('orders')->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();

               for($i=0; $i<count($orderData); $i++){

                    $where['oid'] = $orderData[$i]['id'];

                    $orderDetail[$i]=   M('order_detail')->where($where)->select(); 
               }

              

            }
              $this->assign('orderDetail', $orderDetail);

                $this->assign('orderData', $orderData);

                

                $this->assign('page',$show);// 赋值分页输出

                $this->display('orderList');

        }


        /**
         * 这个方法是用来ajax获取没有付款的订单
         */ 
        
        public function  getWaitPay()
        {

            if( I('get.status')){

                $map['status'] = I('get.status');//状态为1，表示未付款

                $orderData = M('orders')->where($map)->select();

                for($i=0; $i<count($orderData); $i++){

                    $where['oid'] = $orderData[$i]['id'];

                    $orderDetail[$i]=   M('order_detail')->where($where)->select(); 
               }

                $this->assign('orderDetail', $orderDetail);

                $this->assign('orderData', $orderData);

                $this->display('orderList');

            }

        }

        /**
         * 这个方法负责显示待收货的订单
         */
        public function waitGoods()
        {

             if( I('get.status')){

                $map['status'] = I('get.status');//状态为1，表示未付款

                $orderData = M('orders')->where($map)->select();


                for($i=0; $i<count($orderData); $i++){

                    $where['oid'] = $orderData[$i]['id'];

                    $orderDetail[$i]=   M('order_detail')->where($where)->select(); 
               }

                $this->assign('orderDetail', $orderDetail);

                $this->assign('orderData', $orderData);

                $this->display('orderList');


            }

        }

        /**
         * 这个方法是用来确认收到货物，修改订单的状态
         */ 
        public function confirmGetGoods()
        {

            if(IS_AJAX){

                   $map['id'] = I('post.oid');

                   //表示前台已经确认收货了，可以进行评价了
                   $data['status'] =4;

                   //先进行状态查询
                   $orderData = M('orders')->field('status')->where($map)->find();



                   if($orderData['status']==3){


                           $res = M('orders')->where($map)->save($data);

                           if( $res ){
                                $this->ajaxReturn(1);//表示修改成功
                           }else{
                                $this->ajaxReturn(2);//表示确认收货失败
                           }

                   }else{

                        $this->ajaxReturn(2);//表示确认收货失败

                   }
                   

            }

        }


        /**
         * 这个方法显示订单详情表
         */
        public  function showOrderDetail()
        {

            if(IS_GET){
                 $oid = I('get.id');
                 $map['id'] = $oid;

                $res =M('orders o')
                ->join('left join mgj_order_detail od ON o.id=od.oid')
                ->join('left join mgj_address a ON  o.aid=a.id')
                ->field('o.status,od.gid,od.pic,od.comment,od.size,od.color,od.price,od.gname,od.gtotal,od.gnum,o.num_id,o.total,o.addtime,o.num,a.address,a.det_detail,a.name,a.tel,a.code')
                ->where("o.id = $oid")->select();

                // 处理地址
                $res[0]['address'] = join(explode(',' , $res[0]['address'] ));  

                // 处理电话
                $res[0]['tel'] = substr($res[0]['tel'], 0, 3)."****".substr($res[0]['tel'], 8, 10);

                if( $res ){

                    $this->assign('orderDetail', $res);

                    $this->display();

                }


            }
            
        }

        /**
         * 负责订单页面ajax的付款处理
         */
        public function orderPagePayMoney()
        {
            if (IS_AJAX) {

               $oid =  I('post.oid');

               $map['id']=$oid;

               $data['status'] = 2;

               $orderInfo = M('orders')->where($map)->find();   

               if($orderInfo['status']!=1){

                     $this->ajaxReturn(2);//付款失败

                }else{
                 
                    //将对应的商品表的库存
                    M()->startTrans();

                    $da['oid'] =$oid;

                    $info = M('order_detail')->where($da)->select();

                    for( $i=0; $i<count($info); $i++){

                        $arr[$i]['gid'] = $info[$i]['gid'];

                        $arr[$i]['num'] =$info[$i]['gnum'];

                    }

                    $a=0;
                    for( $j=0; $j<count($arr); $j++){

                        $where['id'] =$arr[$j]['gid'];

                        // 将库存量减少对应的数量，将购买量增加对应的数量
                        $resStore = M('goods')->where($where)->setDec('totalstore', $arr[$j]['num']);

                        // 将对应的购买量增加
                        $resBuy =  M('goods')->where($where)->setInc('buy',$arr[$j]['num']);

                        $a++;

                    }

                    if( $a ){
                            
                             // 将订单的状态修改为2.表示已经付款
                            $res =  M('orders')->where($map)->save($data);

                            // 提交事务
                            M()->commit();

                            $this->ajaxReturn(1); //付款成功
                    }else{

                            // 事务回滚
                            M()->rollback();

                            $this->ajaxReturn(2);//付款失败
                        }
                   
               }    

            }   

        }


    }