<?php

    namespace Home\Controller;

    use Think\Controller;

    class PersonalController extends CommonController
    {   

        /**
         * [显示个人中心页面]
         * @return [没有返回值]
         */
        public function index()
        {

                $userInfo = D('Personal')->userDetailData();

                $this->assign('username', $_SESSION['home']['username']);

                $userInfo['address'] = explode( ',',$userInfo['address']);

                $this->assign('userInfo', $userInfo);

                $this->display();

        }

        /**
         * 通过ajax获取城市的值 
         * @return [null]  没有返回值
         */
        public function ajaxarea()
        {

            if(IS_AJAX){

                $proivnce =  I('post.name');

                // dump($proivnce);
                $map['name'] = $proivnce;

                $proivnceData =  M('district')->field('id')->where($map)->find();

                $data['upid'] = $proivnceData['id'];

                $cityData = M('district')->where($data)->select();

                echo json_encode($cityData);                
            }

        }

        /**
         * 这个方法是用来修改用户数据
         * @return  [null] 没有返回值
         */
        public function editUserDetail()
        {

            $res = D('Personal')->handleUserDetail();

            if($res==1){

                $this->redirect('index');

            }else if($res==2){

                $this->error('修改失败');

            }
        }

        /**
         * 这个方法是用来处理ajax获取省份的信息
         */
        public function ajaxGetProivnce()
        {
            if(IS_AJAX){

               $upid =  I('post.upid');

               $map['upid'] = $upid;

               $proivnce =  M('district')->where($map)->field('id,name,level,upid')->select();
               echo json_encode($proivnce);
            }

        } 

        /**
         * 这个方法是获取区的
         */
        public function ajaxGetArea()
        {
            if(IS_AJAX){

               $name =  I('post.name');

               $map['name'] = $name;

               $areaRes =  M('district')->field('id')->where($map)->find();

               $where['upid'] = $areaRes['id'];

               $areaData = M('district')->where($where)->select();

               echo json_encode($areaData);


            }

        }

        /**
         * 这个方法是用来添加用户地址
         */
        public function addAddress()
        {
            if(IS_POST){

                 $res = D('Personal')->handleUserAddress();
                if($res==1){

                    $this->error('地址不合法');

                }else if( $res == 4 ){
                       $this->error('邮遍不合法');
                   
                }else if( $res==3 ){

                    $this->error('收货人不能为空');

                }else if( $res==2 ){

                    $this->error('详情地址不合法');


                }else if ( $res==5 ){

                    $this->error('电话不合法');

                }else if( $res==0 ){

                    $this->error('未知错误');

                }else{

                    $this->redirect('showAddress');

                }
            }

        }
        
        /**
         * 显示地址页面
         */
        public function showAddress()
        {

            $id = $_SESSION['home']['id'];

            $phone = $_SESSION['home']['phone'];

            $userDetail = M('user_detail')->where('phone='.$phone)->find();

            $arrAdd = M('address')->where('uid='.$id)->select();

             foreach ( $arrAdd  as $key => $value) {

                        $value['address'] =explode(',', $value['address']);

                        $arrAdd[$key]['address'] = join($value['address']);

                        // 处理详情地址

                }


            $this->assign('userDetail', $userDetail);

            $this->assign('arrAdd', $arrAdd);

            $this->display('showAddress');
        }

        /**
         * 这个方法值用来编辑地址
         * 
         */ 
         public function editUserAddress()
         {
            if(IS_AJAX){

                $aid =  I('post.aid');
                
                $resAdd = M('address')->where("id=".$aid)->find();

                if($resAdd){

                    $resAdd['a']= explode(',',$resAdd['address']);
                    // 获取所有的省
                    $resAdd['province']=M('district')->where('upid=0')->select();


                    // 获取省的下面的市
                    $proName['name'] = $resAdd['a'][0];

                    $proId =  M('district')->where( $proName )->find();

                    $resAdd['city'] = M('district')->where('upid='.$proId['id'])->select();

                    // 获取当前市的区
                    $areaName['name'] = $resAdd['a'][1];

                    $cityId=M('district')->where($areaName)->find();

                    $resAdd['area'] = M('district')->where("upid=".$cityId['id'])->select();
                    // 处理处详情地址
                    $resstr1 = join($resAdd['a']);

                    $res= $this->diffStr($resstr1,$resAdd['det_detail']);

                    foreach ($res as $key => $value) {

                           $arr[]=$res[$key]['s2'];
                           join($arr);
                    }
                    $resAdd['det_detail'] = join($arr);

                    echo json_encode($resAdd);
                }else{

                    $this->ajaxReturn(2);//编辑失败
                }
            }
           

         }

         /*
        *比较字符串不同的字符
        *@参数：$str1:第一个字符串，$str2:第二个字符串
        *@返回值：不同字符串的数组，
        */
        public function diffStr($str1,$str2)
        {
            preg_match_all("/./u", $str1, $arr1);
            preg_match_all("/./u", $str2, $arr2);  
             
            $sArr1 = $arr1[0];
            $sArr2 = $arr2[0];   
             
            $num1  = count($sArr1);
            $num2  = count($sArr2);
               
            $aNew  = array();
                   
            if($num1 > $num2){
                foreach($sArr1 as $k=>$val){
                    if($num2 > $k && $val != $sArr2[$k]){
                        $aNew[] = array('s1'=>$val,'s2'=>$sArr2[$k]);
                    }elseif($num2 <= $k){             
                        $aNew[] = array("s1"=>$val);
                    }  
                }  
            }elseif($num1 < $num2){
                foreach($sArr2 as $k=>$val){
                    if($num1 > $k && $val != $sArr1[$k]){
                        $aNew[] = array('s1'=>$sArr1[$k],'s2'=>$val);
                    }elseif($num1 <= $k){
                        $aNew[] = array("s2"=>$val);  
                    }  
                }
            }elseif($num1 == $num2){
                foreach($sArr1 as $k=>$val){
                    if($val != $sArr2[$k]){              
                        $aNew[] = array('s1'=>$val,'s2'=>$sArr2[$k]);
                    }  
                }  
            }
               
            return $aNew;
        }

        /**
         * 这个方法是来编辑用户地址
         * 参数 无
         * 返回 无
         */
        public function editAddress()
        {
           $res =  D('Personal')->handleEditAddress();

           if( $res==1 ){

                $this->error('非法闯入');

           }else if( $res==2 ){

                $this->error('地址不合法');

           }else if( $res==3 ){

                $this->error('邮编不合法');

           }else if( $res==4 ){

                $this->error('详情地址不合法');

           }else if( $res==5 ){

                $this->error('收货人不能为空');
           }else if( $res==6 ){
                $this->error('电话不合法');
           }else if( $res==7 ){

                $this->redirect('showAddress');
           }else if( $res==8 ){
                $this->redirect('showAddress');
           }
        }

        /**
         *这个方法负责删除地址
         * 
         */
        public function delAddress()
        {

            if(IS_AJAX){

                $aid = intval(I('post.aid'));
                $map['id'] = $aid;
                $res = M('address')->where($map)->delete();

                if($res){
                    
                    $this->ajaxReturn(1);//删除成功
                }else{
                    $this->ajaxReturn(2);//删除失败
                }
            }

        }

        /**
         * 这个方法是用来设置默认地址的
         *
         * return 对象
         */
        public function setDefaultAddress()
        {

            if(IS_AJX){

               $aid =  intval(I('post.aid'));

               $map['id'] = $aid;

               $status['status'] = 2;

               // 查询当前的状态是否为1
                $current =  M('address')->field('status')->where($map)->find();

                $current['status'] = ($current['status']==1)? 2 : 1;

               // 先把其他等于1的状态修改位2
               $res = M('address')->where("status=1")->save($status);

               // 在把条件的地址的设为1
               $bool = M('address')->where($map)->save( $current );


               if($bool){

                    // 成功
                    $this->ajaxReturn(1);

               }else{

                    $this->ajaxReturn(2);
               }

            }
        }

        /**
         * 这个方法是用来检验用户密码是否正确
         *
         * return ajax
         */
        public function ajaxCheckPass()
        {
            if( IS_AJAX ){

                $data['username'] = $_SESSION['home']['username'];

                $map['pass'] = I('post.pass');

                $userInfo = M('user')->field('userpass')->where($data)->find();

                $bool = password_verify( $map['pass'], $userInfo['userpass'] );

                if( $bool ){

                    $this->ajaxReturn(1);//可以设置
                }else{
                    $this->ajaxReturn(2);//校验失败
                }

            }


        }


        /**
         * [setNewPass 这个方法负责修改用户密码]
         */
        public function setNewPass()
        {
            $res = D('Personal')->setUserPass();

            if($res==1){
                $this->error('填写的密码不能为空');
            }else if($res==2){
                $this->error('两次密码不相等');
            }else if($res==3){
                $this->error('新密码等级不能为弱');
            }else if($res==4){
                $this->display('User/login');
            }else if($res==5){
                $this->error('修改失败');
            }
        }

        /**
         * 这个方法是用来验证意见反馈内容是否合法的
         */
        public function feedBackVerify()
        {
            if (IS_POST) {

                $username = I('post.username');

                $phonenumber = I('post.phonenumber');

                $content = I('post.content');
                
                //对输入的姓名进行匹配，是否有特殊字符
                $res = preg_match("/[\'.,:;*?~`!@#$%^&+=)(<>{}]|\]|\[|\/|\\\|\"|\|/",$username);

                if ($res) {

                    echo json_encode('用户名不能有特殊字符');
                    exit;
                }

                //对用户名进行判断，是否为空
                if (empty($username)) {

                    echo json_encode('用户名不能为空');
                    exit;
                }

                //判断用户名中是否有空格
                $res = preg_match('/ /',$username,$m);

                if ($res == 1) {

                    echo json_encode('用户名不能有空格');
                    exit;
                }

                //判断输入的手机号码是否合法
                $res = preg_match("/^((13[0-9])|(14[5|7])|(15([0-3]|[5-9]))|(18[0,5-9]))\\d{8}$/",$phonenumber);

                if (!$res) {

                    echo json_encode('您输入的电话号码不合法');
                    exit;
                }

                if (empty($content)) {

                    echo json_encode('您输入的内容不能为空');
                    exit;
                }

            }
        } 
        


        /**
         * 这个方法是用来接收验证后的意见反馈的内容，并存入数据库中
         */
        public function feedBack()
        {

            if (IS_POST) {

                //实例化模型
                $feedBackModel = D('Personal');

                $res = $feedBackModel->feedBackAdd();

                if ($res) {

                    $this->success('感谢您宝贵的意见',U('index'),3);
                } else {
                    $this->error('系统繁忙，提交失败啦，请稍候再试',U('feedback'),3);
                }
            } else {

                //加载意见反馈的模板
                $this->display('');
            }
        }

    }   