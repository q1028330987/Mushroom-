<?php

namespace MGJAdmin\Model;

use Think\Model;

class AdministratorsModel extends Model
{

    //字段映射
    protected $_map = array(

        'adminName'      => 'username',
        'adminPassword'  => 'password',
        'adminSex'       => 'sex',
        'adminPhone'     => 'phone',
        'adminEmail'     => 'email',
    );

    //自动验证
    protected $_validate = array(

        array('username', '/\d/', '用户名必须包含数字'),
        array('username', '/[a-zA-Z]/', '用户名必须包含字母'),
        array('username', '6,18', '用户名在6~18位之间', 3, 'length'),
        array('password', '6,18', '密码在6~18位之间', 3, 'length'),
        array('repassword','password','确认密码不正确',2,'confirm'),
        array('email', "/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/", '请输入正确的邮箱'),
        array('phone', '/^1[34578]\d{9}$/', '手机号码不正确'),
        array('sex', array(1,0) ,'非法操作', 3, 'in'),
        array('username', '', '用户名已存在', 1, 'unique', 3),
        array('phone', '', '手机号码已存在', 1, 'unique', 3),
        array('email', '', '邮箱已存在', 1, 'unique', 3),
    );

    //自动完成
    protected $_auto = array(

        array('status', '1'),
        array('password', 'hashPass', 3, 'callback'),
        array('addtime', 'time', 1, 'function'),

    );

    /**
     * [hashPass description] 使用哈希为密码加密
     * @return [mixed] [description] 加密后的字符串
     */
    protected function hashPass()
    {
        return password_hash(I('post.adminPassword'), PASSWORD_DEFAULT);
    }

    /**
     * [showAdminList   查询所有的管理员]
     * @return [mixed] [查询的管理员数据] 
     */
    public function showAdminList()
    {

        $name = I('get.keyword');
        if ( !empty($name) ) {

            $search['username'] = array('like', "%{$name}%");
        }

        $list = $this->where($search)->select();

        $total = count($list);

        $pageArr['total'] = $total;

        $page = new \Think\Page($total, 8);

        $pageArr['show'] = $page->show();

        $pageArr['list'] = $this->where($search)->order('addtime asc')->limit($page->firstRow.','.$page->listRows)->select();

        return $pageArr;
    }

    /**
     * [findAdminInfo 根据管理员id查出对应数据]
     * @return [mixed] [单个用户数据]
     */
    public function findAdminInfo()
    {
        $id = I('get.id');

        return $this->where('id ='.$id)->find();
    }


    /**
     * [editAdmin 编辑管理员]
     * @return [mixed] [通过数组返回不同的状态 0表示为通过自动验证 1表示修改成功 2表示修改失败]
     */
    public function editAdmin()
    {

        $rules = array(

            array('username', '/\d/', '用户名必须包含数字'),
            array('username', '/[a-zA-Z]/', '用户名必须包含字母'),
            array('username', '6,18', '用户名在6~18位之间', 3, 'length'),
            array('password', '6,18', '密码在6~18位之间', 2, 'length'),
            array('email', "/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/", '请输入正确的邮箱'),
            array('phone', '/^1[34578]\d{9}$/', '手机号码不正确'),
            array('sex', array(1,0) ,'非法操作', 3,'in'),
            array('username', '', '用户名已存在', 1, 'unique', 3),
            array('phone', '', '手机号码已存在', 1, 'unique', 3),
            array('email', '', '邮箱已存在', 1, 'unique', 3),
            );
        if (!$this->validate($rules)->create()){

               return array('status'=> 0);
        }else{ 

            $id = I('post.id');

            $data['username'] = I('post.adminName');

            if ( !empty(I('post.adminPassword')) ) {

                $data['password'] = I('post.adminPassword');
            }
            
            $data['sex'] = I('post.adminSex');
       
            $data['phone'] = I('post.adminPhone');
        
            $data['email'] = I('post.adminEmail');

            $res = $this->where('id ='.$id )->save($data);

            //插入成功返回状态等于1否则返回2
            if ($res) {

                return array('status'=> 1);
            } else {

                return array('status'=> 2);
            }
        }
    }

    /**
     * [deleteOne 删除管理员]
     * @return [int] [删除成功返回条数，失败返回0]
     */
    public function deleteOne()
    {

        $id = I('post.id');

        M()->startTrans();

        $res = $this->where('id ='.$id )->delete();

        $admin = M('auth_group_access')->where('uid='.$id)->select();

        if ($res) {

            if (empty($admin)) {

                M()->commit();
                return true;
            }

           $data['uid'] = $id; 

            $res1 = M('auth_group_access')->where($data)->delete();

            if ($res1) {

                M()->commit();
                return true;
            } else {

                M()->rollback();
                return false;
            }
        } else {

            M()->rollback();
            return false;
        }
    }

