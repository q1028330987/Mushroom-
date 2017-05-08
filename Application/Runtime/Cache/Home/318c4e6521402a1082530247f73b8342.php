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
        <script type="text/javascript">/**
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
            })();</script>
        <div class="mgj_rightbar J_sidebar" data-ptp="_sidebar" style="right: 0px;">
            <!--空的右侧边栏-->
            <div id="mgj_rightbar_top_blank" class="mgj_rightbar_960"></div>
            <!--方便定margin的空dediv-->
            <div id="mgj_rightbar_blank_div"></div>
            <!--用户头像-->
            <div class="sidebar-item mgj-my-avatar">
                <a target="_blank" href="http://www.mogujie.com/member/" rel="nofollow">
                    <div class="img">
                        <img width="20" height="20" src="/Project/thinkphp_3.2.3_full/Public/payMoney/05.jpg_48x48.jpg" alt=""></div>
                </a>
            </div>
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
                <a target="_blank" rel="nofollow" href="http://www.mogujie.com/trade/promotion/user/shopcoupon/">
                    <i class="s-icon"></i>
                    <div class="s-txt">优惠券</div>
                    <div class="num"></div>
                </a>
            </div>
            <!--钱包-->
            <div class="sidebar-item mgj-my-wallet">
                <a target="_blank" rel="nofollow" href="https://payuserp.mogujie.com/wallet/home">
                    <i class="s-icon"></i>
                    <div class="s-txt">钱包</div></a>
            </div>
            <!--足迹-->
            <div class="sidebar-item mgj-my-browserlog">
                <a target="_blank" rel="nofollow" href="http://track.mogujie.com/">
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
    
        
        <style>.innerwrap{ margin-right: -30px; } .media_screen_960 { min-width: 960px; } .promotionTopNavContainer { height: 50px; overflow: hidden; display: none;} .promotionTopNavContainer a { display: block; width: 86px; height: 50px; overflow: hidden;} .promotionTopNavContainer a.first { width: 168px; } /** screnn-960 **/ .media_screen_960 .promotionTopNavContainer .first{ width: 153px!important; } .media_screen_960 .promotionTopNavContainer a { width: 66px; } .media_screen_960 .promotionTopNavContainer a.last {width: 80px;} .wrap { position: relative;}</style>
        <div class="promotionTopNavContainer"></div>
        
        <script type="text/template" class="topnavPromotionTpl">< div class = "wrap" > <div class = "innerwrap clearfix" > {
                {~it: item: index
                }
            } < a class = "fl {{?index===0}}first{{??index===it.length-1}}last{{?}}"href = "{{=item.link || 'javascript:;'}}"target = "_blank"style = "background:url({{=item.image}}) no-repeat center center" ></a>
            {{~}}
        </div > </div>
