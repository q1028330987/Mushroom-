<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Cache-Control" content="no-transform ">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>裙子：2017新款裙子裙子单品购买_裙子搭配图片_蘑菇街裙子裙裤</title>
    <meta name="keywords" content="裙子图片,裙子购买,2017新款裙子,裙子裙子,裙子单品,裙子购买,蘑菇街裙子裙裤,裙子搭配">
    <meta name="description" content="一亿多爱美的女性在这里找寻2016新款裙子裙子单品，发现精美秋季裙子搭配图片和时尚裙子穿衣心得尽在蘑菇街，我的买手街！">
    <link href="/Project/thinkphp_3.2.3_full/Public/css/index.css-028d8895.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="/Project/thinkphp_3.2.3_full/Public/css/bottom.css" media="all">
    <link href="/Project/thinkphp_3.2.3_full/Public/css/wall-base.css-e9c20d74.css" rel="stylesheet" type="text/css">

  </head>
  
  <body class="media_screen_1200">
    <div class="mgj_rightbar J_sidebar" data-ptp="_sidebar" style="right: 0px;">
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
        <a target="_blank" rel="nofollow" href="http://promotion.mogujie.com/trade/promotion/user/shopcoupon">
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
      </div>      <!--足迹-->
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
    
    
    <input type="hidden" id="J_searchbar_flag" value="show">
    <div id="body_wrap">
      <div class="wrap">
        <div id="search_condition_box">
          <div class="sp_topbanner clearfix" id="sp_topbanner">
            <div class="sp_top_nav">
              <ul class="nav_list">
                <?php if(is_array($firstType)): foreach($firstType as $key=>$v): ?><li 
                    <?php if($types[0]['pid'] == $v[id]): ?>class="on"<?php endif; ?>
                  >
                    <a href="<?php echo U('List/showList');?>?tid=<?php echo ($v["id"]); ?>"><?php echo ($v["cname"]); ?></a>
                  </li><?php endforeach; endif; ?>
              </ul>
            </div>
            <div class="sp_type_nav" data-ptp="_cate">

              <div class="type_sections">

                <?php if(is_array($types)): foreach($types as $key=>$vo): ?><div class="type_section first">
                    <dt>
                      <a href="<?php echo U('List/showList');?>?tid=<?php echo ($v["id"]); ?>&pid=<?php echo ($v["pid"]); ?>"><?php echo ($vo["cname"]); ?></a></dt>
                    <dd>
                      <ul>

                        <?php if(is_array($vo["son"])): foreach($vo["son"] as $key=>$v): ?><li>
                              <a href="<?php echo U('List/showList');?>?tid=<?php echo ($v["id"]); ?>&pid=<?php echo ($v["pid"]); ?>" class=" pagani_log_link"><?php echo ($v["cname"]); ?></a>
                            </li><?php endforeach; endif; ?>

                      </ul>
                    </dd>
                  </div><?php endforeach; endif; ?>

              </div>
            </div>
          </div>
        </div>
        <h3 class="sub_title" id="category_all  ">裙子</h3>
        <div class="wall_nav_box" id="wall_nav_box">
          <div class="sort_container fl">
            <a href="javascript:;" class="item item_on" data-sort="pop" tab-index="0">
              <span class="in_border">综合</span></a>
            <a href="javascript:;" class="item " data-sort="sell" tab-index="1">
              <span class="in_border">销量</span></a>
            <a href="javascript:;" class="item " data-sort="new" tab-index="2">
              <span class="in_border">新品</span></a>
          </div>
          <div class="price_input fl">
            <div class="txt">
              <span class="rmb">￥</span>
              <input type="text" class="min_price from" value="" name="minPrice"></div>
            <span class="divid">-</span>
            <div class="txt">
              <span class="rmb">￥</span>
              <input type="text" class="max_price to" value="" name="maxPrice"></div>
            <a class="sbt confirm_btn" href="javascript:;">确定</a></div>
          <div class="price_choice fl">
            <a href="javascript:;" class="price_range_btn fl" data-min-price="55" data-max-price="70">55 - 70</a>
            <a href="javascript:;" class="price_range_btn fl" data-min-price="70" data-max-price="100">70 - 100</a>
            <a href="javascript:;" class="price_range_btn fl" data-min-price="100" data-max-price="140">100 - 140</a></div>
        </div>
        <div class="wall_goods_box" id="wall_goods_box">

          <div class="J_scroll_wallbox clearfix" id="J_scroll_wallbox" style="height: auto;">
            <div class="goods_list_mod showgoods clearfix J_mod_hidebox J_mod_show">

              <?php if(is_array($goods)): foreach($goods as $key=>$vo): ?><div class="iwf goods_item" data-tradeitemid="1k8zfps" goods-index="0" is-exposed="true">

                  <a rel="nofollow" href="<?php echo U('Detail/detailShow');?>?id=<?php echo ($vo["id"]); ?>" class="img pagani_log_link J_dynamic_imagebox loading_bg_120 J_loading_success" target="_blank">
                    <img class="J_dynamic_img fill_img" src="/Project/thinkphp_3.2.3_full/Public/<?php echo ($vo["picurl"]); ?>" alt=""></a>
                  <a rel="nofollow" target="_blank" href="<?php echo U('Detail/detailShow');?>?id=<?php echo ($vo["id"]); ?>" class="pagani_log_link goods_info_container">
                    <p class="title yahei fl" style="height:22px; white-space: nowrap; text-overflow: ellipsis;"><?php echo ($vo["gname"]); ?></p>

                    <div class="goods_info fl">
                      <b class="price_info yahei"><?php echo ($vo["price"]); ?></b>

                      <span class="fav_num fr">
                        <img src="/Project/thinkphp_3.2.3_full/Public/image/collent.png" alt=""><?php echo ($vo["buy"]); ?></span></div>
                  </a>
                </div><?php endforeach; endif; ?>
            </div>
          </div>
        </div>
        <input type="hidden" id="pagani_log_partc" value="skirt_0"></div>
    </div>

    <div id="J_sticky_container" class="sticky-search-container">
      <div class="wrap clearfix">
        <div class="logo-wrap clearfix">
          <a rel="nofollow" href="http://www.mogujie.com/" class="logo" title="蘑菇街|我的买手街">
            <img src="./裙子：2017新款裙子裙子单品购买_裙子搭配图片_蘑菇街裙子裙裤_files/idid_ifqtam3chbrgkzrvmuzdambqgyyde_224x70.png" alt="蘑菇街，我的买手街"></a>
        </div>
        <div class="sticky-search-content"></div>
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
                    <a href="">商品</a></li>
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
  <script src="/Project/thinkphp_3.2.3_full/Public/js/jquery-1.10.2.min.js"></script>

  <script>

      var sub_title = $('.on a').html();

      $('.sub_title').html(sub_title);

