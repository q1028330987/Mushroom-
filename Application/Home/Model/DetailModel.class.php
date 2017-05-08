<?php

    namespace Home\Model;

    use Think\Model;

    class DetailModel extends Model
    {
        protected $tableName = 'goods';

        /**
         * 这个方法负责商品详情页的显示
         * @return mixed 
         */
        public function detailShow()
        {   
            //接收到通过get方式传递过来的商品的id号
            $id = I('get.id');   

            //通过商品的id,查询到该商品的属性
            $proprety = M('proprety_name')->cache(true,300)->where("gid='$id'")->select();

            //查询该商品的销量，判断是否为该商品做图片查询缓存
            $buy = M('goods')->where("id='$id'")->getField('buy');

            if ($buy >= 1000) {

                //设置商品图片的查询缓存
                $pic = M('pic')->where("gid='$id'")->cache(true,300)->getField('picurl',true);

            } else {

                //销量小于1000,不为该商品做查询缓存
                $pic = M('pic')->where("gid='$id'")->getField('picurl',true);

            }

            //通过商品的id和属性名，查出该商品的尺码
            $size = M('proprety_name')->where("gid='$id' and propretyname='尺码'")->getField('proval',true);

            $str = implode(',',$size);

            //将字符串的尺码格式转换为数组格式，方便前台的遍历
            $size = explode(',',$str);

            //根据商品的id和属性名查出该商品的颜色
            $color = M('proprety_name')->where("gid='$id' and propretyname='颜色'")->getField('proval',true);

            $str = implode(',',$color);

            //将该商品的颜色转换为数组的格式，方便前台的遍历
            $color = explode(',',$str);

            //统计出颜色的数量
            $colornum = count($color);
            
            $c = [];

            $c['color'] = $color;
            
            //查出商品的颜色对应的图片
            $colorpic = M('pic')->where("gid='$id'")->getField('picurl',$colornum);

            $cp = [];

            $cp['colorpic'] = $colorpic;

            //将商品的颜色和颜色的图片组成一个数组
            $colorandpic = array($c,$cp);

            foreach ($colorandpic[0]['color'] as $k=>$v) {

                $arr[$k][] = $v;
                $arr[$k][] = $colorandpic[1]['colorpic'][$k];
            }
           
            $cp = $arr;

            //根据商品的id查询出商品的信息
            $goods = M('goods')->where("id='$id'")->select();
            
            foreach ($goods as $v) {

            }

            $categoryid = $v['categoryid'];

            $brandid = $v['brandid'];

            //根据商品的分类id查询出同类商品
            $sameCategoryGoods = M('goods')->where("categoryid='$categoryid'")->select();

            foreach ($sameCategoryGoods as $k=>$v){

                $id = $v['id'];

                $picurl = M('pic')->where("gid='$id'")->getField('picurl');
                //给同类的商品加上图片
                $sameCategoryGoods[$k]['picurl'] = $picurl;
            }

            //根据商品的品牌id查询出同类品牌的商品
            $sameBrandGoods = M('goods')->where("brandid='$brandid'")->select();

            foreach ($sameBrandGoods as $k=>$v){

                $id = $v['id'];

                $picurl = M('pic')->where("gid='$id'")->getField('picurl');
                //给同品牌的商品加上图片
                $sameBrandGoods[$k]['picurl'] = $picurl;
            }            
         
            //查询出热销的商品
            $hotSaleGoods = M('goods')->order('buy desc')->limit(3)->select();
            
            foreach ($hotSaleGoods as $k=>$v){

                $id = $v['id'];

                $picurl = M('pic')->where("gid='$id'")->getField('picurl');
                //给热销的商品添加上图片
                $hotSaleGoods[$k]['picurl'] = $picurl;
            }            

            //将要返回的数据组成一个数组
            $arr = array($goods,$proprety,$pic,$sameCategoryGoods,$sameBrandGoods,$hotSaleGoods,$size,$color,$cp);
            
            //返回数据
            return $arr;
        }

        /**
         * 这个方法处理ajax请求的库存验证
         * @return string
         */
        public function inventory()
        {

            $buynum = I('post.buynum');

            $goodsid = I('post.goodsid');

            $store = M('goods')->where("id='$goodsid'")->getField('store');

            if ($buynum > $store) {

                return 'toomuch';
            }
           
        }

    }
    