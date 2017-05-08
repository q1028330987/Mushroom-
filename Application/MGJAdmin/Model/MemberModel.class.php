<?php

    namespace MGJAdmin\Model;

    use Think\Model;

    class MemberModel extends Model
    {
        protected $trueTableName = 'mgj_user'; 

        //这个方法是显示用户数据
        public function showUser()
        {   

            $name = I('get.keyword');

            if ( !empty($name) ) {

                $search['username'] = array('like', "%{$name}%");
            }

            $list = $this->where($search)->select();

            $total = count($list);

            $pageArr['total'] = $total;

            $page = new \Think\Page($total, 2);

            $pageArr['show'] = $page->show();

            $pageArr['list'] = $this->where($search)->order('addtime desc')->limit($page->firstRow.','.$page->listRows)->select();

            return $pageArr;

        }

    } 