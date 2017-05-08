<?php
    
    namespace Home\Controller;

    use Think\Controller;  

    class DetailController extends Controller
    {
        /**
         * 前台商品详情页的加载
         * @return void
         */
        public function detailShow()
        {
            $detailShowModel = D('Detail');

            $list = $detailShowModel->detailShow();
              
            $goods = $list[0];

            $proprety = $list[1];

            $pic = $list[2];

            $sameCategoryGoods = $list[3];

            $sameBrandGoods = $list[4];

            $hotSaleGoods = $list[5];
            

            $size = $list[6];

            $color = $list[7];

            $colorandpic = $list[8];

            $this->assign('goods',$goods);

            $this->assign('proprety',$proprety);

            $this->assign('pic',$pic);

            $this->assign('sameCategoryGoods',$sameCategoryGoods);

            $this->assign('sameBrandGoods',$sameBrandGoods);

            $this->assign('hotSaleGoods',$hotSaleGoods);

            $this->assign('size',$size);

            $this->assign('color',$color);

            $this->assign('colorandpic',$colorandpic);
            
            if (IS_POST) {


            } else {

                $this->display('detail');
            }
        }

        /**
         * ajax请求查询商品的库存
         * @return void
         */
        public function inventory()
        {
            $inventoryModel = D('Detail');

            $res = $inventoryModel->inventory();

            echo json_encode($res);

        }
    }