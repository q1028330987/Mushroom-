<?php

     namespace Home\Model;

     use Think\Model;

     class CartModel extends Model
     {
        /**
         * 这个方法负责查询购物车的商品的信息
         */
        public function CartShow()
        {  
            // dump($_SESSION['cart']);

        }

        /**
         * 这个方法负责查询验证所购买的商品的数量是否超过商品的库存
         * @return [type] [description]
         */
        public function inventoryStore()
        {
            $goodsid = I('post.goodsid');

            $inputNum = I('post.inputNum');

            $res = M('goods')->where("id='$goodsid'")->getField('store');

            if ($inputNum > $res) {

                echo 0;
            } else {

                echo 1;
            }
            
        }

        /**
         * 该方法负责处理将购物车商品加入到订单下
         */
        public function addOrder()
        {
            $list = I('post.');

            $mark = I('post.mark');

            $selectNum = I('post.selectNum');

            $goodsid = I('post.goodsid');
            
            $subtotal = I('post.subtotal');

            //查询库存
            $store = M('goods')->where("id='$goodsid'")->getField('store');

            $judgeStore = $store - $selectNum;

            if ($selectNum > $store) {

                return $judgeStore;

            } else {

                //新库存
                $newStore = $data['store'];

                // 库存足够,将商品信息写入到SESSION里面
                $_SESSION['order'][$mark] = $list;

                //更新该商品在SESSION里面的选择数量，方便全选的时候
                $selectNum = I('post.selectNum');

                $_SESSION['cart'][$mark]['selectNum'] = $selectNum;
               
               //将每次传递过来的小计存起来，并返回
                $_SESSION['subtotalStorage'] = $_SESSION['subtotalStorage'] + $subtotal;

                $subtotalStorage = $_SESSION['subtotalStorage'];

                $orderGoodsNum = count($_SESSION['order']);
                //预防意外情况，返回接收到的mark,为点击上的商品做一个标记
                

                return array($orderGoodsNum,$subtotalStorage);
            }

        }

        /**
         * 该方法负责处理将订单下的该商品删除掉
         * @return [type] [description]
         */
        public function reduceOrder()
        {
            $goodsid = I('post.goodsid');

            $subtotal = I('post.subtotal');

            $mark = I('post.mark');

            $selectNum = I('post.selectNum');

            //查询库存,用于判断是否取消不能提交的标记
            $store = M('goods')->where("id='$goodsid'")->getField('store');

            $judgeStore = $store - $selectNum;

            //判断数组中是否存在取消的订单的下标
            $bool = array_key_exists($mark,$_SESSION['order']);
            
            if ($bool){

                $_SESSION['subtotalStorage'] = $_SESSION['subtotalStorage'] - $subtotal;

                //把订单下的该商品删除掉
                unset($_SESSION['order'][$mark]);

            } 

            $subtotalStorage = $_SESSION['subtotalStorage'];

            //统计订单中的商品的个数
            $orderGoodsNum = count($_SESSION['order']);

            return array($orderGoodsNum,$subtotalStorage,$judgeStore);
        }
     }