    public function updateState()
    {

        $id = I('post.id');

        $state = I('post.status');

        $data['status'] = ($state == 1)? 2: 1;

        return $this->where('id='.$id)->save($data);
    }

    public function addGroup()
    {
        $group = M('auth_group');

        $groupName = I('post.groupName');

        $data['title'] = $groupName;

        $res = $group->where($data)->find();

        if ($res != null) {

            return array('res'=> false, 'msg'=>'该用户组已存在');
        }

        if ( empty($groupName) ) {

            return array('res'=> false, 'msg'=>'组名不能为空');
        }


        $res = $group->add($data);

        if ( $res ) {

            return array('res'=>true, 'msg'=>'添加成功');
        } else {

            return array('res'=> false, 'msg'=>'添加失败');
        }
    }

    public function getGroup()
    {

        $groupList = M('auth_group')->field('id, title, rules')->where('status=1')->select();

        $rule = M('auth_rule');   

        foreach($groupList as $k=>$val) {

            $map['id'] = array('in', $val['rules']);

            $tmp = $rule->field('group_concat(title) as auth')->where($map)->select(); 

            $groupList[$k]['auth'] = $tmp[0]['auth'];

        }

        return $groupList;

    }

    public function getGroupName()
    {

        $group = M('auth_group');

        $id = I('get.id');

        return $group->field('title')->where('id='.$id)->find();
    }

    public function editGroupName()
    {

        $group = M('auth_group');

        $id = I('post.id');

        $data['title'] = I('groupName');

        return $group->where('id='.$id)->save($data);
    }

    public function showAllAuth()
    {

        return M('auth_rule')->select();
    }

    public function haveAuth()
    {

        $id = I('get.id');

        return  M('auth_group')->where('id='.$id)->find();
    }

    public function showAuthType()
    {

        return M('type_rule')->select();
    }

    public function editGroupRule()
    {

        $rules = join(I('post.rules'), ',');
        
        $gid = I('post.gid');

        $data['rules'] = $rules;

        $group = M('auth_group');

        return $group->where('id='.$gid)->save($data);
    }

    public function showGroupmeMber()
    {

        $gid = I('get.id');
        $ids = M('auth_group_access')->field('group_concat(uid) ids')->where('group_id='.$gid)->find();

        $data['id'] = array('in', $ids['ids']);
 
        if ( $ids['ids'] !== null ) {

            $groupMember = $this->where($data)->select();

            $total = count($groupMember);

            $page = new \Think\Page($total, 8);

            $pageArr['show'] = $page->show();

            $pageArr['list'] = $this->where($data)->order('addtime desc')->limit($page->firstRow.','.$page->listRows)->select();

            return $pageArr;
        }

    }

    public function groupMemberDelete()
    {

        $uid = I('post.id');

        return M('auth_group_access')->where('uid ='.$uid )->delete();
    }

    public function NotInGroup()
    {

        $ids = M('auth_group_access')->field('group_concat(uid) ids')->find()['ids'];

        $data['id'] = array('not in', $ids);

        return $this->field('id,username')->where($data)->select();
    }

    public function groupMemberadd()
    {

        $gid = I('post.gid');

         foreach( I('post.adminId') as $v ) {
            $data[] = array('group_id'=>$gid, 'uid'=>$v);
         }

         return M('auth_group_access')->addAll($data);
    }

    public function deleteGroup()
    {

        $gid = I('post.gid');

        M()->startTrans();

        $data['id'] = $gid;

        $res = M('auth_group')->where($data)->delete();

        $admin = M('auth_group_access')->where('group_id='.$gid)->select();

        if ($res) {

            if (empty($admin)) {

                M()->commit();
                return true;
            }

            $data1['group_id'] = $gid; 


            $res1 = M('auth_group_access')->where($data1)->delete();

            if ($res1) {

                M()->commit();
                return true;
            } else {

                M()->rollback();
                return false;
            }

        } else {

            return false;
        }
    }

    public function showAdminInfo( $field,$params )
    {
        $data[$field] = $params;

        return $this->field($field)->where($data)->find();
    }

    public function showGroupName()
    {

        $data['title'] = I('post.groupName');

        return M('auth_group')->field('title')->where($data)->find();
    }

    public function selectFromGroup()
    {
        
        $data['uid'] = I('session.mgjAdmin')['id'];
        return M('auth_group_access')->field('group_id')->where($data)->find();
    }
}