<?php

    namespace Home\Model;

    use Think\Model;

    class  PersonalModel extends Model
    {
        protected $trueTableName = "mgj_user_detail";

        /**
        *[这个方法是用来查询出用户详情信息]
        * @param  [type]        没有参数
        * @return [mixed]       混合类型
        */
        public function userDetailData()
        {

            $data['phone'] = $_SESSION['home']['phone'];

            $userInfo = $this->field('id,address,birthday,job,grade,pic,phone,sex,introduce')->where($data)->find();

            if($userInfo){
                
                return $userInfo;

            }else{

                return false;
            }
        }

        /**
         *[处理用户详情数据添加到数句库中]
         * @param  [type]        没有参数
         * @return [int]        [整型]
         */
        // 这个方法是用来处理用户详情数据
        public function handleUserDetail()
        {   

            $map['phone'] = I('post.phone');//限制条件

            


            $data['sex'] = I('post.sex');

            $data['address'] = I('post.province').','.I('post.city');

            $birthday = I('post.birthday');

            $data['birthday']= join('-',$birthday);

            $data['birthday'] = strtotime($data['birthday']);

            $data['job']= I('post.job');

            $data['introduce']= I('post.introduce');

            $file =  $_FILES['pic'];

            $arr = $this->uploadOne($file);

            if($arr['code'] ==200){

                $data['pic'] = $arr['msg'];

                $res = $this->where($map)->save($data);
                

                if($res){
                    return 1;//修改成功
                }else{
                    return 2;//修改失败a
                }


            }else{

                unlink($arr['picurl']);
                $res = $this->where($map)->save($data);
                 if($res){
                    return 1;//修改成功
                }else{
                    return 2;//修改失败a
                }

            }

        }

        /**
         * [用于单文件头像的上传]
         * @param  [array] $files [$_FILES['pic']]
         * @return [array]        [返回数组类型]
         */
        protected function uploadOne($files)
        {

            $upload = new \Think\Upload();

            $upload->maxSize = 3145728;

            // 设置附件上传类型
            $upload->exts   =   array('jpg', 'gif', 'png', 'jpeg');

            //设置根目录
            $upload->rootPath = './Public/';

            // 设置附件上传目录
            $upload->savePath  = './personal/'; 

            $info = $upload->uploadOne($files);
            if (!$info) {

                //上传失败
                return array(
                    'msg' => $upload->getError(),
                    'picurl'=>$info['savepath'].$info['savename'],
                    'code' => 404
                );
            } else {

                //上传成功
                return array(
                    'msg' => $info['savepath'].$info['savename'],
                    'code' => 200
                );
                
            }
        }

        /**
         *[处理地址数据添加到数据库]
         * @return [mixed]        [返回混合类型]
         */
        public function handleUserAddress()
        {
            if(IS_POST){

                $data = I('post.');
                // 后台判断
                if( empty($data['uid']) ){
                    return 0;//用户ID为空
                }
                if( empty($data['province']) || empty($data['city']) || empty($data['area'])){
                   return 1;//地址不和合法
                }

                // PHP中匹配中文字符的编码
                $pattern = '/^[\x{4e00}-\x{9fa5}]+$/u';

                if((!preg_match($pattern, $data['province']) ) || (!preg_match($pattern,$data['city'])) || (!preg_match($pattern, $data['area'])) ){
                    return  1;//地址不合法
                }

                    // 邮编的匹配
                $preg = '/^\d{6}$/';

                if( !preg_match($preg, $data['postcode']) ){
                     return 4;//邮遍不合法
                }  
                // PHP匹配中文字符
                // $pattern1 = '/^[\x{4e00}-\x{9fa5}]{5,100}$/u';

                if( strlen($data['street'])<5  ){

                   return 2;//详情地址不合法
                }

                // 收货人不能为空
                if( empty($data['name']) ){

                   return 3;//收货人不能为空
                }

                // 电话匹配
                $preg2 = '/^1[34578]\d{9}$/';

                if( !preg_match($preg2, $data['mobile']) ){

                   return 5;//电话不合法
                }

                $address['address'] = $data['province'].','.$data['city'].','.$data['area'];
                $address['det_detail'] = $data['street'];
                $address['uid'] = $data['uid'];
                $address['code'] = $data['postcode'];
                $address['name'] = $data['name'];
                $address['tel'] = $data['mobile'];
                $address['status'] = 2;//不设为默认地址

                $res = M('address')->add($address);
                if($res){
                    return $address;
                }else{
                    return 6;
                }

            }
           
        } 

        /**
         * 这个方法处理用户编辑地址
         * @return  int  
         */
       
        public function handleEditAddress()
        {

            if(IS_POST){
                $map['uid'] = I('post.uid');
                $map['id'] = I('post.aid');

                if( empty($map['uid'])|| empty(I('post.aid')) ){
                    return 1;//非法闯入
                }
                $data['address'] = I('post.province').','.I('post.city').','.I('post.area');

                if( empty( I('post.province') ) || empty( I('post.city') ) || empty(I('post.area')) ){

                    return 2;//地址不合法
                }

                $pregcode = '/^\d{6}$/';

                if( !preg_match($pregcode, I('post.postcode1')) ){
                    return 3;//邮编不合法
                }

                 // PHP匹配中文字符
                $pattern1 = '/^[\x{4e00}-\x{9fa5}]{5,100}$/u';
                if( !preg_match($pattern1, I('post.street1')) ){
                    return 4;//详情地址不合法  
                }

                $data['name'] = I('post.name1');

                if( empty($data['name']) ){
                    return 5;//收货人不能为空
                }

                 $pattern = '/^1[34578]\d{9}$/';

                if( !preg_match($pattern, I('post.mobile1')) ){

                    return 6;//电话不合法
                }

                $data['tel'] = I('post.mobile1');
                $data['code'] =I('post.postcode1');
                $data['det_detail'] =I('post.street1');
                $bool = M('address')->where($map)->save($data);

                 // echo M('address')->getLastSql();exit;

                if($bool){

                    return 7 ;

                }else{
                    return 8;  
                }

            }
            
        }
        /**
         * 这个方法负责通过处理修改密码的数据
         */
        public function setUserPass()
        {

            if(IS_POST){
                $username['username'] =  $_SESSION['home']['username'];

                $oldpass  = I('post.oldpass');
                $newpass = I('post.newPass');
                $confrimpass = I('post.confrimPass');

                if( empty($oldpass) || empty($newpass) || empty($confrimpass) ){

                    return 1;   //填写的密码不能为空
                }
                if($newpass!=$confrimpass){
                    return 2;//两次密码不相等
                }

                $preg = "/^(?![\d]+$)(?![a-zA-Z]+$)(?![!#$%^&*]+$)[\da-zA-Z!#$%^&*]{6,20}$/";
                if( !preg_match($preg, $newpass) ){
                    return 3;//新密码等级不能为弱
                }


                $data['userpass'] = password_hash($newpass, PASSWORD_DEFAULT);

                $bool = M('user')->where($username)->save($data);

                if( $bool ){
                    if(isset($_COOKIE[session_name()]))setCookie(session_name(),'',time()-1,'/');

                    // 摧毁垃圾文件
                    session_destroy($_SESSION['home']);
                    return 4;//修改成功
                }else{
                    return 5;//修改失败
                }
            }

        }

        /**
         * [feedBackAdd description]负责处理意见反馈的提交
         * @return [type] [description]
         */
        public function feedBackAdd()
        {
            // dump(I('post.'));
            
            $username = I('post.username');

            $phonenumber = I('post.phonenumber');

            $content = I('post.content');

            $data['username'] = $username;

            $data['tel'] = $phonenumber;

            $data['contents'] = $content;

            $res = M('feedback')->add($data);

            return $res;
        }


    }   
