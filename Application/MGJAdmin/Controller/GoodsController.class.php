<?php

    namespace MGJAdmin\Controller;


    class GoodsController extends CommonController
    {   
        /**
         * 加载后台商品列表模板
         * @return void
         */
       public function index()
        {
            $productListModel = D('goods');

            $list = $productListModel->productList();

            $arr = array(1=>'已上架',2=>'已下架',3=>'缺货中');

            $this->assign('arr',$arr);

            $this->assign('list', $list);

            $this->assign('num', count($list));

            $this->display('Goods/product-list');

        }

        /**
         * 加载后台商品详情页模板
         * @return void
         */
        public function indexDetail()
        {
            $indexDetailModel = D('goods');

            $arr = $indexDetailModel->indexDetail();
            
            $this->assign('arr',$arr);

            $status = array(1=>'已上架',2=>'已下架',3=>'缺货中');

            $this->assign('status',$status);

            $this->display('Goods/product-list-detail');
        }

        /**
         * 删除后台商品详情页中的属性
         * @return void
         */
        public function deleteProprety()
        {
            
            $deletePropretyModel = D('goods');

            $res = $deletePropretyModel->deleteDetailProprety();

            echo json_encode($res);
        }

        public function productAdd()
        {
            $productAddModel = D('goods');

            $arr = $productAddModel->productAdd();

            if (IS_POST) {

            } else {

                $this->assign('categoryList',$arr[1]);

                $this->assign('brandList',$arr[0]);

                $this->display('Goods/product-add');

            }
            
        }

        public function productDelete()
        {
            $productDeleteModel = D('goods');

            $res = $productDeleteModel->productDelete();

            if ($res) {

                $this->success('删除成功',U('index'),3);
            } else {
                $this->error('删除失败',U('index'),3);
            }
        }

        public function productAddSummary()
        {   
            $productAddSummaryModel = D('goods');

            $res = $productAddSummaryModel->productAddSummary();

            if ($res) {

                $this->success('添加成功',U('Goods/index'),3);

            } else {

                $this->error('添加失败',U('Goods/productAdd'),3);
            }

        }

        public function productStatusChange()
        {

            $productStatusChangeModel = D('goods');

            $res = $productStatusChangeModel->productStatusChange();

            echo json_encode($res);

        }

        //获取修改商品后的新的商品的状态
        public function getNewStatus()
        {
            $id = I('post.id');

            $status = M('goods')->where("id='$id'")->getField('status');

            $arr = array(1=>'已上架','已下架','缺货中');

            echo json_encode($arr[$status]);
           
        }

        public function productEdit()
        {
            $productEditModel = D('goods');

            $arr = $productEditModel->productEdit();

            $list = I('get.');

            if (IS_POST) {

            } else {

                $this->assign('brandList',$arr[0]);

                $this->assign('categoryList',$arr[1]);

                $this->assign('list',$list);

                $this->display('Goods/product-edit');
            }
        }

        public function productEditSummary()
        {
          $productEditSummaryModel = D('goods');

          $bool = $productEditSummaryModel->productEditSummary();

          if ($bool) {

            $this->success('编辑成功',U('Goods/index'),3);

          } else {

            $this->error('编辑失败',U('Goods/index'),3);
          }
       
        }

        public function productAddDetail()
        {            

            if (IS_POST) {
                
                $productAddDetailModel = D('goods');

                $res = $productAddDetailModel->productAddDetail();

                if ($res) {

                    $this->success('添加成功',U('Goods/index'),3);

                } else {

                    $this->error('添加失败');
                }

            } else {

                $id = I('get.id');

                $this->assign('id',$id);

                $this->display('Goods/product-add-detail');
            }
        }

        public function productPicUpload()
        {
             // 实例化上传类    
              $upload = new \Think\Upload();

               // 设置附件上传大小    
              $upload->maxSize   =     3145728;//3M

            // 设置附件上传类型   
              $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg', 'webp', 'webp');

              $upload->rootPath   = './Public/';

              // 设置附件上传目录   
               $upload->savePath  =      './Uploads/'; 

              //返回上传信息
              $info   =   $upload->uploadOne($_FILES['pic']);   
             
              if( !$info ) {
                // 上传错误提示错误信息
                
                  $data['status'] = 404;

                  //错误信息
                  $data['msg']    = $upload->getError();
                  
                  echo  json_encode($data);

              }else{                
                  // 上传成功 (图片路径、图片名字)
                  
                  $data['status']  = 200;

                  $data['msg']     = 'UPLOAD SUCCESS';

                  //图片原始名字
                  $data['details']['originName'] = $info['name'];
                  $data['details']['savename'] = $info['savename'];
                  $data['details']['savepath'] = $info['savepath'];
                  
                  echo json_encode($data);
              }
        }

        public function productEditDetail()
        {

            if (IS_POST) {

                $productEditDetailModel = D('goods');

                $res = $productEditDetailModel->productEditDetail();

                if ($res) {

                    $this->success('编辑成功',U('Goods/index'),3);

                } else {

                    $this->error('编辑失败或未有改变');
                }

            } else {

                $id = I('get.id');

                $list = M('pic')->where("gid='$id'")->select();

                $this->assign('list', $list);

                $this->assign('id',$id);

                $this->display('product-edit-detail');
            }
        }

        public function picDelete()
        {
            if (IS_POST) {


            } else {               

                $picDeleteModel = D('goods');

                $res = $picDeleteModel->picDelete();

                if($res) {

                    $this->success('删除成功');

                } else {

                    $this->error('删除失败');
                }
            }
        }

        /**
         * 加载后台品牌展示模板
         * @return void
         */
        public function brand()
        {
            $brandListModel = D('brand');

            $list = $brandListModel->brandList();

            $this->assign('num',count($list));
            
            $this->assign('list', $list);

            $this->display('product-brand');

        }

        /**
         * 执行后台品牌模块的删除操作
         * @return void
         */
        public function brandDelete()
        {
            $brandDeleteModel = D('brand');

            $bool = $brandDeleteModel->brandDelete();

            if ($bool) {

                $this->success('删除成功');
            } else {
                $this->error('删除失败');
            }
        }

        /**
         * 执行后台品牌的编辑操作
         * @return boolean
         */
        public function brandEdit()
        {
            if (IS_POST) {

                $id = I('post.id');

                $upload = new \Think\Upload();// 实例化上传类

                $upload->maxSize   =     3145728 ;// 设置附件上传大小

                $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg', 'webp', 'webp');// 设置附件上传类型    
                $upload->rootPath  =       './Public/'; 

                $upload->savePath  =      './Uploads/'; // 设置附件上传目录

                $info   =   $upload->upload();
                           
                if(!$info) {

                    // 上传错误提示错误信息       
                    $this->error($upload->getError());   

                 }else{

                     foreach($info as $file){ 
                        //获取到图片上传的路径
                        $brandPic = $file['savepath'].$file['savename'];         
                    } 
                }


                $map['brandName'] = I('post.brandname');

                $map['brandPic'] = $brandPic;

                $map['descript'] = I('post.branddesc');

                $res = M('brand')->where("id={$id}")->save($map);

                if ($res) {

                    $this->success('编辑成功',U('Goods/brand'),3);
                } else {
                    $this->error('编辑失败',U('Goods/brand'),3);
                }


            } else {

                $id = I('get.id');

                $brandname = I('get.brandName');

                $this->assign('id',$id);

                $this->assign('brandname',$brandname);

                $this->display('product-brand-edit');
            }
        }

        /**
         * 加载后台商品分类模块
         * @return void
         */
        public function category()
        {
            $categoryModel = D('category');

            $list = $categoryModel->categoryList();

            $this->assign('list', $list);

            $this->display('Goods/product-category');

        }

        /**
         * 加载后台商品分类模板
         * @return void
         */
        public function categoryAdd()
        {

            if (IS_POST) {

                $categoryAddModel = D('category');

                $bool = $categoryAddModel->addCategory();

                if ($bool) {

                    $this->success('添加成功',U('Goods/category',2));
                } else {

                    $this->eorror('失败',U('Goods/categoryAdd',2));
                }
                
            } else {

                $this->display('Goods/product-category-add');
            }
            
        }

        /**
         * 删除后台商品的分类
         * @return void
         */
        public function categoryDelete()
        {

            $categoryDeleteModel = D('category');

            $res = $categoryDeleteModel->categoryDelete();

            if ($res) {

                 $this->success('删除成功',U('Goods/category'),1);
            } else {

                $this->error('删除失败,请先删除子类商品',U('Goods/category'),1);
            }
        }

        /**
         * 增加后台商品分类的子分类
         * @return void
         */
        public function categoryAddSon()
        {
            $val = I('get.');

            $this->assign('val', $val);

            if (IS_POST) {

                $list = I('post.');

                $categoryAddSonModel = D('category');

                $bool = $categoryAddSonModel->categoryAddSon();

                if ($bool) {

                        $this->success('添加成功',U('Goods/category',2));
                    } else {

                        $this->eorror('失败',U('Goods/categoryAdd',2));
                    }


            } else {

                $this->display('Goods/product-category-add-son');
           
            }

        }

        /**
         * 为后台商品的分类添加搜索
         * @return void
         */
        public function categorySearch()
        {
            
            if (IS_POST) {

            } else {

                 $cname = I('get.keyword');

                if (!empty($cname)) {

                    $search['cname'] = array('like', "%{$cname}%");
                }

                //查询出符合条件的所有分类
                $listAll = M('category')->where($search)->select();

                //统计查询出来的分类的数量
                $total = count($listAll);

                $page = new \Think\Page($total, 10);

                $list =  M('category')->where($search)->limit($page->firstRow.','.$page->listRows)->select();

               $show  = $page->show();

               $this->assign('list',$list);

               $this->assign('pageBtn', $show);

                $this->display('Goods/product-category');
            }
        }

        /**
         * 后台模块添加品牌，品牌图片的上传
         * @return void
         */
        public function uploadBrand()
        {            

            $upload = new \Think\Upload();// 实例化上传类

            $upload->maxSize   =     3145728 ;// 设置附件上传大小

            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg', 'webp');// 设置附件上传类型    
            $upload->rootPath  =       './Public/'; 

            $upload->savePath  =      './Uploads/'; // 设置附件上传目录

            $info   =   $upload->upload();
                       
            if(!$info) {
                // 上传错误提示错误信息       
                $this->error($upload->getError());   

             }else{

                 foreach($info as $file){ 

                    $brandPic = $file['savepath'].$file['savename'];         
                } 
            }

            $map['brandName'] = I('post.brandname');

            $map['brandPic'] = $brandPic;

            $map['descript'] = I('post.branddesc');

            $res = M('brand')->add($map);

            if ($res) {

                $this->success('添加成功',U('Goods/brand'),3);
            } else {
                $this->error('添加失败',U('Goods/brand'),3);
            }
        }

        /**
         * 后台商品分类的编辑
         * @return void
         */
        public function categoryEdit()
        {
            
            if (IS_POST) {

                $category = D('category');

                $res = $category->changeCategory();

                if ($res) {

                    $this->success( '修改成功', U('category') );
                } else {

                    $this->error('修改失败');
                }

            } else {

                $categoryEditModel = D('category');

                $list = $categoryEditModel->categoryEdit();

                $cname = array_pop($list);

                $this->assign('cname', $cname);

                $this->assign('list',$list);

                $this->assign('id', I('get.id'));

                $this->display('product-category-edit');
            }
        }
    }