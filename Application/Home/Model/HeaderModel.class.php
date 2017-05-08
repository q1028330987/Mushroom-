<?php

    namespace Home\Model;

    use Think\Model;

    class HeaderModel extends Model
    {
        protected $tableName = 'goods';
        /**
         * 该方法负责分配数据给header头中的购物车
         * @return [type] [description]
         */
        public function cart()
        {
            $cart = $_SESSION['cart'];

            foreach ($cart as $k=>$v) {

                $wholegname = $v["goodsName"];

                $gname = substr($v["goodsName"], 0,16);

                $cart[$k]['goodsName'] = $gname;

                $cart[$k]['mark'] = $k;
            }
          
            // dump($cart);

            $this->assign('wholegname',$wholegname);

            $this->assign('cart',$cart);
            
            //分配数据给首页
            // $this->display('Index/index');
        }

        // public function deleteCartGoods()
        // {
        //     $mark = I('get.mark');
        //     echo 123456;
        //     // unset($_SESSION['cart'][$mark]);

        // }
    }