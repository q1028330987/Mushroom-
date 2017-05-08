<?php

namespace MGJAdmin\Controller;

use Think\Controller;

class AdministratorsController extends CommonController 
{
    /**
     * [adminList description] 加载管理组列表
     * @return [viod]
     */
    public function roleGroup()
    {

        $groupList = D('Administrators')->getGroup();

        $this->assign('groupList', $groupList);

        $this->display('Administrators/admin-role');
    }

    public function editGroup()
    {
        if (IS_POST) {

            $res = D('Administrators')->editGroupName();

            if ( $res ) {

                echo "<script>parent.document.location.reload()</script>";
            } else {

                $this->error('修改失败');
            }

        } else {

            $groupName = D('Administrators')->getGroupName();

            if ($groupName) {

                $this->assign('groupName', $groupName['title']);

                $this->assign('id', I('get.id'));

                $this->display('admin-group-edit');
            } else {

                $this->error('亲，请别乱来');
            }

        }
    }

    public function adminList()
    {
        $pageArr = D('Administrators')->showAdminList();

        $this->assign('list', $pageArr['list']);
        $this->assign('show', $pageArr['show']);
        $this->display('admin-list');
    }

    /**
     * [adminAdd description] 添加管理员
     * @return [viod]
     */
    public function adminAdd()
    {

        if ( IS_POST ) {

            $admin = D('Administrators');

            if ( !$admin->create() ) {

                $this->error( $admin->getError() );
            } else {

                $admin->add();

                echo "<script>parent.document.location.reload()</script>";
            }

        } else {

            $this->display('admin-add');
        }
    }

    /**
     * [adminEdit 编辑用户]
     * @return [viod]
     */
    public function adminEdit()
    {

        if ( IS_GET ) {

            $id = I('get.id');

            $adminInfo = D('Administrators')->findAdminInfo();

            if ($adminInfo) {

                $this->assign('adminInfo', $adminInfo);

                $this->assign('id', $id);

                $this->display('admin-edit');

            } else {

                $this->error('亲，请别乱来');
            }

        } else {

            $edit = D('Administrators');

            $status = $edit->editAdmin();

            if ( $status['status'] == 0) {

                $this->error( $edit->getError() );
            }

            if ( $status['status'] == 1 ) {

                echo "<script>parent.document.location.reload()</script>";

            } else if ( $status['status'] == 2 ) {

                $this->error('修改失败');
            }
        }

    }

    public function adminDelete()
    {


        $selfId = I('session.mgjAdmin')['id'];
        
        if ( $selfId == I('post.id') ) {

        
            $this->ajaxReturn(2);
        }

        $bool = D('Administrators')->deleteOne();

        if ($bool) {

            $this->ajaxReturn(1);
        } else {

            $this->ajaxReturn(2);
        }
    }

    public function editState()
    {

        if ( IS_AJAX ) {

            $selfId = I('session.mgjAdmin')['id'];

            if ( $selfId == I('post.id') ) {

                $data['status'] = false;
            
                $this->ajaxReturn($data);
            }

            $return = D('Administrators')->updateState();

            if ($return) {

                $data['state'] = (I('post.status') == 1)? 2: 1;
                $data['status'] = 1;

                $this->ajaxReturn($data);
            } else {

                $data['status'] = false;
                
                $this->ajaxReturn($data);
            }
        } else {

            $this->error('请通过ajax来访问');
        }
    }

    public function addGroup()
    {
        if (IS_GET) {

            $this->display('admin-group-add');
        } else {

            $groupRes = D('Administrators')->addGroup();

            if ( !$groupRes['res'] ) {

                $this->error( $groupRes['msg'] );
            } else {

                echo "<script>parent.document.location.reload()</script>";
            }
        }
    }

    public function deleteGroup()
    {

        if(IS_AJAX) {

            $gid = D('Administrators')->selectFromGroup();

            if ( $gid == I('post.gid') ) {

                $this->ajaxReturn(2);
            }

            $delRes = D('Administrators')->deleteGroup();

            if ($delRes) {

                $this->ajaxReturn(1);
            } else {

                $this->ajaxReturn(0);
            }
        } else {

            error('请通过ajax来访问');
        }
    }

    public function authRole()
    {

        if (IS_POST) {

            $editRes = D('Administrators')->editGroupRule();

            if ($editRes) {

                $this->success('修改成功', U('roleGroup'));
            } else {
                $this->error('修改失败');
            }
           
        } else {


            $gid = I('get.id');

            $groupName = I('get.groupName');

            $admin = D('Administrators');

            $allAuth = $admin->showAllAuth();

            $haveAuth = $admin->haveAuth();

            $typeRule = $admin->showAuthType();

            foreach ($allAuth as $auth) {

                foreach ($typeRule as $key=>$type) {

                    if ($auth['typeid'] == $type['id']) {

                        $typeRule[$key]['rule'][] = $auth;
                    }
                }
            }

            $this->assign('allAuth', $typeRule);
            $this->assign('groupName', $groupName);
            $this->assign('gid', $gid);

            $this->assign('haveAuth', $haveAuth);

            $this->display('admin-role-edit');
        }
    }

    public function groupMember()
    {

        $groupMember = D('Administrators')->showGroupmeMber();

        $this->assign('Member', $groupMember);

        $this->assign('list', $groupMember['list']);

        $this->assign('groupName', I('get.groupName'));

        $this->assign('gid', I('get.id'));

        $this->assign('show', $groupMember['show']);
        
        $this->display('group-member');
    }

    public function groupMemberDelete()
    {

        $bool = D('Administrators')->groupMemberDelete();

        if ($bool) {

            $this->ajaxReturn(1);
        } else {

            $this->ajaxReturn(2);
        }
    }

    public function groupMemberAdd()
    {

        if ( IS_POST ) {

            $bool = D('Administrators')->groupMemberadd();

            if ($bool) {

                echo "<script>parent.document.location.reload()</script>";
            } else {

                $this->error('添加失败');
            }

        } else {

            $list = D('Administrators')->NotInGroup();

            $this->assign('groupName', I('get.groupName'));

            $this->assign('gid', I('get.gid'));


            $this->assign('list', $list);

            $this->display('group-member-add');

        }
    }

    public function ajaxValiAdminName()
    {

        if (IS_AJAX) {

            $res = D('Administrators')->showAdminInfo( 'username', I('post.adminName'));

            if ($res == null) {

                $this->ajaxReturn(false);
            } else {

                $this->ajaxReturn(true);
            }
        } else {

            $this->ajaxReturn(false);
        }
    }

    public function ajaxValiAdminPhone()
    {

        if (IS_AJAX) {

            $res = D('Administrators')->showAdminInfo( 'phone', I('post.adminPhone'));

            if ($res == null) {

                $this->ajaxReturn(false);
            } else {

                $this->ajaxReturn(true);
            }
        } else {

            $this->ajaxReturn(false);
        }
    }

    public function ajaxValiAdminEmail()
    {

        if (IS_AJAX) {

            $res = D('Administrators')->showAdminInfo( 'email', I('post.adminEmail'));

            if ($res == null) {

                $this->ajaxReturn(false);
            } else {

                $this->ajaxReturn(true);
            }
        } else {

            $this->ajaxReturn(true);
        }
    }

    public function ajaxValiGroupName()
    {

        if (IS_AJAX) {
            
            $res = D('Administrators')->showGroupName();

            if ($res == null) {
                dump($res);
                $this->ajaxReturn(false);
            } else {

                $this->ajaxReturn(true);
            }
        } else {

            $this->ajaxReturn(true);
        }
    }
}