<?php

namespace Home\Model;

use Think\Model;

class IndexModel extends Model
{

    protected $tableName = 'goods';

    public function showLoopPlay()
    {

        return M('slide_show')->limit(5)->order('id desc')->select();
    }

    public function showFirstType()
    {

        $data['pid'] = 0;

        $parent = M('category')->where($data)->limit(12)->select();

        $data['pid'] = array('neq', 0);

        $son = M('category')->where($data)->select();

        foreach ($parent as $k=>$v) {

            foreach ($son as $val) {

                if ( $v['id'] == $val['pid']) {

                    if ( count($parent[$k]['son']) <=2 ) {

                        $parent[$k]['son'][] = $val;
                    }
                }
            }
        }

        return $parent;
    }

    public function ajaxShowType()
    {
        $pid = I('post.pid');

        $secondType = M('category')->where('pid='.$pid)->select();

        $data['pid'] = array('neq', $pid);

        $thirdType = M('category')->where($data)->select();

        foreach ($secondType as $k=>$v) {

            foreach ($thirdType as $val) {

                if ( $v['id'] == $val['pid']) {

                    $secondType[$k]['son'][] = $val;
                }
            }
        }
        return $secondType;
    }

    public function ajaxShowGoods ($limit, $orderby='buy desc')
    {

        $data['pid'] = I('post.pid');

        $ids = M('category')->field('id')->where($data)->select();

        $id = [];
        foreach ( $ids as $k=>$v) {

            $id['gid'][$k] = M('category')->field( 'group_concat(id) gid' )->where('pid='.$v['id'] )->find()['gid'];
          
        }

        $gid = join($id['gid'], ',');

        $info['g.categoryid'] = array('in', $gid);

        $info['g.status'] = 1;
        
        return M('goods g')->field('g.id,g.describe,g.gname,g.price,p.picurl')->join('left join mgj_pic p ON p.gid = g.id')->where($info)->group('g.id')->order($orderby)->limit($limit)->select();
    }

    public function showBrand()
    {

        return M('brand')->limit(8)->select();
    }

    public function showBrandGoods()
    {

       return M('goods g')->field('g.id,g.gname,b. descript,b.brandname,p.picurl')->join('left join mgj_brand b ON g.brandid = b.id left join mgj_pic p ON p.gid = g.id')->where('g.status=1')->order('g.buy desc')->group('g.id')->limit(7)->select();
    }

    public function showGoods($start, $offset=20)
    {
        
        return M('goods g')->field('g.id,g.gname,g.price,p.picurl')->join('left join mgj_pic p ON p.gid = g.id')->order('buy desc')->group('g.id')->limit($start.','.$offset)->select();
    }
}