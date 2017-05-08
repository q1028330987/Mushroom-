<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Cache-Control" content="no-transform">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>蘑菇街-我的买手街</title>
    <meta name="description" content="美丽联合集团是女性时尚媒体和时尚消费平台，通过整合现在已有的资源，包括电商、社区、红人、内容等等，来服务于不同的女性用户。蘑菇街是集团旗下定位于年轻女性用户的时尚媒体与时尚消费类App，核心用户人群为 18-23 岁年轻女性用户。2015年，蘑菇街以当红明星李易峰和“我的买手街”的品牌定位，成功树立了自身以买手精选为核心理念的差异化品牌形象。2016年，迪丽热巴以首席体验官的身份代表广大用户加入蘑菇街，从而更好地为年轻女性用户提供从美妆、穿搭分享到时尚购物的一站式消费体验。">
    <meta name="keywords" content="蘑菇街-我的买手街">

    <meta name="copyright" content="mogujie.com">
    <meta name="apple-itunes-app" content="app-id=452176796, app-argument=">

    <link rel="stylesheet" type="text/css" href="/Project/thinkphp_3.2.3_full/Public/css/vpop.css$1490862615.css" media="all">
    <link rel="stylesheet" type="text/css" href="/Project/thinkphp_3.2.3_full/Public/css/pc_wall.css$1490690821.css" media="all">
    <link rel="stylesheet" href="/Project/thinkphp_3.2.3_full/Public/css/pD1dW1pY2315BX8fSRDnyS4.css">
  </head>
  
  <body class="media_screen_1200">
    <!--右侧导航栏-->
    <div class="mgj_rightbar J_sidebar" style="right: 0px;">
      <!--空的右侧边栏-->
      <div id="mgj_rightbar_top_blank" class="mgj_rightbar_960"></div>
      <!--方便定margin的空dediv-->
      <div id="mgj_rightbar_blank_div"></div>
      <!--用户头像-->
      <!--购物车-->
      <div class="sidebar-item mgj-my-cart" style="left: 0px;">
        <a target="_blank" href="http://cart.mogujie.com/cart/mycart" rel="nofollow">
          <i class="s-icon"></i>
          <div class="s-txt">购物车</div>
          <div class="num"></div>
        </a>
      </div>
      <!--优惠券-->
      <div class="sidebar-item mgj-my-coupon">
        <a target="_blank" rel="nofollow" href="http://www.mogujie.com/trade/promotion/user/shopcoupon">
          <i class="s-icon"></i>
          <div class="s-txt">优惠券</div>
          <div class="num"></div>
        </a>
      </div>
      <!--钱包-->
      <div class="sidebar-item mgj-my-wallet">
        <a target="_blank" rel="nofollow" href="https://f.mogujie.com/wallet/home">
          <i class="s-icon"></i>
          <div class="s-txt">钱包</div></a>
      </div>
      <!--足迹-->
      <div class="sidebar-item mgj-my-browserlog">
        <a target="_blank" rel="nofollow" href="http://www.mogujie.com/active/browserlog">
          <i class="s-icon"></i>
          <div class="s-txt">足迹</div></a>
      </div>
      <div class="sideBottom">
        <!--回到顶部-->
        <div class="sidebar-item mgj-back2top show" style="left: 0px;">
          <a rel="nofollow" href="javascript:;">
            <i class="s-icon"></i>
          </a>
        </div>
      </div>
    </div>
   
          
      <div id="header" class="site-top-nav J_sitenav" data-ptp="_head" >
        <div class="wrap">
          <a href="<?php echo U('Index/index');?>" rel="nofollow" class="home fl">蘑菇街首页</a>
          <ul class="header-top" style="position:relative; ">
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
              <a href="<?php echo U('Order/showAllOrders');?>" target="_blank" class="text display_u" rel="nofollow">我的订单</a>
            </li>
            <li class="s1 has-line shopping-cart-v2">
              <a class="cart-info-wrap" href="<?php echo U('Cart/CartShow');?>" target="_blank" rel="nofollow">
                <span class="cart-info">购物车</span>
            </a>
              <i class="icon-delta"></i>
              <span class="shopping-cart-loading"></span>
              <div class="cartbox" style="position:absolute;left:-68px;top:32px;z-index:1000;width:250px;background:#F2F2F2;display:none;">
                  <table >
                        <?php if(is_array($cart)): foreach($cart as $key=>$v): ?><tr style="margin-bottom:50px;">
                            <td width="65"><a href="<?php echo U('Detail/detailShow');?>?id=<?php echo ($v["goodsid"]); ?>"><img src="<?php echo ($v["colorPic"]); ?>" width="60" height="60" title="<?php echo ($wholegname); ?>" style="margin-right:20px;"></a></td>  
                            <td title="<?php echo ($wholegname); ?>" style="font-size:13px;" ><a href="<?php echo U('Detail/detailShow');?>?id=<?php echo ($v["goodsid"]); ?>"><?php echo ($v["goodsName"]); ?></a><br/><br/>颜色:<?php echo ($v["selectColor"]); ?> 尺码:<?php echo ($v["selectSize"]); ?></td>
                            <td style="font-size:14px;color:red;margin-left:30px;"><?php echo ($v["floatgoodsPrice"]); ?>&yen;</td>
                        </tr><?php endforeach; endif; ?>
                        <!-- <tr >
                            <td colspan="3" style="position:relative;left:170px;"><a style="text-align:right;margin-bottom:10px;background:#EB2A12;color:black;padding:5px;border-radius:5px;" href="<?php echo U('Cart/cartShow');?>">查看购物车</a></td>
                        </tr> -->
                    </table>
              </div>
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
    <style type="text/css">
        .deleteCartGoods:hover{
            cursor:pointer;
        }
    </style>
    <script type="text/javascript" src="/Project/thinkphp_3.2.3_full/Public/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript">
        //hover上去购物车时，显示购物车中的商品
        $('.shopping-cart-v2').mouseover(function () {

            $('.cartbox').css('display','block');
        });

        //离开的时候，取消掉购物车的显示
        $('.cartbox').mouseout(function () {
            
            $('.cartbox').css('display','none');
        });
    </script>
    
   
    <div id="body_wrap">
      <div class="page_activity  ">
        <div class="module_row module_row_368365 MOD_ID_346269 has-log-mod" data-mid="368365" data-versionid="1060381" data-editable="0" data-acm="3.mf.1_0_0.0.0.0.mf_15261_368365">
          <div class="mod_row MCUBE_MOD_ID_346269">
            <style>.MCUBE_MOD_ID_346269 .indexmainLink:hover{ color: #f07; } .MCUBE_MOD_ID_346269 { border-bottom: 2px solid #f07; }</style>
            <div class="main_topnav_content clearfix">
              <div class="indexLeftLink fl" style="background: url('/Project/thinkphp_3.2.3_full/Public/image/nav.png');">
                <a class="cube-acm-node indexLeftTitle has-log-mod" href="javascript:;" target="_blank">主题市场</a></div>
              <div class="indexRightLink fl">
                <a class="indexmainLink cube-acm-node col666 fl has-log-mod" href="#" target="_blank">省钱团购</a>
                <!-- <span class="indexmainPipe">|</span>  -->
                <a class="indexmainLink indexmainLink-last cube-acm-node col666 fl has-log-mod" href="#" target="_blank">品质优选</a></div>
            </div>
          </div>
        </div>
        <div class="module_row module_row_368366  MOD_ID_248606 has-log-mod" id="nav_nav" data-mid="368366" data-versionid="1120733" data-editable="0" data-acm="3.mf.1_0_0.0.0.0.mf_15261_368366">
          <div  class="mod_row MCUBE_MOD_ID_248606" style="width: 100%;background-color:rgb(<?php echo ($first["rgb"]); ?>);">
            <!-- 营业执照注册号：330106000129004 @nansong 商家工具多多需求 -->
            <input type="hidden" id="J_searchbar_flag" value="show">
            <input type="hidden" class="gifImg" value="">

            <!-- schema中直出数据 -->
            <!-- 主题名 -->
  
            <div id="nav_lan">
              <div class="pc_banner_wrapper nav_lan clearfix">
                <!-- 导航 -->
                <div class="pc_indexPage_nav_menu fl cube-acm-node has-log-mod " id="nav1">
                  <ul class="nav_list dropdown-menu" role="mebu">
                    <!-- 遍历生成样式 -->
                    <?php if(is_array($type)): foreach($type as $key=>$vo): ?><li class="nav_list_row nav_list_row_first" data-pid="<?php echo ($vo["id"]); ?>" data-topic="coat" style="margin-top:0px;">
                        <dl class="nav_wrap">
                          <dt class="nav_list_title">
                            <a rel="nofollow" class="catagory" target="_blank" href="<?php echo U('List/showList');?>?tid=<?php echo ($vo["id"]); ?>&pid=<?php echo ($vo["pid"]); ?>"><?php echo ($vo["cname"]); ?></a></dt>
                              <dd class="nav_list_content">
                                <span class="nav_list_content_span">
                          <?php if(is_array($vo["son"])): foreach($vo["son"] as $key=>$v): ?><a rel="nofollow" class="first" target="_blank" href="<?php echo U('List/showList');?>?tid=<?php echo ($v["id"]); ?>&pid=<?php echo ($v["pid"]); ?>"><?php echo ($v["cname"]); ?></a><?php endforeach; endif; ?>
                                </span>
                              </dd>
                        </dl>
                      </li><?php endforeach; endif; ?>

                  </ul>
                  <!-- hover展开部分 -->
                  <div class="nav_more_content" id="nav_more_content" style="display: none;">

                    <?php if(is_array($type)): foreach($type as $key=>$vo): ?><div class="sub_catagory coat" style="display: none; top: -1px; left: 253px; height: 434px;">
                      <div class="nav_more_left_content">
                        
                        
                      </div>
                      <div class="nav_more_guess">
                        

                      </div>
                      </div><?php endforeach; endif; ?>
                  </div>
                </div>
                <!-- 轮播 -->
                <div class="item_slider fl lazyData" data-source-type="" data-source-key="19221" data-manual="true">
                  <div class="mslide_content_box" id="pc_banner_top">
                    <div class="mslide_banners" data-eventid="016001000" style="background-color: rgb(4,77,205);">
                     
                    <a rel="nofollow" class="preload_box_1 mslide_banner J_dynamic_imagebox cube-acm-node has-log-mod mslide_banner_show" data-rgb="<?php echo ($first["rgb"]); ?>"  href="" style="z-index: 2; display: block;">
                        <img class="J_dynamic_img fill_img" src="/Project/thinkphp_3.2.3_full/Public/Uploads/<?php echo ($first["pic"]); ?>" alt=""></a>

                    <?php if(is_array($loopplay)): foreach($loopplay as $key=>$vo): ?><a rel="nofollow" class="preload_box_1 mslide_banner J_dynamic_imagebox cube-acm-node has-log-mod mslide_banner_show" data-rgb="<?php echo ($vo["rgb"]); ?>"  href="" style="z-index: 1; display: block;">
                        <img class="J_dynamic_img fill_img" src="/Project/thinkphp_3.2.3_full/Public/Uploads/<?php echo ($vo["pic"]); ?>" alt=""></a><?php endforeach; endif; ?>
                     </div>

                     <div class="mslide_dot_box anim_mslide_dot_box clearfix">


                    <a href="javascript:;" class="dot_default dot_show"><img class="dot_show_img" style="-webkit-animation: rotate 4000ms cubic-bezier(0.6, 0, 0.6, 1) 1;-moz-animation: rotate 4000ms cubic-bezier(0.6, 0, 0.6, 1) 1;-o-animation: rotate 4000ms cubic-bezier(0.6, 0, 0.6, 1) 1;animation: rotate 4000ms cubic-bezier(0.6, 0, 0.6, 1) 1;background: none;" src="/Project/thinkphp_3.2.3_full/Public/image/circle.png" /></a>
                    <?php if(is_array($loopplay)): foreach($loopplay as $key=>$vo): ?><a href="javascript:;" class="dot_default"><img class="dot_show_img" style="-webkit-animation: rotate 4000ms cubic-bezier(0.6, 0, 0.6, 1) 1;-moz-animation: rotate 4000ms cubic-bezier(0.6, 0, 0.6, 1) 1;-o-animation: rotate 4000ms cubic-bezier(0.6, 0, 0.6, 1) 1;animation: rotate 4000ms cubic-bezier(0.6, 0, 0.6, 1) 1;background: none;" src="/Project/thinkphp_3.2.3_full/Public/image/circle.png" /></a><?php endforeach; endif; ?>

                    </div>
                  </div>
                </div>
                <!-- 用户信息 -->
                <div class="user_info fl">
                  <div class="base_info">
                    <a rel="nofollow" target="_blank" href="http://pc.mogujie.com/member/member.html" class="avatar"></a>
                    <a rel="nofollow" target="_blank" href="http://pc.mogujie.com/member/member.html" class="member"></a>
                    <div class="welcome">
                      <span class="txt">菇凉好！</span>
                      <span class="name">欢迎来逛蘑菇街~</span></div>
                    <a rel="nofollow" class="privileged" target="_blank" href="http://pc.mogujie.com/member/member.html">
                      <span class="privilid-text">会员中心</span></a>
                    <!-- 未登录 -->
                    <a rel="nofollow" href="http://portal.mogujie.com/user/login?ptp=1.BtWxRgdy._head.0.xj98f" class="login_btn">
                      <span>登录</span></a>
                    <div class="register">
                      <a rel="nofollow" target="_blank" href="http://portal.mogujie.com/user/register?ptp=1.qzGDeb.0.0.hCbFH">免费注册</a>
                      <a rel="nofollow" target="_blank" href="http://www.xiaodian.com/?ptp=1.BtWxRgdy._head.0.3XfNL">开小店</a></div>
                    <!-- 登录 -->
                    <a rel="nofollow" target="_blank" href="http://order.mogujie.com/order/list4buyer" class="order_info">
                      <ul class="wrapper clearfix">
                        <li class="order fl">
                          <p class="title">待付款</p>
                          <p class="num unpaidOrderCount">0</p></li>
                        <li class="order fl">
                          <p class="title m_title">待收货</p>
                          <p class="num unReceivedOrderCount">0</p></li>
                        <li class="order fl">
                          <p class="title">待评价</p>
                          <p class="num waitingRateOrderCount">0</p></li>
                      </ul>
                    </a>
                  </div>
                  <div class="foot_wrapper lazyData" data-source-type="" data-source-key="30799" data-manual="true" data-ptp="_keyword_30799">
                    <a rel="nofollow" target="_blank" href="http://list.mogujie.com/book/boyfriend/51716?acm=3.mce.1_10_1bb8e.30799.0.zmryYqfqXIm2c.m_263859" class="user-propa cube-acm-node has-log-mod" data-log-content="3.mce.1_10_1bb8e.30799.0.zmryYqfqXIm2c.m_263859" data-ext-acm="3.mce.1_10_1bb8e.30799.0.zmryYqfqXIm2c.m_263859">
                      <div class="propaganda">
                        <p class="top_title">春色型男</p>
                        <p class="top-desc">24小时上新直击</p></div>
                      <div class="live_show J_dynamic_imagebox" img-src="https://s2.mogucdn.com/mlcdn/c45406/170329_8f4f05753bacha0h0e4gc9e0eiclj_260x260.jpg">
                        <img class="J_dynamic_img fill_img" src="" alt=""></div>
                    </a>
                  </div>
                </div>
                <div class="pc_indexPage_nav_menu fl cube-acm-node" id="float_nav_menu" style="position: fixed; top: 50px; height: 440px; z-index: 9999; display: none; background-color: rgba(51, 51, 51, 0.901961); left: 74.5px;">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="module_row module_row_368370 MOD_ID_245345 has-log-mod" data-mid="368370" data-versionid="1113970" data-editable="0" data-acm="3.mf.1_0_0.0.0.0.mf_15261_368370">

        <div class="module_row module_row_368372 MOD_ID_260932 has-log-mod" data-mid="368372" data-versionid="1060388" data-editable="0" data-acm="3.mf.1_0_0.0.0.0.mf_15261_368372">
          <div class="mod_row MCUBE_MOD_ID_260932">
            <input type="hidden" class="bigPos" value="right">
            <input type="hidden" class="recommendContent" value="brand">
            <!--顶部标题链接-->
            <div class="lazyData clearfix cateTitleBar yahei" data-ptp="_keyword_32483" data-source-type="" data-source-key="32483" data-manual="true">
              <div class="sideIcon" style="background-color: #9F86CF;"></div>
              <div class="cateTitleName col333">品牌</div>
              <div class="cateLinkBox col666">热门搜索：
                <a class="topLink cube-acm-node col666 has-log-mod" href="http://shop.mogujie.com/1172skiq?acm=3.mce.1_10_1a9uo.32483.0.cvbvOqfqXGOEm.m_239636" target="_blank" data-log-content="3.mce.1_10_1a9uo.32483.0.cvbvOqfqXGOEm.m_239636" data-log-index="0">阿么</a>|
                </div>
              <a class="checkMore col666" href="http://act.mogujie.com/brandlist" target="_blank">查看全部
                <span class="checkMoreArchor"></span></a>
            </div>
            <div class="floor-con clearfix " data-module-title="品牌">
              <!--左边大图-->
              <div class="big-banner-con fl" style="background: #ecdaf5; ">
                <!-- 文案部分 -->
                <div class="lazyData clearfix fl big-banner-content" data-ptp="_keyword_18861" data-source-type="" data-source-key="18861" data-manual="true">
                  <a rel="nofollow" target="_blank" href="" class="big-banner-item cube-acm-node yahei has-log-mod">
                    <div class="title title-base bigBanner-color text-hide yahei" style="color: #333;"><?php echo ($bigbrand["brandname"]); ?></div>
                    <div class="sub-title title-base bigBanner-color text-hide yahei" style="color: #666;"><?php echo ($bigbrand["descript"]); ?></div>
                    <div class="big-banner-img J_dynamic_imagebox">
                      <img class="J_dynamic_img fill_img" src="/Project/thinkphp_3.2.3_full/Public/<?php echo ($bigbrand["picurl"]); ?>" alt=""></div>
                  </a>
                </div>
              </div>
              <!-- 中部六张图 -->
              <div class="lazyData clearfix fl" data-ptp="_keyword_32453" data-source-type="" data-source-key="32453" data-manual="true">
                <div class="multi-col-con fl">
                  <!-- 中部六张图 -->
                  <div class="multi-pic">
                  <?php if(is_array($brandGoods)): foreach($brandGoods as $key=>$vo): ?><a rel="nofollow" target="_blank" href=""class="multi-pic-item-2 fl cube-acm-node has-log-mod" >
                      <div class="top-title text-hide yahei col333"><?php echo ($vo["brandname"]); ?></div>
                      <div class="sub-title top-subTitle text-hide yahei col999"><?php echo ($vo["descript"]); ?></div>
                      <div class="pic-box">
                        <img class="J_dynamic_img fill_img" src="/Project/thinkphp_3.2.3_full/Public/<?php echo ($vo["picurl"]); ?>" alt=""></div>
                    </a><?php endforeach; endif; ?>
                  </div>
                </div>
              <!--右边推荐-->
              <!-- 品牌推荐 -->
              <div class="lazyData clearfix fl tofuData" data-ptp="_keyword_32484" data-source-type="" data-source-key="32484" data-manual="true">
                <div class="tofu-col-con fl">
                  <div class="tofu-col-con-items">

                  <?php if(is_array($brand)): foreach($brand as $key=>$p): ?><a rel="nofollow" target="_blank" href="" class="tofu-pic-item fl cube-acm-node has-log-mod">
                      <div class="tofu-pic J_dynamic_imagebox">
                        <img class="J_dynamic_img fill_img" src="/Project/thinkphp_3.2.3_full/Public/<?php echo ($p["brandpic"]); ?>" alt=""></div>
                    </a><?php endforeach; endif; ?>

                  </div>
                </div>
              </div>

              </div>
            </div>
          </div>
        </div>

        <?php if(is_array($type)): foreach($type as $key=>$v): ?><div  class="module_row module_row_368371 MOD_ID_260932 has-log-mod god" data-id="<?php echo ($v["id"]); ?>">
          <div class="mod_row MCUBE_MOD_ID_260932">
            <!--顶部标题链接-->
            <div class="lazyData clearfix cateTitleBar yahei" data-ptp="_keyword_32270" data-source-type="" data-source-key="32270" data-manual="true">
              <div class="sideIcon" style="background-color: #B4A48D;"></div>
              <div class="cateTitleName col333"><?php echo ($v["cname"]); ?></div>
              <div class="cateLinkBox col666">热门搜索：
                <a class="topLink cube-acm-node col666 has-log-mod" href="http://shop.mogujie.com/1qfnyw/list/index?categoryId=20158858&amp;acm=3.mce.1_10_19q40.32270.0.cvbvPqfqXHy57.m_226844" target="_blank" data-log-content="3.mce.1_10_19q40.32270.0.cvbvPqfqXHy57.m_226844" data-log-index="0">家纺</a>|
                <a class="topLink cube-acm-node col666 has-log-mod" href="http://shop.mogujie.com/1qfnyw/list/index?categoryId=20158877&amp;acm=3.mce.1_10_19q4c.32270.0.cvbvPqfqXHy58.m_226850" target="_blank" data-log-content="3.mce.1_10_19q4c.32270.0.cvbvPqfqXHy58.m_226850" data-log-index="1">穿搭</a>|
                <a class="topLink cube-acm-node col666 has-log-mod" href="http://shop.mogujie.com/1qfnyw/list/index?categoryId=20158887&amp;acm=3.mce.1_10_19q4a.32270.0.cvbvPqfqXHy59.m_226849" target="_blank" data-log-content="3.mce.1_10_19q4a.32270.0.cvbvPqfqXHy59.m_226849" data-log-index="2">美妆</a>|
                <a class="topLink cube-acm-node col666 has-log-mod" href="http://shop.mogujie.com/1qfnyw/list/index?categoryId=20158900&amp;acm=3.mce.1_10_19q4g.32270.0.cvbvPqfqXHy5a.m_226852" target="_blank" data-log-content="3.mce.1_10_19q4g.32270.0.cvbvPqfqXHy5a.m_226852" data-log-index="3">餐厨</a>|
                <a class="topLink cube-acm-node col666 has-log-mod" href="http://shop.mogujie.com/1qfnyw/list/index?categoryId=20182506&amp;acm=3.mce.1_10_1b1wk.32270.0.cvbvPqfqXHy5b.m_257814" target="_blank" data-log-content="3.mce.1_10_1b1wk.32270.0.cvbvPqfqXHy5b.m_257814" data-log-index="4">小家电</a>|
                <a class="topLink cube-acm-node col666 has-log-mod" href="http://shop.mogujie.com/1qfnyw/list/index?categoryId=20180732&amp;acm=3.mce.1_10_19q4e.32270.0.cvbvPqfqXHy5c.m_226851" target="_blank" data-log-content="3.mce.1_10_19q4e.32270.0.cvbvPqfqXHy5c.m_226851" data-log-index="5">杂货</a></div>
              <a class="checkMore col666" href="http://shop.mogujie.com/1qfnyw" target="_blank">查看全部
                <span class="checkMoreArchor"></span></a>
            </div>
            <div class="floor-con clearfix " data-module-title="优选">
              <!--左边大图-->
              <div class="big-banner-con fl" style="background: #F4EED6; ">
                
                <!-- 文案部分 -->
                <div class="lazyData data-good clearfix fl big-banner-content">     
                </div>
              </div>
              <!-- 中部六张图 -->
              <div class="lazyData clearfix fl" data-ptp="_keyword_32269" data-source-type="" data-source-key="32269" data-manual="true">
                <div class="multi-col-con fl">
                  <!-- 中部六张图 -->
                  <div class="multi-pic multi-pic1">
                  </div>
                </div>
              </div>
              <!--右边推荐-->
              <!-- 品牌推荐 -->
              <div class="lazyData clearfix fl tofuData" data-ptp="_keyword_31235" data-source-type="" data-source-key="31235" data-manual="true">
                <div class="tofu-col-con fl">
                  <div class="recGoodsTitle yahei fl">大家都在买</div>
                  <div class="changeNew yahei fr" onclick=randGoods(this) data-tid="<?php echo ($v["id"]); ?>">
                    <span class="changeNewAnchor" ></span>换一批</div>
                  <div class="tofu-col-con-items">
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div><?php endforeach; endif; ?>

      
        <div class="module_row module_row_368384 MOD_ID_157253 has-log-mod" data-mid="368384" data-versionid="1060400" data-editable="0" data-acm="3.mf.1_0_0.0.0.0.mf_15261_368384">
          <div class="mod_row MCUBE_MOD_ID_157253 J_mod_row_show">
            <style>.MCUBE_MOD_ID_157253 #wall_goods_box .iwf .title,.MCUBE_MOD_ID_157253 #wall_goods_box .iwf .title a { color:#333; } .MCUBE_MOD_ID_157253 #wall_goods_box .iwf .goods_info .price_info { color:#333; }</style>
            <div class="margin-block-box clearfix" style="margin-top: 20px;"></div>
            <div class="imagebox_title_content">
              <span class="imagebox_title_name fl">猜你喜欢</span></div>
            <div class="wall_goods_box" id="wall_goods_box">
              <div class="param_container">
                <!-- 自定义参数配置 -->
              <div class="J_scroll_wallbox clearfix" id="J_scroll_wallbox" style="height: auto;">
                <div class="showgoods goods_list_mod clearfix J_mod_hidebox J_mod_show" id="J_Dynmod_e6t7j22r_2" style="height: auto;">
                  

                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="foot J_siteFooter" data-ptp="_foot" style="background: rgb(245, 245, 245);">
      <div class="mgj_copyright">
        <div class="mgj_footer_helper">
          <div class="mgj_footer_helper_mod">
            <div class="mgj_footer_helper_mod_container">
              <h4 class="mgj_footer_helper_title color_666">- 新手帮助 -</h4>
              <ul>
                <li class="mgj_footer_helper_item">
                  <a rel="nofollow" target="_blank" class="color_999" href="http://cs.mogujie.com/help/faq.html?acm=3.mce.1_10_19kyo.32260.0.ph9Epqfr4Ee5a.m_223508">常见问题</a></li>
                <li class="mgj_footer_helper_item">
                  <a rel="nofollow" target="_blank" class="color_999" href="http://cs.mogujie.com/help/selfservice.html?acm=3.mce.1_10_19kyk.32260.0.ph9Epqfr4Ee5c.m_223506">自助服务</a></li>
                <li class="mgj_footer_helper_item">
                  <a rel="nofollow" target="_blank" class="color_999" href="http://cs.mogujie.com/help/contactus.html?acm=3.mce.1_10_19kym.32260.0.ph9Epqfr4Ee5e.m_223507">联系客服</a></li>
                <li class="mgj_footer_helper_item">
                  <a rel="nofollow" target="_blank" class="color_999" href="http://cs.mogujie.com/help/feedback.html?acm=3.mce.1_10_19kyi.32260.0.ph9Epqfr4Ee5f.m_223505">意见反馈</a></li>
              </ul>
            </div>
          </div>
          <div class="mgj_footer_helper_mod">
            <div class="mgj_footer_helper_mod_container">
              <h4 class="mgj_footer_helper_title color_666">- 权益保障 -</h4>
              <ul>
                <li class="mgj_footer_helper_item">
                  <div class="color_999">全国包邮</div></li>
                <li class="mgj_footer_helper_item">
                  <div class="color_999">7天无理由退货</div></li>
                <li class="mgj_footer_helper_item">
                  <div class="color_999">退货运费补贴</div></li>
                <li class="mgj_footer_helper_item">
                  <div class="color_999">限时发货</div></li>
              </ul>
            </div>
          </div>
          <div class="mgj_footer_helper_mod">
            <div class="mgj_footer_helper_mod_container">
              <h4 class="mgj_footer_helper_title color_666">- 支付方式 -</h4>
              <ul>
                <li class="mgj_footer_helper_item">
                  <div class="color_999">微信支付</div></li>
                <li class="mgj_footer_helper_item">
                  <div class="color_999">支付宝</div></li>
                <li class="mgj_footer_helper_item">
                  <div class="color_999">白付美支付</div></li>
              </ul>
            </div>
          </div>
          <div class="mgj_footer_helper_mod">
            <div class="mgj_footer_helper_mod_container">
              <h4 class="mgj_footer_helper_title color_666">- 移动客户端下载 -</h4>
              <ul>
                <li class="mgj_footer_helper_item mgj_footer_helper_item_last">
                  <div class="color_999">蘑菇街</div>
                  <img class="mgj_footer_helper_quoer_code" src=""></li>
                <li class="mgj_footer_helper_item mgj_footer_helper_item_last">
                  <div class="color_999">美丽说</div>
                  <img class="mgj_footer_helper_quoer_code" src=""></li>
                <li class="mgj_footer_helper_item mgj_footer_helper_item_last">
                  <div class="color_999">uni引力</div>
                  <img class="mgj_footer_helper_quoer_code" src=""></li>
              </ul>
            </div>
          </div>
        </div>

        <!-- 友情链接 -->
        <div class="mgj_footer_otherlink">
          <p class="mgj_footer_otherlink_container">
            <a rel="nofollow" target="_blank" class="mgj_footer_a color_666" href="http://www.meilishuo.com/?mt=12.32159.r223043.29194&amp;acm=3.mce.1_10_19kqm.32159.0.ph9Epqfr4FFBg.m_223363">美丽说</a>
            <b class="mgj_footer_b color_666">|</b>
        </div>

        <div class="mgj_footer_mgjinfo">
          <ul>
            <li class="mgj_footer_mgjinfo_item">
              <a rel="nofollow" target="_blank" class="color_666" href="http://www.mogujie.com/us?acm=3.mce.1_10_19kz6.32163.0.ph9Eoqfr4Ee4V.m_223517">关于我们</a></li>
            <li class="mgj_footer_mgjinfo_item">
              <a rel="nofollow" target="_blank" class="color_666" href="http://job.mogujie.com/social?acm=3.mce.1_10_19kz8.32163.0.ph9Eoqfr4Ee4W.m_223518">招聘信息</a></li>
            <li class="mgj_footer_mgjinfo_item">
              <a rel="nofollow" target="_blank" class="color_666" href="http://www.mogujie.com/about?acm=3.mce.1_10_19kza.32163.0.ph9Eoqfr4Ee4X.m_223519">联系我们</a></li>
            <li class="mgj_footer_mgjinfo_item">
              <a rel="nofollow" target="_blank" class="color_666" href="http://www.xiaodian.com/pc/joinmarket/fashion?acm=3.mce.1_10_19kzg.32163.0.ph9Eoqfr4Ee4Y.m_223522">商家入驻</a></li>
            <li class="mgj_footer_mgjinfo_item">
              <a rel="nofollow" target="_blank" class="color_666" href="http://www.xiaodian.com/pc/shopadmin/shopface?acm=3.mce.1_10_19kzi.32163.0.ph9Eoqfr4Ee4Z.m_223523">商家后台</a></li>
            <li class="mgj_footer_mgjinfo_item">
              <a rel="nofollow" target="_blank" class="color_666" href="http://peixun.xiaodian.com/?acm=3.mce.1_10_19kzk.32163.0.ph9Epqfr4Ee40.m_223524">蘑菇商学院</a></li>
            <li class="mgj_footer_mgjinfo_item">
              <a rel="nofollow" target="_blank" class="color_666" href="http://bbs.xiaodian.com/?acm=3.mce.1_10_19kzm.32163.0.ph9Epqfr4Ee51.m_223525">商家社区</a></li>
          </ul>
          <p class="mgjhostname color_999">©2017 Mogujie.com 杭州卷瓜网络有限公司</p></div>
        <div class="mgj_footer_copyright">
          <p class="mgj_footer_copyright_container">
            <span class="mgj_footer_copyright_span color_999">营业执照注册号：</span>
            <a rel="nofollow" target="_blank" class="mgj_footer_a color_999" href="http://s16.mogucdn.com/p1/160525/upload_ifrdimtcgeztgzdchazdambqmeyde_2480x3508.jpg?acm=3.mce.1_10_19kyq.32170.0.ph9Eoqfr4Ee4Q.m_223509">330106000129004</a>
            <b class="mgj_footer_b color_999">|</b>
            <span class="mgj_footer_copyright_span color_999">网络文化经营许可证：</span>
            <a rel="nofollow" target="_blank" class="mgj_footer_a color_999" href="http://s18.mogucdn.com/p2/160831/upload_59405ekk9ieijjcidl1fijcg04c69_960x1385.jpg?acm=3.mce.1_10_19kyu.32170.0.ph9Eoqfr4Ee4R.m_223511">浙网文（2016）0349-219号</a>
            <b class="mgj_footer_b color_999">|</b>
            <span class="mgj_footer_copyright_span color_999">增值电信业务经营许可证：</span>
            <a rel="nofollow" target="_blank" class="mgj_footer_a color_999" href="https://s10.mogucdn.com/p1/161216/idid_ifqtmylfmvqwiy3emmzdambqgyyde_1239x1753.png?acm=3.mce.1_10_19kys.32170.0.ph9Eoqfr4Ee4S.m_223510">浙B2-20110349</a>
            <b class="mgj_footer_b color_999">|</b>
            <span class="mgj_footer_copyright_span color_999"></span>
            <a rel="nofollow" target="_blank" class="mgj_footer_a color_999" href="http://s16.mogucdn.com/p2/160831/upload_506h1d771b5k20j9148ldjj0kdaab_960x1344.jpg?acm=3.mce.1_10_19l02.32170.0.ph9Eoqfr4Ee4T.m_223533">安全责任书</a>
            <b class="mgj_footer_b color_999">|</b>
            <span class="mgj_footer_copyright_span color_999"></span>
            <a rel="nofollow" target="_blank" class="mgj_footer_a color_999" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=33010602002329&amp;acm=3.mce.1_10_19kz0.32170.0.ph9Eoqfr4Ee4U.m_223514">浙公网安备 33010602002329号</a>
            <b class="mgj_footer_b color_999">|</b></p>
        </div>
      </div>
    </div>
    
    <div id="J_sticky_container" class="sticky-search-container lets-rock" style="display: none;">
      <div class="wrap clearfix">
        <div class="logo-wrap clearfix">
          <a rel="nofollow" href="javascript:;" class="logo" title="蘑菇街|我的买手街" style="position: relative;">
            <div class="search_nav_menu" style="display: inline-block; width: 130px; height: 64px; line-height: 64px; padding: 0px 5px; cursor: pointer; position: absolute; left: 60px; top: -14px;">
              <i class="nav_menu_logo" style="display: inline-block; width: 20px; height: 20px; vertical-align: middle; background: url() center center / 100% 100% no-repeat;"></i>
              <span class="nav_menu_all" style="font-family: PingFangSC; font-size: 14px; color: rgb(255, 0, 119); margin-left: 5px; vertical-align: middle;">全部商品分类</span>
              <i class="nav_menu_icon" style="position: absolute; right: 10px; top: 30px; width: 0px; height: 0px; vertical-align: middle; border-width: 6px; border-style: solid; border-color: rgb(255, 0, 119) transparent transparent;"></i>
            </div>
          </a>
        </div>
        <div class="sticky-search-content">
          <div class="top_nav_search" id="nav_search_form">
            <!--搜索框 -->
            <div class="search_inner_box clearfix">
              <div class="selectbox" data-v="1">
                <span class="selected">搜商品</span>
                <ol>
                  <li class="current" data-index="bao">
                    <a href="http://www.mogujie.com/?f=baidusem_4uv5iimn1v&amp;ptp=_qd._baidu____1043408.160.1.0#">商品</a></li>
                  <li data-index="shop">
                    <a href="http://www.mogujie.com/?f=baidusem_4uv5iimn1v&amp;ptp=_qd._baidu____1043408.160.1.0#">店铺</a></li>
                </ol>
              </div>
              <form action="http://www.mogujie.com/search/" method="get" id="top_nav_form">
                <input type="text" data-tel="search_book" name="q" class="ts_txt fl" data-def="套装" value="" autocomplete="off" def-v="套装韩版新款" data-acm="3.mce.1_10_1af4g.1088.0.nmmlRqfqXFmUb.m_243052">
                <input type="submit" value="搜  索" class="ts_btn">
                <input type="hidden" name="t" value="bao" id="select_type"></form>
              <div class="top_search_hint is-not-ie8-hack"></div>
            </div>
            <div class="ts_hotwords">
              <a rel="nofollow" class="ts_hotword" href="http://list.mogujie.com/s?q=%E5%8D%AB%E8%A1%A3&amp;from=hotword&amp;acm=3.mce.1_10_.37705.28553.qtIkXqfqXIqHj.p_3_hotSearchKeywordRec-lc_201" style="color: #ff4466;">卫衣</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script>

      var url = "<?php echo U('ajaxShowType');?>";

      var pub = "/Project/thinkphp_3.2.3_full/Public/";

      var goods = "<?php echo U('ajaxShowGoods');?>";

      var randGood = "<?php echo U('randGoods');?>";

      var showGoods = "<?php echo U('showGoods');?>";

      var showList = "<?php echo U('List/showList');?>";
  </script>

  <script src="/Project/thinkphp_3.2.3_full/Public/js/jquery-1.10.2.min.js"></script>

  <script src="/Project/thinkphp_3.2.3_full/Public/js/myindex.js"></script>
</html>