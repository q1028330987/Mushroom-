<?php

    namespace MGJAdmin\Model;

    use Think\Model;

    class CategoryModel extends Model
    {

      protected $tableName = 'category';

        /**
         * 添加后台商品的分类
         * @return  boolean
         */
       public function addCategory()
       {
            $map['cname'] = I('post.cname');

            $map['comment'] = I('post.comment');

            $map['path'] = '0,';

            $map['pid'] = 0;

            $res = $this->add($map);

            if ($res) {

                return true;
            } else {

                return false;
            }
       }
       
       /**
        * 为后台商品分类查询数据
        * @return mixed
        */
       public function categoryList()
       {
            $list = $this->order('concat(path,id)')->select();

            foreach ($list as $k=>$v) {

                $arr = [];

                $num = substr_count($v['path'],',');

                $str = '┡'.str_repeat('>>', $num);

                $v['cname'] = $str.$v['cname'];

                $list[$k]['cname'] = $v['cname'];
                
            }
               return $list; 
              
       }

       /**
        * 删除后台商品的分类
        * @return boolean
        */
       public function categoryDelete()
       {
            $id = I('get.id');

            //查询该分类下是否有子分类
            $res = $this->where("pid={$id}")->select();
            
            if ($res) {

                return false;

            } else {

                $bool = $this->delete($id);

                return true;
            }

            $bool = $this->delete($id);

            if ($bool) {

                return true;
               
            } else {

                return false;
                
            }
       }

       /**
        * 增加后台商品分类的子分类
        * @return boolean
        */
       public function categoryAddSon()
       {            
            $post = I('post.');

            $map['cname'] = I('post.cname');

            $map['pid'] = I('post.pid');
            
            $map['comment'] = I('post.comment');

            $map['path'] = I('post.path').I('post.pid').',';

            $res = $this->add($map);

            if ($res) {

                return true;
            } else {

                return false;
            }
       }

       /**
        * 后台商品分类的编辑
        * @return mixed
        */
       public function categoryEdit()
       {

            $pathId = I('get.path').I('get.id');

            $data['concat(path,id)'] = array('notlike', $pathId.'%');

            $list = M('category')->where($data)->select();

            $cname = M('category')->field('cname')->where('id='.I('get.id'))->find();
            foreach ($list as $k=>$v) {

                $arr = [];

                $num = substr_count($v['path'],',');

                $str = '┡'.str_repeat('>>', $num);

                $v['cname'] = $str.$v['cname'];

                $list[$k]['cname'] = $v['cname'];
                
            }

                $list[] = $cname;

                return $list; 
                
       }

       /**
        * 后台商品分类的编辑
        * @return boolean
        */
       public function changeCategory()
       {

          $data['cname'] = I('post.categoryname');
          $id = I('post.id');

          $path = I('post.categoryparent');

          $pid = trim(strrchr($path, ','), ',');

          if ( I('post.categoryparent') == 1 ) {

              return M('category')->where( 'id='.$id )->save($data);
          } else {

            if ( I('post.categoryparent') == 2 ) {

                $pid=0;

                $path=0;
            }

                $data['pid'] = $pid;

                $data['path'] = $path.',';

                $res =  $this->where( 'id='.$id )->save($data);

                if ($res) {

                  $search['path'] = array('like', I('post.oldpath').'%' );  

                  $son = $this->where($search)->select();

                  if ($son == null) {

                    return true;
                  }

                 foreach ($son as $v) {

                  $savePath['path'] = str_replace(I('post.oldpath'), $path.','.$id, $v['path']);

                  $res = $this->where('id='.$v['id'])->save($savePath);
                    if ( !$res ) {

                      return false;
                    }
                 }

                      return true;
               } else {

                  return false;
               }
          }

       }

    }

