<?php

    namespace MGJAdmin\Model;

    use Think\Model;

    class BrandModel extends Model
    {
        protected $tableName = 'brand';    

        public function uploadBrand()
        {
            /*dump(I('post.'));

            echo $brandPic;*/
        }

        /**
         * 查询品牌数据
         * @return mixed 
         */
        public function brandList()
        {
            $list = $this->select();

            return $list;
        } 

        /**
         * 执行后台品牌模块的删除操作
         * @return boolean
         */
        public function brandDelete()
        {
            $id = I('get.id');

            $res = $this->where("id={$id}")->delete();

            if ($res) {

                return true;
            } else {
                return false;
            }
        }
    }
    
