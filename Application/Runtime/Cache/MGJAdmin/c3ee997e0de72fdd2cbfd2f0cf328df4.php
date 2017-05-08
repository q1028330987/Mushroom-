<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />

<link href="/Project/thinkphp_3.2.3_full/Public/static/h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="/Project/thinkphp_3.2.3_full/Public/static/h-ui.admin/css/H-ui.login.css" rel="stylesheet" type="text/css" />
<link href="/Project/thinkphp_3.2.3_full/Public/static/h-ui.admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Project/thinkphp_3.2.3_full/Public/lib/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css" />

<title>MGJ后台登录</title>
<meta name="keywords" content="MGJ后台模板">
<meta name="description" content="MGJ后台模板是workerman小组的写的">
</head>
<body>
<input type="hidden" id="TenantId" name="TenantId" value="" />
<div class="header">
    <h1 style="color:white;line-height:20px;">蘑菇街后台管理系统</h1>
</div>
<div class="loginWraper">
  <div id="loginform" style="padding-top:10px;height:520px;" class="loginBox">
    <form  id="myform" class="form form-horizontal" action="/Project/thinkphp_3.2.3_full/index.php/MGJAdmin/Public/signIn"  method="post">
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
        <div class="formControls col-xs-8">
          <input id="" required  name="username" type="text" placeholder="账户" class="input-text size-L">
          <div id="user_tip"></div>
        </div>
      </div>
      <div class="row cl">
        <label  class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
        <div class="formControls col-xs-8">
          <input id=""  required name="userpassword" type="password" placeholder="密码" class="input-text size-L">
          <div id="tip_pass" style="font-size:14px;"></div>
        </div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input required   class="input-text size-L" type="text" placeholder="验证码" name="code"  value="" style="width:120px;">
          <img  class="verifyimg reloadverify" src="<?php echo U('Public/makeCode');?>"> 
          <a class="reloadverify" title="换一张" href="javascript:void(0)">换一张？</a>
          <div id="tip_code"></div>
        </div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <a  href="javascript:;"onclick="return check()" class="btn btn-success radius size-L" >登&nbsp;&nbsp;&nbsp;&nbsp;录</a>
          <input name="" type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
        </div>
      </div>
    </form>
  </div>
</div>
<div class="footer">MGJ后台登录系统</div>
<script type="text/javascript" src="/Project/thinkphp_3.2.3_full/Public/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Project/thinkphp_3.2.3_full/Public/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript">
  // 验证码点击切换
    var verifyimg = $(".verifyimg").attr("src");

          $(".reloadverify").click(function(){

              if( verifyimg.indexOf('?')>0){

                  $(".verifyimg").attr("src", verifyimg+'&random='+Math.random());

              }else{

                  $(".verifyimg").attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
              }

          })

        
            $('input[name=username]').blur(
              function(){

              var that=$(this);
              var userVal= $(this).val();
              var URL = "/Project/thinkphp_3.2.3_full/index.php/MGJAdmin/Public/ajaxCheckUser";

              if(userVal!="") {
            
                  $.post(

                    URL,

                    {userval :userVal}, 
                    
                    function (data){

                      $('span[data-user="true"]').remove();

                      if(data==1){

                          $('#user_tip').html('<span data-user="true" style="color:red;font-size:12px;">用户名不存在</span>');  

                          $('input[type="submit"]').attr('disabled',true );
                      }else{

                          $('input[type="submit"]').removeAttr("disabled");

                          $('span[data-user="true"]').remove();
                      } 

                  },'json')
              }

            });

            function check(){
                var codeval = $('input[name=code]').val() ;

                var userval = $('input[name=username]').val() ;

                var passval = $('input[name=userpassword]').val() ;

                $('span[data-user="true"]').remove();

                if( userval==""){
                     $('#user_tip').html('<span  data-user="true" style="color:red;font-size:12px;">用户名不能为空</span>');

                    return false;
                }else{
                    $('span[data-user="true"]').remove();
                }


                $('span[data-pass="true"]').remove();

                if( passval=="" ){
                    $('#tip_pass').html('<span  data-pass="true" style="color:red;font-size:12px;">密码不能为空</span>');
                    return false;
                }else{
                    $('span[data-pass="true"]').remove();
                }

                $('span[data-code="true"]').remove();

                if( codeval=="" ){
                    $('#tip_code').html('<span  data-code="true" style="color:red;font-size:12px;">验证码不能为空</span>');
                    return false;
                }else{
                    $('span[data-code="true"]').remove();
                }

                var URL1 = "<?php echo U('ajaxCheckCode');?>";

                var codeval = $('input[name="code"]').val();

                // if( $('span[data-codetip]').attr('data-codetip')!="true" ){
                    $.ajax({
                      type:"post",
                      url:URL1, 
                      data:"code="+codeval, 
                      success:function (data){
                          $('span[data-codetip="true"]').remove();
                          if(data==2){
                               $('#tip_code').html('<span  data-codetip="true" style="color:red;font-size:12px;">验证码不正确</span>');

                          }else{
                               $('span[data-codetip="true"]').remove();

                                document:myform.submit();
                          }

                      }

                    });
                // }

            }
</script>
</body>
</html>