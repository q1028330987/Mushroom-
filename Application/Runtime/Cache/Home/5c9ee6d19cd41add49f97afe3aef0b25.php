<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript">
            window.__trace__headstart = +new Date;
            window.__server__startTime = 1490959841860;
            window.__token = "F87D4KxML4wIVYcBg6x0m3PaJTh8TxEGJ%2B1DkI4wG3CgrzwIcn1cK5%2BGSadKzuR56unr%2BS2Fz9qM%2Blroz9ikPA%3D%3D";
        </script>
        <link rel="dns-prefetch" href="http://s6.mogucdn.com/">
        <link rel="dns-prefetch" href="http://s7.mogucdn.com/">
        <link rel="dns-prefetch" href="http://s6.mogujie.cn/">
        <link rel="dns-prefetch" href="http://s7.mogujie.cn/">
        <link rel="dns-prefetch" href="http://s8.mogujie.cn/">
        <link rel="dns-prefetch" href="http://s9.mogujie.cn/">
        <link rel="dns-prefetch" href="http://s12.mogujie.cn/">
        <link rel="dns-prefetch" href="http://s13.mogujie.cn/">
        <meta http-equiv="Cache-Control" content="no-transform ">
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>
            登录_蘑菇街
        </title>
        <meta name="keywords" content="蘑菇街账号登录,蘑菇街登陆">
        <meta name="description" content="蘑菇街登陆页面，欢迎回家">
        <meta name="copyright" content="mogujie.com">
        <link rel="search" type="application/opensearchdescription+xml" href="http://portal.mogujie.com/opensearch.xml">
        <link rel="icon" href="http://s16.mogucdn.com/new1/v1/bmisc/3ce382db3c8aaca5d07bd36711e77134/171169993508.ico"
        type="image/x-icon">
        <script type="text/javascript">
            var curl = {
                apiName: 'require'
            };
            var MOGU = {};
            var MoGu = {};
            var MOGU_DEV = 0 || "online" == "pre";
            var M_ENV = "online";
        </script>
        <link href="/Project/thinkphp_3.2.3_full/Public/login/index.css-6f9e6f5a.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="/Project/thinkphp_3.2.3_full/Public/login/bottom.css"
        media="all">
        <link href="/Project/thinkphp_3.2.3_full/Public/login/index.css-a2ca6727.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="/Project/thinkphp_3.2.3_full/Public/login/pkg-pc-base.js-5299c175.js.下载">
        </script>
        <script type="text/javascript">
            if (window.require) {
                require.config({
                    domain: 0
                });
            }

            MOGUPROFILE = {};
        </script>
        <link rel="stylesheet" type="text/css" href="/Project/thinkphp_3.2.3_full/Public/login/ie67upgrade.css">
        <link rel="stylesheet" type="text/css" href="/Project/thinkphp_3.2.3_full/Public/login/bottom(1).css">
    </head>
    
    <body class="media_screen_1200">
        <script type="text/javascript">
            /**
    ** for layout 960
    **/
            (function() {
                var wWidth = $(window).width();
                if (wWidth < 1212) {
                    $('body').addClass('media_screen_960');
                } else {
                    $('body').addClass('media_screen_1200');
                }
                //initTime for log 判断对象是否存在
                window.MoGu && $.isFunction(MoGu.set) && MoGu.set('initTime', (new Date()).getTime());

                var ua = navigator.userAgent;
                // 判断是否是ipad
                var is_plat_ipad = ua.match(/(iPad).*OS\s([\d_]+)/);
                if (is_plat_ipad) {
                    $('body').addClass('media_ipad');
                }
                // 判断是否是ipadApp
                var is_plat_ipadApp = ua.indexOf('MogujieHD') >= 0 || ua.indexOf('Mogujie4iPad') >= 0 || location.href.indexOf('_atype=ipad') >= 0;
                if (is_plat_ipadApp) {
                    $('body').addClass('media_ipad_app');
                    // 隐藏头尾
                    $('body').append('<style type="text/css">.header_2015,.header_nav,.foot .foot_wrap{display: none;}.foot{height: 0;background: none;}.back2top_wrap{height:0;width:0;overflow:hidden;opacity:0;}</style>');
                    // 移除购物车，返回顶部
                    setTimeout(function() {
                        $('.back2top_wrap').remove();
                    },
                    1000)
                }
            })();
        </script>

        <div id="body_wrap">
            <div class="login_wrap">
                <div class="logo_wrap">
                    <div class="logo">
                        <a title="蘑菇街" href="<?php echo U('Index/index');?>" class="logo_img">
                        </a>
                    </div>
                </div>
                <div class="content clearfix" style="background:url(http://s17.mogucdn.com/p2/170105/upload_541i9di2b3icf9j13f24e0bg7b1i6_1920x600.png) no-repeat center center;">
                    <div class="lg_banner">
                        <a href="<?php echo U('Index/index');?>"
                        target="_blank" class="banner1">
                        </a>
                    </div>
                    <div class="lg_left ui-option-main-box" id="lg_content">
                        <!-- 登录方式tab -->
                        <div class="toggle-qrcode">
                        </div>
                        <div class="qrcode-wrapper hidden">
                            <div class="toggle-regular">
                            </div>
                            <div class="scan-login">
                            </div>
                            <div id="qrcodeimg">
                            </div>
                            <a class="click-download" href="http://www.mogujie.com/apps/mobile?ptp=1.6AiTYG0q._foot.10.RoGbZ"
                            target="_blank">
                                点击下载蘑菇街APP
                            </a>
                        </div>
                        <div class="login_mod_tab">
                            <div class="fl mod">
                                <a class="lo_mod" lo-mod="normal" href="javascript:;" title="普通登入">
                                    用户登录
                                </a>
                            </div>
                        </div>
                        <div id="signform" class="formbox">
                            <p id="error_tip"></p>
                            <div class="lg_form easy_buy">
                                <form  id="myform" action="<?php echo U('login');?>" method="post">
                                    <!-- 正常登录 start -->
                                    <div class="" data-isshow="0">
                                        <div class="ui-sign-item ui-name-item lg_item lg_name">
                                            <input type="text"  maxlength="32" class="ui-input pwd_text" data-type="username"
                                            name="uname" placeholder="用户名/邮箱/手机号" style="border-color:#CFCFCF;">
                                        </div>
                                        <div class="ui-sign-item ui-sign-common-item lg_item lg_pass">
                                            <input type="password"  maxlength="32" class="ui-input pwd_text" data-type="loginpassword"
                                            name="pass" value="" placeholder="密码" style="border-color:#CFCFCF;">
                                        </div>
                                         <div id="showCode" class="ui-sign-item ui-sign-common-item lg_item lg_pass" style="display:none;overflow:visible;" >
                                              <input  class="ui-input pwd_text" type="text" style="vertical-align:middle;width:120px;" placeholder="验证码" name="code" >
                                              <img style="vertical-align:middle;width:175px;height:48px;"  class="verifyimg reloadverify" src="<?php echo U('makeCode');?>"><br />
                                              <span id="tip_code"></span>
                                        </div>
                                    </div>
                                    <style>
                                    .sub:hover{
                                            text-decoration: none;
                                    }
                                    </style>
                                    <!-- 正常登录 end -->
                                    <div class="lg_login clearfix" style="text-align:center;">
                                        <span><a onclick="return check()" href="javascript:;"  class="sub" id="button1">登 录</a></span>
                                    </div>
                                    <div class="ot_login">
                                        <div class="ot_btn clearfix">
                                            <a class="ui-ot-btn mr-42" href="javascript:;" data-type="qq">
                                                <img src="/Project/thinkphp_3.2.3_full/Public/login/upload_5763lkilh8f7abid345gbhh167d79_19x19.png">
                                                QQ登录
                                            </a>
                                            <a class="ui-ot-btn mr-42" href="javascript:;" data-type="weixin">
                                                <img src="/Project/thinkphp_3.2.3_full/Public/login/upload_8d4dd486c18961b55lf0hbe5ebf7l_18x19.png">
                                                微信登录
                                            </a>
                                            <a class="ui-ot-btn" href="javascript:;" data-type="sina">
                                                <img src="/Project/thinkphp_3.2.3_full/Public/login/upload_5i9ki009bi6kkc7lg3iibbbel7f6k_18x19.png">
                                                微博登录
                                            </a>
                                        </div>
                                    </div>
                                    <div class="lg_reg">
                                        <a class="findpwd" href="<?php echo U('forgetPass');?>">
                                            忘记密码<?php echo (session('errortimes')); ?>
                                        </a>
                                        <a class="regist" href="<?php echo U('register');?>">
                                            免费注册
                                        </a>
                                    </div>
                                    <input type="hidden" value="" id="imgcheckvalue">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script id="_script">
            </script>
        </div>
        <div class="token" data-token="">
        </div>
        
            
    <div class="foot J_siteFooter" data-ptp="_foot">
        <div class="mgj_copyright">
            <div class="mgj_footer_helper">
                <div class="mgj_footer_helper_mod">
                    <div class="mgj_footer_helper_mod_container">
                        <h4 class="mgj_footer_helper_title color_666">
                            - 新手帮助 -
                        </h4>
                        <ul>
                            <li class="mgj_footer_helper_item">
                                <a rel="nofollow" target="_blank" class="color_999" href="javascript:;">
                                    常见问题
                                </a>
                            </li>
                            <li class="mgj_footer_helper_item">
                                <a rel="nofollow" target="_blank" class="color_999" href="javascript:;">
                                    自助服务
                                </a>
                            </li>
                            <li class="mgj_footer_helper_item">
                                <a rel="nofollow" target="_blank" class="color_999" href="javascript:;">
                                    联系客服
                                </a>
                            </li>
                            <li class="mgj_footer_helper_item">
                                <a rel="nofollow" target="_blank" class="color_999" href="javascript:;">
                                    意见反馈
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="mgj_footer_helper_mod">
                    <div class="mgj_footer_helper_mod_container">
                        <h4 class="mgj_footer_helper_title color_666">
                            - 权益保障 -
                        </h4>
                        <ul>
                            <li class="mgj_footer_helper_item">
                                <div class="color_999">
                                    全国包邮
                                </div>
                            </li>
                            <li class="mgj_footer_helper_item">
                                <div class="color_999">
                                    7天无理由退货
                                </div>
                            </li>
                            <li class="mgj_footer_helper_item">
                                <div class="color_999">
                                    退货运费补贴
                                </div>
                            </li>
                            <li class="mgj_footer_helper_item">
                                <div class="color_999">
                                    限时发货
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="mgj_footer_helper_mod">
                    <div class="mgj_footer_helper_mod_container">
                        <h4 class="mgj_footer_helper_title color_666">
                            - 支付方式 -
                        </h4>
                        <ul>
                            <li class="mgj_footer_helper_item">
                                <div class="color_999">
                                    微信支付
                                </div>
                            </li>
                            <li class="mgj_footer_helper_item">
                                <div class="color_999">
                                    支付宝
                                </div>
                            </li>
                            <li class="mgj_footer_helper_item">
                                <div class="color_999">
                                    白付美支付
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="mgj_footer_helper_mod">
                    <div class="mgj_footer_helper_mod_container">
                        <h4 class="mgj_footer_helper_title color_666">
                            - 移动客户端下载 -
                        </h4>
                        <ul>
                            <li class="mgj_footer_helper_item mgj_footer_helper_item_last">
                                <div class="color_999">
                                    蘑菇街
                                </div>
                                <img class="mgj_footer_helper_quoer_code" src="/Project/thinkphp_3.2.3_full/Public/login/upload_07dhaga6788g05g91890jjd7a4cc3_280x280.png">
                            </li>
                            <li class="mgj_footer_helper_item mgj_footer_helper_item_last">
                                <div class="color_999">
                                    美丽说
                                </div>
                                <img class="mgj_footer_helper_quoer_code" src="/Project/thinkphp_3.2.3_full/Public/login/upload_5ii9f90fdide17hj3jkj3bfd121e3_280x280.png">
                            </li>
                            <li class="mgj_footer_helper_item mgj_footer_helper_item_last">
                                <div class="color_999">
                                    uni引力
                                </div>
                                <img class="mgj_footer_helper_quoer_code" src="/Project/thinkphp_3.2.3_full/Public/login/upload_892b80cj47j51h95f44cai2e0b002_280x280.png">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="mgj_footer_mgjinfo">
                <ul>
                    <li class="mgj_footer_mgjinfo_item">
                        <a rel="nofollow" target="_blank" class="color_666" href="javascript:;">
                            关于我们
                        </a>
                    </li>
                    <li class="mgj_footer_mgjinfo_item">
                        <a rel="nofollow" target="_blank" class="color_666" href="javascript:;">
                            招聘信息
                        </a>
                    </li>
                    <li class="mgj_footer_mgjinfo_item">
                        <a rel="nofollow" target="_blank" class="color_666" href="javascript:;">
                            联系我们
                        </a>
                    </li>
                    <li class="mgj_footer_mgjinfo_item">
                        <a rel="nofollow" target="_blank" class="color_666" href="javascript:;">
                            商家入驻
                        </a>
                    </li>
                    <li class="mgj_footer_mgjinfo_item">
                        <a rel="nofollow" target="_blank" class="color_666" href="javascript:;">
                            商家后台
                        </a>
                    </li>
                    <li class="mgj_footer_mgjinfo_item">
                        <a rel="nofollow" target="_blank" class="color_666" href="javascript:;">
                            蘑菇商学院
                        </a>
                    </li>
                    <li class="mgj_footer_mgjinfo_item">
                        <a rel="nofollow" target="_blank" class="color_666" href="javascript:;">
                            商家社区
                        </a>
                    </li>
                </ul>
                <p class="mgjhostname color_999">
                    ©2017 Mogujie.com 杭州卷瓜网络有限公司
                </p>
            </div>
            <div class="mgj_footer_copyright">
                <p class="mgj_footer_copyright_container">
                    <span class="mgj_footer_copyright_span color_999">
                        营业执照注册号：
                    </span>
                    <a rel="nofollow" target="_blank" class="mgj_footer_a color_999" href="">
                        330106000129004
                    </a>
                    <b class="mgj_footer_b color_999">
                        |
                    </b>
                    <span class="mgj_footer_copyright_span color_999">
                        网络文化经营许可证：
                    </span>
                    <a rel="nofollow" target="_blank" class="mgj_footer_a color_999" href="">
                        浙网文（2016）0349-219号
                    </a>
                    <b class="mgj_footer_b color_999">
                        |
                    </b>
                    <span class="mgj_footer_copyright_span color_999">
                        增值电信业务经营许可证：
                    </span>
                    <a rel="nofollow" target="_blank" class="mgj_footer_a color_999" href="">
                        浙B2-20110349
                    </a>
                    <b class="mgj_footer_b color_999">
                        |
                    </b>
                    <span class="mgj_footer_copyright_span color_999">
                    </span>
                    <a rel="nofollow" target="_blank" class="mgj_footer_a color_999" href="">
                        安全责任书
                    </a>
                    <b class="mgj_footer_b color_999">
                        |
                    </b>
                    <span class="mgj_footer_copyright_span color_999">
                    </span>
                    <a rel="nofollow" target="_blank" class="mgj_footer_a color_999" href="">
                        浙公网安备 33010602002329号
                    </a>
                    <b class="mgj_footer_b color_999">
                        |
                    </b>
                </p>
            </div>
        </div>
    </div>

        
        <script type="text/javascript" src="/Project/thinkphp_3.2.3_full/Public/login/index.js-9fa638bd.js.下载">
        </script>
       
        <script type="text/javascript" src="/Project/thinkphp_3.2.3_full/Public/login/index.js-53632682.js.下载">
        </script>
        <script type="text/javascript" src="/Project/thinkphp_3.2.3_full/Public/login/m.mgj.js.下载">
        </script>
        <script type="text/javascript" src="/Project/thinkphp_3.2.3_full/Public/login/index.min.js.下载">
        </script>
        <script>
            // 验证码点击切换
            var verifyimg = $(".verifyimg").attr("src");

            $(".reloadverify").click(function(){

                if( verifyimg.indexOf('?')>0){

                    $(".verifyimg").attr("src", verifyimg+'&random='+Math.random());

                }else{

                    $(".verifyimg").attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
              }

            })
            // 检查验证码是否正确

            // $('input[name=code]').blur(
             
            //   function(){

            //         var that = $(this);  

            //         var val = $('input[name=code]').val();
            //         var url = '<?php echo U("ajaxCheckLoginCode");?>';
            //         // if( $('span[data-code]').attr('data-code')!="1" ){
            //              $.post(
            //                 url,  

            //                 {codeVal:val},

            //                 function (data){

            //                 // 预先删除提示
            //                 $('span[data-code="1"]').remove();

            //                 if(data==0){

            //                     $('#tip_code').html("<span  data-code='1' style='color:red;'>验证码不正确！</span>");

            //                 }else if(data==1){

            //                     $('span[data-code="1"]').remove();

            //                 }
            //            },'json')
            //         // }
                       
            //   })

            // 检验用户
            $('input[name=uname]').blur(
              function (){

                    var URL = "<?php echo U('loginUserAjaxCheck');?>";

                    var val = $('input[name=uname]').val();
                    
                    // if($('span[data-tip]').attr('data-tip') !="2"){

                        if(val!=""){
                             $.post( 
                                URL,
                                {username:val }, 
                                function (data){

                                    $('span[data-tip="2"]').remove();

                                    if (data==1) {
                                        $('#error_tip').html('<span data-tip="2" style="color:red;">用户名不存在</span>');

                                    }else{

                                        $('span[data-tip="2"]').remove();
                                    }

                                }, 'json' )
                         }

                    // }

                }
            )

            // 判断用户是否输错用户密码2次或者更多
            $(function(){
                if("<?php echo (session('errortimes')); ?>" >=2){

                    $('#showCode').css('display','block');

                    console.log( $('input[name="code"]') );
                }

            }())


            // 点击登录的时候查询是否合法
            function check(){
                // 用户名不能为空
                $('span[data-user="true"]').remove();
                if($('input[name="uname"]').val()==""){

                    $('#error_tip').html('<span data-user="true" style="color:#ff0078;">用户名不能为空</span>');

                    return false;
                }else{
                       $('span[data-user="true"]').remove();
                }   

                // 用户密码不能为空
                 $('span[data-pass="true"]').remove();
                if($('input[name="pass"]').val()==""){

                    $('#error_tip').html('<span data-pass="true" style="color:#ff0078;">密码不能为空</span>');

                    return false;
                }else{
                       $('span[data-pass="true"]').remove();
                }

                // 判断用户密码是否存在
                var passval = $('input[name="pass"]').val();

                var userval = $('input[name="uname"]').val();

                var URL2="<?php echo U('ajaxCheckPass');?>"; 


                    $('span[data-code="true"]').remove();
                    if(valcode=""){

                         $('#tip_code').html("<span  data-code='true' style='color:red;'>验证码不能为空！</span>");
                         return false;
                    }else{
                        $('span[data-code="true"]').remove();
                    }
                        
                // if( $('span[data-passAndUser]').attr('data-passAndUser')!="3" ){
                    $.post(URL2, {user :userval, pass: passval}, function (data){

                            $('span[data-passAndUser="3"]').remove();
                         
                             //表示正确用户密码和用户名
                            if(data==1){

                                  $('span[data-passAndUser="3"]').remove();
                                   var url = '<?php echo U("ajaxCheckLoginCode");?>';
                                    var valcode = $('input[name=code]').val();

                                    if(valcode!=""){
                                        $.post(
                                            url,  

                                            {codeVal:valcode},

                                            function (data){

                                            // 预先删除提示
                                            $('span[data-code="2"]').remove();

                                            if(data==0){
                                                $('#tip_code').html('<span data-code="2" style="color:#ff0078;">验证码不正确</span>');
                                            }else if(data==1){

                                                $('span[data-code=""]').remove();
                                                  document:myform.submit();
                                            }
                                        },'json') 
                                    }else{

                                         document:myform.submit();
                                        
                                    }
                                   

                                   //表示用户名或密码有错
                            }else{

                                $('#error_tip').html('<span data-passAndUser="3" style="color:#ff0078;">用户或者密码错误</span>');

                                $('input[name="code"]').attr('value', '');

                                
                                $('input[name=code]').parent().css('display','block');

                                return false;
                            }


                    });
                // }

            }

        </script>
        <object style="position:absolute;left:-500px;top:-500px" data="data:application/x-silverlight-2,"
        type="application/x-silverlight-2" id="mysilverlight" width="0" height="0">
            <param name="source" value="/assets/evercookie.xap">
            <param name="onLoad" value="onSilverlightLoad">
            <param name="onError" value="onSilverlightError">
            <param name="background" value="Transparent">
            <param name="windowless" value="true">
            <param name="minRuntimeVersion" value="4.0.50401.0">
            <param name="autoUpgrade" value="false">
            <a href=""
            style="display:none">
                Get Microsoft Silverlight
            </a>
        </object>
        <script src="/Project/thinkphp_3.2.3_full/Public/login/ie67upgrade.js.下载">
        </script>
        <object style="position:absolute;left:-500px;top:-500px" data="data:application/x-silverlight-2,"
        type="application/x-silverlight-2" id="mysilverlight" width="0" height="0">
            <param name="initParams" value="FRMS_FINGERPRINTN=Ggmzp0ExTrywFEL_UCXjBwBv2QstOnaYuSjVIyA8M115S">
            <param name="source" value="/assets/evercookie.xap">
            <param name="onLoad" value="onSilverlightLoad">
            <param name="onError" value="onSilverlightError">
            <param name="background" value="Transparent">
            <param name="windowless" value="true">
            <param name="minRuntimeVersion" value="4.0.50401.0">
            <param name="autoUpgrade" value="false">
            <a href=""
            style="display:none">
                Get Microsoft Silverlight
            </a>
        </object>
        <script src="/Project/thinkphp_3.2.3_full/Public/login/zop">
        </script>
        <script src="/Project/thinkphp_3.2.3_full/Public/login/poz">
        </script>
        <object style="position:absolute;left:-500px;top:-500px" data="data:application/x-silverlight-2,"
        type="application/x-silverlight-2" id="mysilverlight" width="0" height="0">
            <param name="source" value="/assets/evercookie.xap">
            <param name="onLoad" value="onSilverlightLoad">
            <param name="onError" value="onSilverlightError">
            <param name="background" value="Transparent">
            <param name="windowless" value="true">
            <param name="minRuntimeVersion" value="4.0.50401.0">
            <param name="autoUpgrade" value="false">
            <a href=""
            style="display:none">
                Get Microsoft Silverlight
            </a>
        </object>
        <object style="position:absolute;left:-500px;top:-500px" data="data:application/x-silverlight-2,"
        type="application/x-silverlight-2" id="mysilverlight" width="0" height="0">
            <param name="initParams" value="FRMS_FINGERPRINTN=Ggmzp0ExTrywFEL_UCXjBwBv2QstOnaYuSjVIyA8M115S">
            <param name="source" value="/assets/evercookie.xap">
            <param name="onLoad" value="onSilverlightLoad">
            <param name="onError" value="onSilverlightError">
            <param name="background" value="Transparent">
            <param name="windowless" value="true">
            <param name="minRuntimeVersion" value="4.0.50401.0">
            <param name="autoUpgrade" value="false">
            <a href=""
            style="display:none">
                Get Microsoft Silverlight
            </a>
        </object>
        <div id="userdata_el" style="visibility: hidden; position: absolute;">
        </div>
    </body>

</html>