/</script>
</script>

        <div id="body_wrap">
            <div class="g-header clearfix ">
                <div class="g-header-in wrap clearfix">
                    <div class="process-bar">
                        <div class="md_process md_process_len4 md_process_">
                            <div class="md_process_wrap md_process_step3_5">
                                <div class="md_process_sd md_process_sd_"></div>
                                <i class="md_process_i md_process_i1">1
                                    <span class="md_process_tip">购物车</span></i>
                                <i class="md_process_i md_process_i2">2
                                    <span class="md_process_tip">确认订单</span></i>
                                <i class="md_process_i md_process_i3">3
                                    <span class="md_process_tip">支付</span></i>
                                <i class="md_process_i md_process_i4">
                                    <img src="/Project/thinkphp_3.2.3_full/Public/payMoney/right.png" width="23" height="23" alt="">
                                    <span class="md_process_tip">完成</span></i>
                            </div>
                        </div>
                    </div>
                    <a title="蘑菇街|我的买手街" href="javascript:;" target="_blank">
                        <div class="logo logo-cashier"></div>
                    </a>
                </div>
            </div>
            <div class="wrap g-wrap " id="J_proxy">
                <div class="md-order-head clearfix">
                    <h2 class="tit fl">
                        <div class="tit-product"><?php echo ($gname); ?> 等<?php echo ($num); ?>件</div>
                        <span class="J_cashierTimer" data-timer="85388" data-tpl="&lt;span&gt;请您于&lt;/span&gt;
                        &lt;span class=&#39;color-red&#39;&gt;%h时%i分%s秒&lt;/span&gt;&lt;span&gt;内完成支付&lt;/span&gt;">
                            <span>请您于</span>
                            <span class="color-red">23时59分59秒</span>
                            <span>内完成支付</span></span>
                        <span class="tit-fw">(逾期将被取消)</span></h2>
                    <span class="mon fr" style="visibility:hidden">
                        <span>应付金额：</span>
                        <span class="mon-num">
                            <span>¥</span>
                            <span id="J_OrderData" data-pid="trade" data-payid="704170141893727032" data-orderid="62005878053688" data-redirectinurl="" data-redirect="http://www.mogujie.com/trade/cart/success?orderId=62005878053688" data-usemodou="0"><?php echo ($total); ?></span></span>
                    </span>
                </div>
                <div class="md-discount" id="J_productPay">
                <form  id="submitOrder" action="<?php echo U('paySuccess');?>"method="post" >
                    <input type="hidden" name="oid" value="<?php echo ($oid); ?>">
                    <ul class="banklist-line banklist-btm">
                        <!-- 平台支付 -->
                        <li class="banklist-item J_banklistItem J_2step2">
                            <i class="product-icon icon-wechatPay"></i>

                            <span class="earnname">微信支付</span>
                            <span class="paynum payhover">实付金额：
                                <span class="num">￥<?php echo ($total); ?></span></span>
                            <input type="radio" checked="true"value="1" name="pay" >   
                        </li>
                        <!-- 平台支付 -->
                        <li class="banklist-item J_banklistItem J_2step2 " data-method="aliPay" data-price="1301.48" >
                            <i class="product-icon icon-aliPay"></i>
                            <span class="earnname">支付宝支付</span>
                            <span class="paynum payhover">实付金额：
                                <span class="num">￥<?php echo ($total); ?></span>
                            </span>
                            <input type="radio" name="pay" value="2">   
                        </li>
                        <!-- 网上银行 -->
                        <li class="banklist-item J_banklistItem J_banking">
                            <i class="product-icon icon-bank-list"></i>
                            <span class="earnname">网上银行</span>
                            <input type="radio" value="3" name="pay" />
                            <span class="paynum payhover">实付金额：
                                <span class="num">￥<?php echo ($total); ?></span></span>
                            <ul class="banklist-list clearfix J_banklist">
                                <li class="banklist-item J_banklistItem J_2step2" data-method="cftPay" data-paytype="2" data-bankid="0001" data-price="1301.48">
                                    <span class="logo">
                                        <img src="/Project/thinkphp_3.2.3_full/Public/payMoney/0001.jpg" width="130" height="40" alt=""></span>
                                </li>
                                <li class="banklist-item J_banklistItem J_2step2" data-method="cftPay" data-paytype="2" data-bankid="0002" data-price="1301.48">
                                    <span class="logo">
                                        <img src="/Project/thinkphp_3.2.3_full/Public/payMoney/0002.jpg" width="130" height="40" alt=""></span>
                                </li>
                                <li class="banklist-item J_banklistItem J_2step2" data-method="cftPay" data-paytype="2" data-bankid="0003" data-price="1301.48">
                                    <span class="logo">
                                        <img src="/Project/thinkphp_3.2.3_full/Public/payMoney/0003.jpg" width="130" height="40" alt=""></span>
                                </li>
                                <li class="banklist-item J_banklistItem J_2step2" data-method="cftPay" data-paytype="2" data-bankid="0004" data-price="1301.48">
                                    <span class="logo">
                                        <img src="/Project/thinkphp_3.2.3_full/Public/payMoney/0004.jpg" width="130" height="40" alt=""></span>
                                </li>
                                <li class="banklist-item J_banklistItem J_2step2" data-method="cftPay" data-paytype="2" data-bankid="0008" data-price="1301.48">
                                    <span class="logo">
                                        <img src="/Project/thinkphp_3.2.3_full/Public/payMoney/0008.jpg" width="130" height="40" alt=""></span>
                                </li>
                                <li class="banklist-item J_banklistItem J_2step2" data-method="cftPay" data-paytype="2" data-bankid="0016" data-price="1301.48">
                                    <span class="logo">
                                        <img src="/Project/thinkphp_3.2.3_full/Public/payMoney/0016.jpg" width="130" height="40" alt=""></span>
                                </li>
                                <li class="banklist-item J_banklistItem J_2step2" data-method="cftPay" data-paytype="2" data-bankid="0005" data-price="1301.48">
                                    <span class="logo">
                                        <img src="/Project/thinkphp_3.2.3_full/Public/payMoney/0005.jpg" width="130" height="40" alt=""></span>
                                </li>
                                <li class="banklist-item J_banklistItem J_2step2" data-method="cftPay" data-paytype="2" data-bankid="0012" data-price="1301.48">
                                    <span class="logo">
                                        <img src="/Project/thinkphp_3.2.3_full/Public/payMoney/0012.jpg" width="130" height="40" alt=""></span>
                                </li>
                                <li class="banklist-item J_banklistItem J_2step2" data-method="cftPay" data-paytype="2" data-bankid="0019" data-price="1301.48">
                                    <span class="logo">
                                        <img src="/Project/thinkphp_3.2.3_full/Public/payMoney/0019.jpg" width="130" height="40" alt=""></span>
                                </li>
                                <li class="banklist-item J_banklistItem J_2step2" data-method="cftPay" data-paytype="2" data-bankid="0009" data-price="1301.48">
                                    <span class="logo">
                                        <img src="/Project/thinkphp_3.2.3_full/Public/payMoney/0009.jpg" width="130" height="40" alt=""></span>
                                </li>
                                <li class="banklist-item J_banklistItem J_2step2" data-method="cftPay" data-paytype="2" data-bankid="0010" data-price="1301.48">
                                    <span class="logo">
                                        <img src="/Project/thinkphp_3.2.3_full/Public/payMoney/0010.jpg" width="130" height="40" alt=""></span>
                                </li>
                                <li class="banklist-item J_banklistItem J_2step2" data-method="cftPay" data-paytype="2" data-bankid="0011" data-price="1301.48">
                                    <span class="logo">
                                        <img src="/Project/thinkphp_3.2.3_full/Public/payMoney/0011.jpg" width="130" height="40" alt=""></span>
                                </li>
                                <li class="banklist-item J_banklistItem J_2step2" data-method="cftPay" data-paytype="2" data-bankid="0006" data-price="1301.48">
                                    <span class="logo">
                                        <img src="/Project/thinkphp_3.2.3_full/Public/payMoney/0006.jpg" width="130" height="40" alt=""></span>
                                </li>
                                <li class="banklist-item J_banklistItem J_2step2" data-method="cftPay" data-paytype="2" data-bankid="0007" data-price="1301.48">
                                    <span class="logo">
                                        <img src="/Project/thinkphp_3.2.3_full/Public/payMoney/0007.jpg" width="130" height="40" alt=""></span>
                                </li>
                                <li class="banklist-item J_banklistItem J_2step2" data-method="cftPay" data-paytype="2" data-bankid="0017" data-price="1301.48">
                                    <span class="logo">
                                        <img src="/Project/thinkphp_3.2.3_full/Public/payMoney/0017.jpg" width="130" height="40" alt=""></span>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                </form>
                <span id="tip" style="position:absolute;left:30px;font-size:18px;"></span>
                <p class="bottom-tip">暂不支持银行卡支付，请选择其他支付方式</p>
                <a href="javascript:;"  onclick="return submit()" style="position:absolute;right:0px;bottom:30px;" class="btn-pay J_alipayLink">确认并付款</a>
            </div>

        </div>
        <div class="g-footer"></div>
        <script type="text/javascript" src="/Project/thinkphp_3.2.3_full/Public/payMoney/index.js-4864f255.js.下载"></script>
        <script type="text/javascript" src="/Project/thinkphp_3.2.3_full/Public/payMoney/nav.js-4da09a72.js.下载"></script>
        <div class="light_box_fullbg_light" id="J_loadingMask" style="display: none;"></div>
        <div class="loading-toast" id="J_loading" style="display: none;">请稍后...</div>
        <script type="text/javascript">
        function submit(){

            var checked = $('input[name="pay"]');

            $('span[data-tip="true"]').remove();
            console.log( $('input[name="pay"]')[0].getAttribute('checked') ||  $('input[name="pay"]')[1].getAttribute('checked') ||
                $('input[name="pay"]')[2].getAttribute('checked') );
            if( $('input[name="pay"]')[0].getAttribute('checked') ||  $('input[name="pay"]')[1].getAttribute('checked') ||
                $('input[name="pay"]')[2].getAttribute('checked') ){

                     $('span[data-tip="true"]').remove();
                    document:submitOrder.submit();
            }else{

                    $('#tip').html('<span  data-tip="true" style="color:#ff0078;">请选择支付方式</span>');

                 
               
            }



        }


        </script>
    </body>

</html>