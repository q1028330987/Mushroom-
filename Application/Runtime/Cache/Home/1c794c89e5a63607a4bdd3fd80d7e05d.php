<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript">window.__trace__headstart = +new Date;
            window.__server__startTime = 1492411146933;
            window.__token = "7P3z3TiJ3bbFVObbpCL7uzu2Nym5erD8ohhkM4B2d3K0aaa55p7ua8wtk7fMXHzy";</script>
        <link rel="dns-prefetch" href="https://s6.mogucdn.com/">
        <link rel="dns-prefetch" href="https://s7.mogucdn.com/">
        <link rel="dns-prefetch" href="https://s6.mogujie.cn/">
        <link rel="dns-prefetch" href="https://s7.mogujie.cn/">
        <link rel="dns-prefetch" href="https://s8.mogujie.cn/">
        <link rel="dns-prefetch" href="https://s9.mogujie.cn/">
        <link rel="dns-prefetch" href="https://s12.mogujie.cn/">
        <link rel="dns-prefetch" href="https://s13.mogujie.cn/">
        <meta http-equiv="Cache-Control" content="no-transform ">
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>收银台</title>
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="copyright" content="mogujie.com">
        <link rel="search" type="application/opensearchdescription+xml" href="https://cashier.mogujie.com/opensearch.xml">
        <link rel="icon" href="https://s10.mogucdn.com/mlcdn/c45406/170401_16fj5k6k4174bfd21d03a4gf6a7hg_48x48.png" type="image/x-icon">
        <script type="text/javascript">var curl = {
                apiName: 'require'
            };
            var MOGU = {};
            var MoGu = {};
            var MOGU_DEV = 0 || "online" == "pre";
            var M_ENV = "online";</script>
        <link href="/Project/thinkphp_3.2.3_full/Public/payMoney/index.css-709a8a6f.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="/Project/thinkphp_3.2.3_full/Public/payMoney/bottom.css" media="all">
        <link href="/Project/thinkphp_3.2.3_full/Public/payMoney/vpop.css-9d5fabc4.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="/Project/thinkphp_3.2.3_full/Public/payMoney/pkg-pc-base.js-5299c175.js.下载"></script>
        <script type="text/javascript">if (window.require) {
                require.config({
                    domain: 0
                });
            }

            MOGUPROFILE = {};</script>
    </head>
    
    <body class="media_screen_1200">
        <div id="header" class="site-top-nav J_sitenav" data-ptp="_head">
            <div class="wrap">
              <a href="<?php echo U('Index/index');?>" rel="nofollow" class="home fl">蘑菇街首页</a>
              <ul class="header-top">
                <?php if(!empty($_SESSION['home']['username'])): ?><li class="s1 has-icon user-meta">
                    <a rel="nofollow" href="javascript:;"><?php echo ($_SESSION['home']['username']); ?></a>
                    <a rel="nofollow" href="<?php echo U('Personal/index');?>" target="_blank"></a>
                    <i class="icon-delta"></i>
                    <ol class="ext-mode" id="menu-personal">
                        <li class="s2">
                            <a target="_blank" rel="nofollow" href="<?php echo U('Personal/index');?>">个人设置</a></li>
                        <li class="s2">
                            <a target="_blank" rel="nofollow" href="<?php echo U('Personal/index');?>">账号绑定</a></li>
                        <li class="s2">
                            <a rel="nofollow" href="<?php echo U('User/userLogout');?>">退出</a></li>
                    </ol>
                  </li>
                <?php else: ?>
                  <li class="s1 show-nologin">
                    <a rel="nofollow" href="<?php echo U('User/register');?>">注册</a>
                  </li>
                  <li class="s1 show-nologin">
                    <a rel="nofollow" href="<?php echo U('User/login');?>">登录</a>
                  </li><?php endif; ?>
                <li class="s1 myorder has-line">
                  <a href="<?php echo U('Order/index');?>" target="_blank" class="text display_u" rel="nofollow">我的订单</a>
                </li>
                <li class="s1 has-line shopping-cart-v2">
                  <a class="cart-info-wrap" href="<?php echo U('Cart/CartShow');?>" target="_blank" rel="nofollow">
                    <span class="cart-info">购物车</span>
                </a>
                  <i class="icon-delta"></i>
                  <span class="shopping-cart-loading"></span>
                </li>
                <li class="s1 has-line has-icon custom-item">
                  <a rel="nofollow" href="" target="_blank">客户服务</a>
                  <i class="icon-delta"></i>
                  <ol class="ext-mode">
                    <li class="s2">
                      <a target="_blank" rel="nofollow" href="#">消费者服务</a></li>
                    <li class="s2">
                      <a target="_blank" rel="nofollow" href="#">商家服务</a></li>
                    <li class="s2">
                      <a target="_blank" rel="nofollow" href="#">规则中心</a></li>
                  </ol>
                </li>
                <li class="s1 has-line has-icon myxiaodian">
                  <a href="#" rel="nofollow" target="_blank" class="text display_u">我的小店</a>
                  <i class="icon-delta"></i>
                  <ol class="ext-mode">
                    <li class="s2">
                      <a target="_blank" rel="nofollow" href="#">管理后台</a></li>
                    <li class="s2">
                      <a target="_blank" rel="nofollow" href="#">商家社区</a></li>
                    <li class="s2">
                      <a target="_blank" rel="nofollow" href="#">商家培训</a></li>
                    <li class="s2">
                      <a target="_blank" rel="nofollow" href="#">市场入驻</a></li>
                  </ol>
                </li>
              </ul>
            </div>
          </div>
          <!-- 中间区域-->
          <div class="header_mid clearfix">
            <div class="wrap clearfix">
              <a rel="nofollow" href="<?php echo U('Index/index');?>" class="logo" title="蘑菇街首页"></a>
              <div class="sticky-search-content" style="width: 482px;height:90px;float: left;margin-left: 120px;">
                <div class="top_nav_search" id="nav_search_form">
                  <!-- 搜索框  -->
              <div class="search_inner_box clearfix">
                    <div class="selectbox" data-v="1">
                      <span class="selected">搜商品</span>
                      <ol>
                        <li class="current" data-index="bao">
                          <a href="#">商品</a></li>
                        <li data-index="shop">
                          <a href="#">店铺</a></li>
                      </ol>
                    </div>
                    <form action="" method="get" id="top_nav_form">
                      <input type="text" data-tel="search_book" name="q" class="ts_txt fl" data-def="套装" value="" autocomplete="off" def-v="套装韩版新款" data-acm="3.mce.1_10_1af4g.1088.0.nmmlRqfqXFmUb.m_243052">
                      <input type="submit" value="搜  索" class="ts_btn">
                      <input type="hidden" name="t" value="bao" id="select_type"></form>
                    <div class="top_search_hint is-not-ie8-hack"></div>
                  </div>
                  <div class="ts_hotwords">
                    <a rel="nofollow" class="ts_hotword" href="" style="color: #ff4466;">卫衣</a>
                  </div>
                </div>
              </div>
              <div class="mid_fr">
                <img src="" alt="蘑菇街，我的买手街"></div>
            </div>
        </div>
        <div style="text-align:center;color:#ff0078;" class="promotionTopNavContainer">

            <h2 style="font-size:20px;">亲，感谢你的支持！付款完成</h2>
            <h2 style="font-size:20px;">3秒之后自动跳转到首页，<a href="<?php echo U('Index/index');?>">跳转失败点击这里</a></h2>
           <meta http-equiv="refresh" content='3;url="http://192.168.42.114/Project/thinkphp_3.2.3_full/index.php/Home/Index/index.html"' />
        </div>
        <script>

        </script>
    </body>
</html>