<?php

    namespace Home\Controller;

    use Think\Controller;

    class CartController extends Controller
    {
        /**
         * 这个方法负责购物车页面的显示
         */
        public function CartShow()
        {
            //判断用户是否登录
            if($_SESSION['home']){
                $list = $_SESSION['cart'];

                foreach ($list as $k=>$v){
                    
                    //算出每种商品的小计，方便运用
                    $subtotal = $v['floatgoodsPrice']*$v['selectNum'];
                    
                    //将商品的小计计入到购物车中，方便使用
                    $list[$k]['subtotal'] = $subtotal;

                    //在商品信息下加上 mark 标记，方便使用
                    $list[$k]['mark'] = $k;

                }

                // dump($_SESSION);

                //计算出购物车的商品的数量
                $goodsnum = count($list);

                $CartShowModel = D('Cart');

                $CartShowModel->CartShow();

                if (IS_POST) {

                } else {

                    $this->assign('list',$list);

                    $this->assign('goodsnum',$goodsnum);

                    $this->display('Cart/cart');
                }

            } else {

                $this->error('请先登录',U('User/login'),3);
            }
    
            
        }

        /**
         * 这个方法负责处理购物车商品的删除
         * @return [type] [description]
         */
        public function deleteThisGoods()
        {
            //接收到从购物车传递过来的商品的mark,每个商品的mark标记唯一
            $mark = I('post.mark');

            //将要删除的商品先存起来，方便撤销删除时操作
            $deletedGoods = $_SESSION['cart'][$mark];

            //将删除掉的商品存放在在SEESSION下的deleteGoods下
            $_SESSION['deletedGoods'][$mark] = $deletedGoods;

            //最后删除掉改商品
            unset($_SESSION['cart'][$mark]);

        }

        /**
         * 这个方法负责处理撤销删除之前删除掉的商品
         */
        public function CancelDeleteThisGoods()
        {
            $mark = I('post.mark');

            //将之前删除掉的商品再次加入到购物车下
            $_SESSION['cart'][$mark] = $_SESSION['deletedGoods'][$mark];

            //清除掉之前删除掉的商品，释放空间
            unset($_SESSION['deletedGoods'][$mark]);
        }

        /**
         * 这个方法负责处理将商品加入到购物车时的登录验证
         * @return [type] [description]
         */
        public function buyCartConfirmLogin()
        {
            if( !$_SESSION['home'] ){
                //改区间为用户处于没有登录的状态

                echo 0;

                $id = I('post.goodsid');

                //将商品传递过来的id号做一个加密标记，保证每一个加入购物车的商品都能成功
                $hash = password_hash($id, PASSWORD_DEFAULT);

                //将传递过来的商品的信息加入到购物车里面
                $_SESSION['cart'][$hash] = I('post.');

            } else {
                //改区间为用户处于没有登录的状态

                echo 1;

                $id = I('post.goodsid');

                $hash = password_hash($id, PASSWORD_DEFAULT);
                
                $_SESSION['cart'][$hash] = I('post.');
                
            }
            
        }

        /**
         * 该方法负责处理立即购买商品用户是否登录的验证
         * @return [type] [description]
         */
        public function buyNowConfirmLogin()
        {
            
            if (!$_SESSION['home']) {

                echo 0;
            } else {
                echo 1;
            }
        }

        /**
         * 该方法负责处理商品的库存的验证
         * @return [type] [description]
         */
        public function inventoryStore()
        {
            $inventoryStoreModel = D('Cart');

            $inventoryStoreModel->inventoryStore();
        }

        /**
         * 该方法负责处理将商品从购物车加到订单下的操作
         */
        public function addOrder()
        {
            
            
            $addOrderModel = D('Cart');

            $res = $addOrderModel->addOrder();

            echo json_encode($res);
        }

        /**
         * 改方法负责处理将商品从订单下删除掉
         * @return [type] [description]
         */
        public function reduceOrder()
        {   
            $reduceOrderModel = D('Cart');

            $res = $reduceOrderModel->reduceOrder();

            echo json_encode($res);
        }

        //点击全选按钮之后，将SESSION里面购物车里面商品加入订单里
        public function allChecked()
        {

            $_SESSION['order'] = $_SESSION['cart'];

            //得出订单里的商品的数量
            $orderGoodsNum = count($_SESSION['order']);

            //得出总的金额,同时把$_SESSION['subtotalStorage']的值修改
            foreach ($_SESSION['order'] as $k=>$v) {

                $subtotal[] = $v['floatgoodsPrice'] * $v['selectNum'];

                //为每个商品加上小计
                $_SESSION['order'][$k]['subtotal'] = $v['floatgoodsPrice'] * $v['selectNum'];
                                
            }    

            $subtotal = array_sum($subtotal);

            //得出总的金额,同时把$_SESSION['subtotalStorage']的值修改
            $_SESSION['subtotalStorage'] = $subtotal;

            $arr = array($orderGoodsNum,$subtotal);

            echo json_encode($arr);
            
        }

        //点击取消全选按钮之后，删除SESSION订单里面商品
        public function cancelAllChecked()
        {
            unset($_SESSION['order']);

            //取消全选按钮，修改订单的总金额为0
            $_SESSION['subtotalStorage'] = 0;

            echo json_encode($_SESSION['subtotalStorage']);
        }

        /**
         * 改方法负责处理改变所选择的商品的数量
         * @return [type] [description]
         */
        public function changeCartGoodsSelectNum()
        {
            $list = I('post.');

            $mark = I('post.mark');

            $inputNum = I('post.inputNum');

            //更改购物车里面想对应的商品的数量方便使用
            $_SESSION['cart'][$mark]['selectNum'] = $inputNum;

           echo json_encode($list);
        }

        /**
         * 这个方法负责处理通过改变商品的数量改变订单中的总金额
         * @return [type] [description]
         */
        public function changeOrderMoneyByNum()
        {
            $floatgoodsPrice = I('post.floatgoodsPrice');

            $add = I('post.add');

            $reduce = I('post.reduce');

            $inputNum = I('post.inputNum');
            
            //判断数量为加的时候
            if ($add) {

                //将总的订单的金额累计相加上传递过来的商品的单价
                $_SESSION['subtotalStorage'] = $_SESSION['subtotalStorage'] + $floatgoodsPrice;

            }
            
            //商品数量为减的时候
            if ($reduce){

                if ($inputNum == 1) {

                    //若传递过来的商品的数量为1，则不能往下减下去啦
                    $_SESSION['subtotalStorage'] = $_SESSION['subtotalStorage'];
                } else {

                    //将订单的总的金额减去当前传递过来的商品的单价
                    $_SESSION['subtotalStorage'] = $_SESSION['subtotalStorage'] - $floatgoodsPrice;
                }
                
            }           
            
            echo json_encode($_SESSION['subtotalStorage']);
        }

        /**
         * 这个方法负责处理删除所有的订单
         * @return [type] [description]
         */
        public function allOrderDelete()
        {
            unset($_SESSION['order']);
            
            unset($_SESSION['cart']);

            unset($_SESSION['deletedGoods']);

            $_SESSION['subtotalStorage']  = 0.00;

            echo $_SESSION['subtotalStorage'];
        }

        //每个商品的删除，改变总的订单的金额
        public function everyDeleteChangeAllMoney()
        {
            $mark = I('post.mark');

            $subtotal = I('post.subtotal');

            $delete = I('post.delete');

            $cancelDelete = I('post.cancelDelete');
            //判断是删除还是撤销删除
            if ($delete != null){

                //改变总的订单金额
                $_SESSION['subtotalStorage'] = $_SESSION['subtotalStorage'] - $subtotal;

                //先把要删除的商品存起来,方便撤销使用
                $_SESSION['deleteOrderGoods'][$mark] = $_SESSION['order'][$mark];

                //删除掉订单下的该商品
                unset($_SESSION['order'][$mark]);

                //统计订单下的商品的数量
                $orderGoodsNum = count($_SESSION['order']);

                //返回新的订单金额数与，商品的数量
                $arr = array($orderGoodsNum,$_SESSION['subtotalStorage']);

                echo json_encode($arr);
            }

            
            //撤销删除
            if ($cancelDelete != null) {

                //改变总的订单金额
                $_SESSION['subtotalStorage'] = $_SESSION['subtotalStorage'] + $subtotal;

                //撤销删除掉订单下的该商品
                $_SESSION['order'][$mark] = $_SESSION['deleteOrderGoods'][$mark];

                //统计订单下的商品的数量
                $orderGoodsNum = count($_SESSION['order']);

                //返回新的订单金额数与，商品的数量
                $arr = array($orderGoodsNum,$_SESSION['subtotalStorage']);

                echo json_encode($arr);
            }

        }

        //刷新清除掉订单中的商品
        public function refreshDeleteOrderGoods()
        {
            //删除订单下的所有的商品
            unset($_SESSION['order']);

            $_SESSION['subtotalStorage'] = 0;
        }

    }