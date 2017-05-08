<?php

    namespace MGJAdmin\Model;

    use Think\Model;

    class GoodsModel extends Model
    {
        protected $tabName = 'goods';

        public function productAdd()
        {
            $category = M('category');

            $categoryList = $category->order('concat(path,id)')->select();

            foreach ($categoryList as $k=>$v) {

                $arr = [];

                $num = substr_count($v['path'],',');

                $str = '┡'.str_repeat('>>', $num);

                $v['cname'] = $str.$v['cname'];

                $categoryList[$k]['cname'] = $v['cname'];
               
            }

            $brand = M('brand');

            $brandList = $brand->select();

            return array($brandList,$categoryList);
        }

        public function productAddSummary()
        {
            
            $data['gname'] = I('post.gname');

            $data['price'] = I('post.price');

            $data['store'] = I('post.store');

            $data['brandid'] = I('post.brand');

            $data['status'] = I('post.status');

            $data['categoryid'] = I('post.category');

            $data['describe'] = I('post.describe');

            $bool = $this->add($data);

            if ($bool) {

                return ture;

            } else {

                return false;
            }

        }

        /**
         * 查询后台商品列表中的数据
         * @return mixed
         */
        public function productList()
        {            
            $list = $this->select();
            
            return $list;
            
        }

        /**
         * 查询后台商品详情页中所需的数据
         * @return mixed
         */
        public function indexDetail()
        {           

            $id = I('get.id');

            $list = M('goods')->where("id=$id")->select();

            $brandid = I('get.brandid');

            $categoryid = I('get.categoryid');

            $brandname = M('brand')->where("id=$brandid")->getField('brandname');

            $cname = M('category')->where("id=$categoryid")->getField('cname');

            $proprety = M('proprety_name')->where("gid=$id")->select();

            $pic = M('pic')->where("gid=$id")->select();

            $arr = array($brandname,$cname,$proprety,$pic,$list,$id);

            return $arr;
        }

        /**
         * 删除后台商品详情页中的相应的属性
         * @return boolean
         */
        public function deleteDetailProprety()
        {
            $id = I('post.propretyid');

            $bool = M('proprety_name')->where("id='$id'")->delete();

            return $bool;
        }

        public function productDelete()
        {
            $id = I('get.id');

            $bool = $this->where('id='.$id)->delete();

            if ($bool) {

                return true;

            } else {

                return false;
            }
        }

        public function productStatusChange()
        {            
            $list = I('post.');

            $nowStatus = I('post.nowStatus');

            $nowValue = I('post.nowValue');

            $data['status'] = $nowValue;

            $id = I('post.goodsid');

            //判断状态,1：已上架,2:已下架,3:缺货中
            //若当前状态为2(已下架),修改为1(已上架)，进行库存的判断
            if ( ($nowStatus == 2) && ($nowValue == 1) ) {

                //查询库存
                $res = M('goods')->where("id='$id'")->getField('store');
                
                //判断库存是否不足 
                if ($res <= 0) {

                    return true;//不可修改

                } else {

                    //修改状态
                    M('goods')->where("id='$id'")->save($data);

                    return false;//可修改
                }
            } else if ($nowStatus == 2){

                //修改状态
                M('goods')->where("id='$id'")->save($data);

                return false;
            }



            //若当前状态为3(缺货中)，修改为1(上架)，进行判断
            if (($nowStatus == 3) && ($nowValue == 1)) {

                //查询库存
                $res = M('goods')->where("id='$id'")->getField('store');

                //判断库存是否充足
                if ($res <= 0) {

                    return true;//不可修改
                } else {
                    
                    //修改状态
                    M('goods')->where("id='$id'")->save($data);

                    return false;//可修改
                }

            } else if ($nowStatus == 3) {

                //修改状态
                M('goods')->where("id='$id'")->save($data);

                return false;
            }

            if ($nowStatus == 1) {

                //可做任何的修改
                M('goods')->where("id='$id'")->save($data);

                return false;
            }
            
            return $res;
        }


        public function productEdit()
        {
            $category = M('category');

            $categoryList = $category->order('concat(path,id)')->select();

            foreach ($categoryList as $k=>$v) {

                $arr = [];

                $num = substr_count($v['path'],',');

                $str = '┡'.str_repeat('>>', $num);

                $v['cname'] = $str.$v['cname'];

                $categoryList[$k]['cname'] = $v['cname'];
               
            }

            $brand = M('brand');

            $brandList = $brand->select();

            return array($brandList,$categoryList);
        }

        public function productEditSummary()
        {

            $id = I('post.id');

            $data['gname'] = I('post.gname');

            $data['price'] = I('post.price');

            $data['store'] = I('post.store');

            $data['brandid'] = I('post.brand');

            $data['categoryid'] = I('post.category');

            // $data['status'] = I('post.status');

            $res = $this->where('id='.$id)->save($data);

            if ($res) {

                return true;

            } else {

                return false;
            }
        }

        public function productAddDetail()
        {        

            //接收数据
            $map['gid'] = I('post.id');

            $map['propretyname'] = '材质';

            $map['proval'] = I('post.material');

            if ($map['proval']) {

                $res = M('proprety_name')->add($map);
            }                

            $map['propretyname'] = '风格';

            $map['proval'] = I('post.style');

            if ($map['proval']) {

                $res = M('proprety_name')->add($map);
            }

            $map['propretyname'] = '季节';

            $map['proval'] = I('post.season');

            if ($map['proval'] == 'spring') {

                $map['proval'] = '春季';
            }

            if ($map['proval'] == 'summer') {

                $map['proval'] = '夏季';
            }
            if ($map['proval'] == 'autumn') {

                $map['proval'] = '秋季';
            }
            if ($map['proval'] == 'winter') {

                $map['proval'] = '冬季';
            }

            if ($map['proval']) {

                $res = M('proprety_name')->add($map);
            }

            $map['propretyname'] = '厚度';

            $map['proval'] = I('post.thickness');

            if ($map['proval'] == 'thick') {

                $map['proval'] = '厚';
            }
            if ($map['proval'] == 'fit') {

                $map['proval'] = '适中';
            }
            if ($map['proval'] == 'thin') {

                $map['proval'] = '薄';
            }

            if ($map['proval']) {

                $res = M('proprety_name')->add($map);
            }

            $map['propretyname'] = '尺码';

            $map['proval'] = I('post.size');

            if ($map['proval']) {

                $res = M('proprety_name')->add($map);
            }   

            $map['propretyname'] = '颜色';

            $map['proval'] = I('post.color');

            if ($map['proval']) {

                $res = M('proprety_name')->add($map);
            }     

            //利用颜色和尺码计算总的库存，总的库存为 颜色的数量 * 尺码的数量 * 单个商品的库存
            if (I('post.size') && I('post.color')) {

                $color = I('post.color');

                $arrcolor = explode(',',$color);
                
                //求得颜色的数量
                $colornum = count($arrcolor);

                $size = I('post.size');

                $arrsize = explode(',',$size);

                //求得尺码的数量
                $sizenum = count($arrsize);



                $gid = $map['gid'];

                $id = $gid;

                //查出单个商品的库存，
                $oneStore = M('goods')->where("id='$id'")->getField('store');

                //得到总的库存
                $totalStore = $colornum * $sizenum * $oneStore;                

                $data['totalstore'] =   $totalStore;

                //更新goods表中的该商品的总的库存
                M('goods')->where("id='$id'")->save($data);
            }
                     

            $map['propretyname'] = '流行元素';

            $map['proval'] = I('post.popular');

            if ($map['proval']) {

                $res = M('proprety_name')->add($map);
            }

            $map['propretyname'] = '其他属性';

            $map['proval'] = I('post.supply');

            if ($map['proval']) {

                $res = M('proprety_name')->add($map);
            }

            $map['picurl'] = I('post.pic');

            if ($map['picurl']) {

                foreach ($map['picurl'] as $v) {
                        
                    $map['picurl'] = $v;

                    $res = M('pic')->add($map);
                }                   
                    
            }
                
            if ($res) {

                return true;

            } else {

                return false;
            }

        }

        public function productEditDetail()
        {
            // dump(I('post.'));die;

            $id = I('post.id');

            $map['gid'] = I('post.id');

            $map['propretyname'] = '材质';

            $map['proval'] = I('post.material');

            if ($map['proval']) {

                $pid = M('proprety_name')->where("gid={$id} and propretyname='材质'")->getField('id');
                 
                if ($pid){

                    $res = M('proprety_name')->where("id=$pid")->save($map);
                  
                } else {

                    $res = M('proprety_name')->add($map);
                }
                
            }                

            $map['propretyname'] = '风格';

            $map['proval'] = I('post.style');

            if ($map['proval']) {

                $pid = M('proprety_name')->where("gid={$id} and propretyname='风格'")->getField('id');
              
                if ($pid){

                    $res = M('proprety_name')->where("id=$pid")->save($map);
                  
                } else {

                    $res = M('proprety_name')->add($map);
                }
                
            }

            $map['propretyname'] = '季节';

            $map['proval'] = I('post.season');

            if ($map['proval'] == 'spring') {

                $map['proval'] = '春季';
            }

            if ($map['proval'] == 'summer') {

                $map['proval'] = '夏季';
            }
            if ($map['proval'] == 'autumn') {

                $map['proval'] = '秋季';
            }
            if ($map['proval'] == 'winter') {

                $map['proval'] = '冬季';
            }

            if ($map['proval']) {

                $pid = M('proprety_name')->where("gid={$id} and propretyname='季节'")->getField('id');
              
                if ($pid){

                    $res = M('proprety_name')->where("id=$pid")->save($map);
                  
                } else {

                    $res = M('proprety_name')->add($map);
                }
                
            }

            $map['propretyname'] = '厚度';

            $map['proval'] = I('post.thickness');

            if ($map['proval'] == 'thick') {

                $map['proval'] = '厚';
            }
            if ($map['proval'] == 'fit') {

                $map['proval'] = '适中';
            }
            if ($map['proval'] == 'thin') {

                $map['proval'] = '薄';
            }

            if ($map['proval']) {

                $pid = M('proprety_name')->where("gid={$id} and propretyname='厚度'")->getField('id');
              
                if ($pid){

                    $res = M('proprety_name')->where("id=$pid")->save($map);
                  
                } else {

                    $res = M('proprety_name')->add($map);
                }
                
            }

            $map['propretyname'] = '尺码';

            $map['proval'] = I('post.size');

            if ($map['proval']) {

                $pid = M('proprety_name')->where("gid={$id} and propretyname='尺码'")->getField('id');
              
                if ($pid){

                    $res = M('proprety_name')->where("id=$pid")->save($map);
                  
                } else {

                    $res = M('proprety_name')->add($map);
                }
                
            }   

            $map['propretyname'] = '颜色';

            $map['proval'] = I('post.color');

            if ($map['proval']) {

                $pid = M('proprety_name')->where("gid={$id} and propretyname='颜色'")->getField('id');
              
                if ($pid){

                    $res = M('proprety_name')->where("id=$pid")->save($map);
                  
                } else {

                    $res = M('proprety_name')->add($map);
                }
                
            }              

            $map['propretyname'] = '流行元素';

            $map['proval'] = I('post.popular');

            if ($map['proval']) {

                $pid = M('proprety_name')->where("gid={$id} and propretyname='流行元素'")->getField('id');
              
                if ($pid){

                    $res = M('proprety_name')->where("id=$pid")->save($map);
                  
                } else {

                    $res = M('proprety_name')->add($map);
                }
                
            }

            $map['propretyname'] = '其他属性';

            $map['proval'] = I('post.supply');

            if ($map['proval']) {

                $pid = M('proprety_name')->where("gid={$id} and propretyname='其他属性'")->getField('id');
              
                if ($pid){

                    $res = M('proprety_name')->where("id=$pid")->save($map);
                  
                } else {

                    $res = M('proprety_name')->add($map);
                }
                
            }

            $map['picurl'] = I('post.pic');

            if ($map['picurl']) {

                foreach ($map['picurl'] as $v) {
                        
                    $map['picurl'] = $v;

                    $res = M('pic')->add($map);
                }                   
                    
            }
            
            if ($res) {

                return true;

            } else {

                return false;
            }

        }

        public function picDelete()
        {
             $id = I('get.id');

             $res = M('pic')->where("id='$id'")->delete();

             if ($res) {

                return true;

             } else {

                return false;
             }
        }
    }