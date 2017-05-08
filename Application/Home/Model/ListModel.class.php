<?php 

namespace Home\Model;

use Think\Model;

class ListModel extends Model
{

    protected $tableName = 'category';

    public function showFirstType()
    {

        return $this->where('pid=0')->select();
    }

    public function showType()
    {

        $pid = I('get.pid');

        $id = I('get.tid');

        if ( $pid != 0 ) {

            $parent = $this->field('id,pid')->where('id='.$pid)->select();

            if ( $parent[0]['pid'] != 0) {

                $grandfather = $this->field('id,pid')->where('id='.$parent[0]['pid'])->select();

                $firstType = $grandfather[0]['id'];

            } else {

                $firstType = $parent[0]['id'];

            }
        } else {

            $firstType = $id;

        }
                
        $secondType = M('category')->where('pid='.$firstType)->select();

        $data['pid'] = array('neq', $firstType);

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

    public function showGoods($start=0,$offset=10)
    {

        $id = I('get.tid');

        if ( empty( $id ) ) {

            return null;
        }

        $res = $this->field('group_concat(id) ids')->where('pid='.$id)->find();

        if ($res['ids'] === null) {

           return M('goods g')->field('g.id,g.describe,g.gname,g.price,p.picurl,g.buy')->join('left join mgj_pic p ON p.gid = g.id')->where('categoryid='.$id)->limit($start, $offset)->select();
        }

        $data['pid'] = array('in', $res['ids']);

        $res1 = $this->field('group_concat(id) ids')->where($data)->find(); 

        if ($res1['ids'] === null) {

            $where['categoryid'] = array('in', $res['ids']);
            return M('goods g')->field('g.id,g.describe,g.gname,g.price,p.picurl,g.buy')->join('left join mgj_pic p ON p.gid = g.id')->where($where)->limit($start, $offset)->select();
        }

        $where['categoryid'] = array('in', $res1['ids']);

        return M('goods g')->field('g.id,g.describe,g.gname,g.price,p.picurl,g.buy')->join('left join mgj_pic p ON p.gid = g.id')->where($where)->order('buy desc')->limit($start, $offset)->select();
    }

}