(function () {

    var start = 10;

    var tid = <?php echo ($_GET['tid']); ?>;

    $(window).scroll(function () {

        if ( $('.foot').attr('data-flag') != 'true') {

            if ( $('.foot').offset().top-$(window).scrollTop() <= $(window).height() ) {

                $.get(
                    "<?php echo U('ajaxShowGoods');?>",
                    {"start" : start,"tid":tid},
                    function (data) {

                        if (data.length != 0) {

                            var str ='';

                            for (var i=0; i<data.length; i++) {

                                str += '<div class="iwf goods_item" data-tradeitemid="17o66hc" goods-index="120" is-exposed="true"><a rel="nofollow" href="<?php echo U("Detail/detailShow");?>?id='+data[i].id+'" class="img J_dynamic_imagebox loading_bg_120" target="_blank"><img class="J_dynamic_img fill_img" src="/Project/thinkphp_3.2.3_full/Public/' + data[i].picurl +'" alt=""></a><a rel="nofollow" target="_blank" href="" class="goods_info_container" ><p class="title yahei fl" style="height:40px;margin-bottom:3px">'+ data[i].gname +'</p> <div class="goods_info fl"><b class="price_info yahei">¥'+ data[i].price +'</b><span class="fav_num fr"><img src="" alt="">17661</span></div></a></div>';
                            }

                            $('.showgoods').append(str);
                        } else {

                            $('.foot').attr('data-flag', true);
                        }
                    },
                    'json'
                    );

                start += 10;

            }
        }
    });

})();
  </script>

</html>