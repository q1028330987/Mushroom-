<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta charset="UTF-8" />
        <title>
            我的购物车
        </title>
        <style>
            .success{ display:none; }
        </style>
        <link rel="icon" href="/Project/thinkphp_3.2.3_full/Public/Cart/icon.jpg" type="image/x-icon" />
        <link href="/Project/thinkphp_3.2.3_full/Public/Cart/index.css" rel="stylesheet" type="text/css"
        />
        <link rel="stylesheet" type="text/css" href="/Project/thinkphp_3.2.3_full/Public/Cart/bottom.css"
        media="all" />
        <link href="/Project/thinkphp_3.2.3_full/Public/Cart/index_002.css" rel="stylesheet" type="text/css"
        />
        <script type="text/javascript" src="/Project/thinkphp_3.2.3_full/Public/Cart/pkg-pc-base.js">
        </script>
    </head>
    
    <body class="media_screen_1200">
        <div class="mgj_rightbar J_sidebar" data-ptp="_sidebar" style="right: 0px;">
            <!--空的右侧边栏-->
            <div id="mgj_rightbar_top_blank" class="mgj_rightbar_960">
            </div>
            <!--方便定margin的空dediv-->
            <div id="mgj_rightbar_blank_div">
            </div>
            <!--用户头像-->
            <div class="sidebar-item mgj-my-avatar">
                <a target="_blank" href="http://www.mogujie.com/member" rel="nofollow">
                    <div class="img">
                        <img src="" alt="" width="20" height="20" />
                    </div>
                </a>
            </div>
            <!--购物车-->
            <div class="sidebar-item mgj-my-cart" style="left: 0px;">
                <a target="_blank" href="">
                    <i class="s-icon">
                    </i>
                    <div class="s-txt">
                        购物车
                    </div>
                    <div class="num" style="display: block;">
                        4
                    </div>
                </a>
            </div>
            <!--优惠券-->
            <div class="sidebar-item mgj-my-coupon">
                <a target="_blank" rel="nofollow" href="">
                    <i class="s-icon">
                    </i>
                    <div class="s-txt">
                        优惠券
                    </div>
                    <div class="num" style="display: none;">
                    </div>
                </a>
            </div>
            <!--钱包-->
            <div class="sidebar-item mgj-my-wallet">
                <a target="_blank" rel="nofollow" href="">
                    <i class="s-icon">
                    </i>
                    <div class="s-txt">
                        钱包
                    </div>
                </a>
            </div>
            <!--足迹-->
            <div class="sidebar-item mgj-my-browserlog">
                <a target="_blank" rel="nofollow" href="">
                    <i class="s-icon">
                    </i>
                    <div class="s-txt">
                        足迹
                    </div>
                </a>
            </div>
            <div class="sideBottom">
                <!--回到顶部-->
                <div class="sidebar-item mgj-back2top" style="left: 0px;">
                    <a rel="nofollow" href="javascript:;">
                        <i class="s-icon">
                        </i>
                    </a>
                </div>
            </div>
        </div>
        <!-- 头部 -->
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
        
  <style>
    .innerwrap{  margin-right: -30px;  }
    .media_screen_960 { min-width: 960px; }

    .promotionTopNavContainer { height: 50px; overflow: hidden; display: none;}
    .promotionTopNavContainer a { display: block; width: 86px; height: 50px; overflow: hidden;}
    .promotionTopNavContainer a.first { width: 168px; }

    /** screnn-960 **/
    .media_screen_960 .promotionTopNavContainer .first{ width: 153px!important; }
    .media_screen_960 .promotionTopNavContainer a { width: 66px; }
    .media_screen_960 .promotionTopNavContainer a.last {width: 80px;}
    .wrap { position: relative;}
</style> 
  <div class="promotionTopNavContainer"></div>
  <div id="body_wrap"> 
   <div class="g-header clearfix"> 
    <div class="g-header-in wrap clearfix"> 
     <div class="process-bar"> 
      <div class="md_process md_process_len4"> 
       <div class="md_process_wrap md_process_step1_5"> 
        <div class="md_process_sd"></div> 
        <i class="md_process_i md_process_i1"> 1 <span class="md_process_tip">购物车</span> </i> 
        <i class="md_process_i md_process_i2"> 2 <span class="md_process_tip">确认订单</span> </i> 
        <i class="md_process_i md_process_i3"> 3 <span class="md_process_tip">支付</span> </i> 
        <i class="md_process_i md_process_i4"> <img src="" alt="" width="23" height="23" /> <span class="md_process_tip">完成</span> </i> 
       </div> 
      </div> 
     </div> 
     <div class="logo logo-cart"></div> 
    </div> 
   </div> 
   <script type="text/template" id="tpl_cart_tab">
  <div class="g-wrap wrap">
      <ul class="clearfix cart_slide" id="cartSlide">
          <li>
              <a href="javascript:;" url="0" class="">
                  全部商品 <span class="num"></span>
              </a>
          </li>
      </ul>
  </div>
</script> 
   <div class="g-wrap wrap"> 
    <ul class="clearfix cart_slide" id="cartSlide"> 
     <li> <a href="javascript:;" url="0" class="mr55 cart_slide_item cartSlideItemAll cart_slide_item_cur"> 全部商品 <span id="num" goodsnum="<?php echo ($goodsnum); ?>"}</span> </a> </li>
    </ul> 
    <!-- 不为空的情况 --> 
    <div class="cart_wrap cart_nobdbtm"> 
     <div class="cart_page_wrap" id="cartPage"> 
      <input name="shop_domain" id="shop_domain" value="" type="hidden" /> 
      <input name="data_props" id="data_props" value="" type="hidden" /> 
      <input id="coudan_type" value="0" type="hidden" /> 
      <!-- 表格 --> 
      <table class="cart_table" id="cartOrderTable"> 
       <thead> 
        <tr> 
         <th class="cart_table_check_wrap cart_alleft"> <input name="s_all" class="s_all tr_checkmr" id="s_all_h" type="checkbox" /> <label for="s_all_h">全选</label> </th> 
         <th class="cart_table_goods_wrap"></th> 
         <th class="cart_table_goodsinfo_wrap">商品信息</th> 
         <th>单价(元)</th> 
         <th class="cart_table_goodsnum_wrap">数量</th> 
         <th class="cart_table_goodssum_wrap">小计(元)</th> 
         <th class="cart_table_goodsctrl_wrap">操作</th> 
        </tr> 
       </thead> 
       <tbody id="tbody"> 
        
        <!-- 若购物车不为空，遍历得出商品 -->
        <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr class="cart_mitem "  data-price="7857" style=""> 
         <td class="vm "> <input class="cart_thcheck" data-stockid="1n1o3c0" type="checkbox" goodsid="<?php echo ($v["goodsid"]); ?>" goodsName=<?php echo ($v["goodsName"]); ?> selectSize="<?php echo ($v["selectSize"]); ?>" selectColor="<?php echo ($v["selectColor"]); ?>" floatgoodsPrice="<?php echo ($v["floatgoodsPrice"]); ?>" colorPic="<?php echo ($v["colorPic"]); ?>" subtotal="<?php echo ($v["subtotal"]); ?>" selectNum="<?php echo ($v["selectNum"]); ?>" mark="<?php echo ($v["mark"]); ?>"/> </td> 
         <td class="cart_table_goods_wrap" style="position:relative; ">
          <!-- 商品 --> <a href="<?php echo U('Detail/detailShow');?>?id=<?php echo ($v["goodsid"]); ?>" target="_blank" class="cart_goods_img"> <img class="cartImgTip" src="<?php echo ($v["colorPic"]); ?>"  width="78" height="78" /> </a><img src="<?php echo ($v["colorPic"]); ?>" width="250" height="300" style="position:absolute;left:85px;top:-60px;z-index:1000;display:none;" class="bigImg"> 
          <!-- 商品title --> <a href="<?php echo U('Detail/detailShow');?>?id=<?php echo ($v["goodsid"]); ?>" target="_blank" class="cart_goods_t cart_hoverline" title="<?php echo ($v["goodsName"]); ?>"><?php echo ($v["goodsName"]); ?></a>
           </td> 
         <td> <p class="selectColor" selectColor="<?php echo ($v["selectColor"]); ?>">颜色：<?php echo ($v["selectColor"]); ?></p> <p class="selectSize" selectSize="<?php echo ($v["selectSize"]); ?>">尺码：<?php echo ($v["selectSize"]); ?></p> </td> 
         <td class="cart_alcenter">
          <!-- 单价 -->  <p class="floatgoodsPrice cart_bold cart_data_sprice" data-price="<?php echo ($v["floatgoodsPrice"]); ?>" floatgoodsPrice="<?php echo ($v["floatgoodsPrice"]); ?>"> <?php echo ($v["floatgoodsPrice"]); ?></p></td> 
         <td class="cart_alcenter">
          <!-- 数量 --> 
          <div style="position:relative"> 
           <div class="cart_num cart_counter" data-stockid="1n1o3c0" data-stocknum="201" data-timestamp="" data-ptp="1.a4GzCb.0.0.339JQ">
            <span class="cart_num_add" floatgoodsPrice="<?php echo ($v["floatgoodsPrice"]); ?>" goodsid="<?php echo ($v["goodsid"]); ?>" mark="<?php echo ($v["mark"]); ?>"></span> 
            <input style="width:44px;text-align:center;" value="<?php echo ($v["selectNum"]); ?>" class="selectNum">
            <span class="cart_num_reduce" floatgoodsPrice="<?php echo ($v["floatgoodsPrice"]); ?>" goodsid="<?php echo ($v["goodsid"]); ?>" mark="<?php echo ($v["mark"]); ?>"></span><br/>
            <span style="position:absolute;left:0px;font-size:12px;" class="success">亲，库存不够！</span>
           </div> 
          </div> </td> 
         <td class="cart_alcenter">
          <!-- 小计 --> <p class="subtotal cart_deep_red cart_font16 item_sum" data-unit="" data-price="" subtotal="<?php echo ($v["subtotal"]); ?>"><?php echo ($v["subtotal"]); ?></p> </td> 
         <td class="cart_alcenter">
          <!-- 操作 --> <a href="javascript:;"  class="cart_hoverline delete deleteThisGoods" mark="<?php echo ($v["mark"]); ?>">删除</a> </td> 
        </tr>
        <tr class="success" > 
         <td colspan="7"> 
          <div class="m-undo-wrap">
           成功删除 
           <span class="J_num">1</span> 件商品，如有误，可
           <a href="javascript:;" mark="<?php echo ($v["mark"]); ?>" class="J_undo">撤销本次删除</a>
          </div> </td> 
        </tr><?php endforeach; endif; ?>
        
       </tbody> 
      </table> 
      <!-- 表格 end -->
     </div> 
     <div class="cart_page_wrap" id="cartEmptyPage" style="display:none;"> 
      <div class="cart_empty"> 
       <div class="cart_empty_icon"></div> 
       <h5 class="mb20"><a href="<?php echo U('Index/index');?>">您的购物车还是空的，赶快去挑选商品吧！</a></h5>
      </div> 
     </div> 
    </div> 
    <div class="cart_paybar wrap" id="cartPaybar" > 
     <a href="javascript:;" class="cart_paybtn fr cart_paybtn_disable" id="payBtn" submit="" style="color:red; ">去付款</a>      
     <div class="cart_paybar_info_cost cart_deep_red cart_bold cart_font26 cart_money fr goodsSum" value=" ">
       0.00
     </div>

    <!-- 设置一个input隐藏框来接受订单总价 -->
     <!-- <input type="hidden" value="" id="orderSumMoney"> -->
     <span style="position:absolute;left:750px;font-size:16px;color:red; ">单位(元)</span> 
     <div class="cart_paybar_info cart_pregray fr">
       共有 
      <span class="cart_deep_red goodsNum">0</span> 件商品，总计： 
     </div>
     <div class="cart_paybar_vmbox"> 
      <input name="s_all" class="s_all_slave cart_vm" id="s_all_f" type="checkbox" /> 
      <label for="s_all_f" class="mr10">全选</label> 
      <a href="javascript:;" class="mr10 cart_hoverline cart_pregray" id="cartRemoveChecked">删除</a>
     </div> 
    </div> 
    <form action="http://buy.mogujie.com/buy?ptp=1.ii9Gy.0.0.IfDED&amp;f=baidusem_4uv5iimn1v" id="postform" method="POST"> 
     <input name="postdata" id="postdata" type="hidden" /> 
     <input name="mtk" value="" type="hidden" /> 
     <input name="ptp" id="ptpdata" type="hidden" /> 
     <input name="stockptp" id="stockptp" type="hidden" /> 
     <input name="orderFrom" id="orderFrom" value="cart" type="hidden" /> 
    </form> 
   </div>
  </div> 
  <div class="foot J_siteFooter" data-ptp="_foot">
   <div class="mgj_copyright">
    <div class="mgj_footer_helper">
     <div class="mgj_footer_helper_mod">
      <div class="mgj_footer_helper_mod_container">
       <h4 class="mgj_footer_helper_title color_666">- 新手帮助 -</h4>
       <ul>
        <li class="mgj_footer_helper_item"><a rel="nofollow" target="_blank" class="color_999" href="http://cs.mogujie.com/help/faq.html?acm=3.mce.1_10_19kyo.32260.0.cvbvPqgDjsowc.m_223508">常见问题</a></li>
        <li class="mgj_footer_helper_item"><a rel="nofollow" target="_blank" class="color_999" href="http://cs.mogujie.com/help/selfservice.html?acm=3.mce.1_10_19kyk.32260.0.cvbvPqgDjsowd.m_223506">自助服务</a></li>
        <li class="mgj_footer_helper_item"><a rel="nofollow" target="_blank" class="color_999" href="http://cs.mogujie.com/help/contactus.html?acm=3.mce.1_10_19kym.32260.0.cvbvPqgDjsowe.m_223507">联系客服</a></li>
        <li class="mgj_footer_helper_item"><a rel="nofollow" target="_blank" class="color_999" href="http://cs.mogujie.com/help/feedback.html?acm=3.mce.1_10_19kyi.32260.0.cvbvPqgDjsowf.m_223505">意见反馈</a></li>
       </ul>
      </div>
     </div>
     <div class="mgj_footer_helper_mod">
      <div class="mgj_footer_helper_mod_container">
       <h4 class="mgj_footer_helper_title color_666">- 权益保障 -</h4>
       <ul>
        <li class="mgj_footer_helper_item">
         <div class="color_999">
          全国包邮
         </div></li>
        <li class="mgj_footer_helper_item">
         <div class="color_999">
          7天无理由退货
         </div></li>
        <li class="mgj_footer_helper_item">
         <div class="color_999">
          退货运费补贴
         </div></li>
        <li class="mgj_footer_helper_item">
         <div class="color_999">
          限时发货
         </div></li>
       </ul>
      </div>
     </div>
     <div class="mgj_footer_helper_mod">
      <div class="mgj_footer_helper_mod_container">
       <h4 class="mgj_footer_helper_title color_666">- 支付方式 -</h4>
       <ul>
        <li class="mgj_footer_helper_item">
         <div class="color_999">
          微信支付
         </div></li>
        <li class="mgj_footer_helper_item">
         <div class="color_999">
          支付宝
         </div></li>
        <li class="mgj_footer_helper_item">
         <div class="color_999">
          白付美支付
         </div></li>
       </ul>
      </div>
     </div>
     <div class="mgj_footer_helper_mod">
      <div class="mgj_footer_helper_mod_container">
       <h4 class="mgj_footer_helper_title color_666">- 移动客户端下载 -</h4>
       <ul>
        <li class="mgj_footer_helper_item mgj_footer_helper_item_last">
         <div class="color_999">
          蘑菇街
         </div></li>
        <li class="mgj_footer_helper_item mgj_footer_helper_item_last">
         <div class="color_999">
          美丽说
         </div></li>
        <li class="mgj_footer_helper_item mgj_footer_helper_item_last">
         <div class="color_999">
          uni引力
         </div></li>
       </ul>
      </div>
     </div>
    </div>
    <div class="mgj_footer_mgjinfo">
     <ul>
      <li class="mgj_footer_mgjinfo_item"><a rel="nofollow" target="_blank" class="color_666" href="http://www.mogujie.com/us?acm=3.mce.1_10_19kz6.32163.0.cvbvOqgDjsoPq.m_223517">关于我们</a></li>
      <li class="mgj_footer_mgjinfo_item"><a rel="nofollow" target="_blank" class="color_666" href="http://job.mogujie.com/social?acm=3.mce.1_10_19kz8.32163.0.cvbvOqgDjsoPr.m_223518">招聘信息</a></li>
      <li class="mgj_footer_mgjinfo_item"><a rel="nofollow" target="_blank" class="color_666" href="http://www.mogujie.com/about?acm=3.mce.1_10_19kza.32163.0.cvbvOqgDjsoPs.m_223519">联系我们</a></li>
      <li class="mgj_footer_mgjinfo_item"><a rel="nofollow" target="_blank" class="color_666" href="http://www.xiaodian.com/pc/joinmarket/fashion?acm=3.mce.1_10_19kzg.32163.0.cvbvOqgDjsoPt.m_223522">商家入驻</a></li>
      <li class="mgj_footer_mgjinfo_item"><a rel="nofollow" target="_blank" class="color_666" href="http://www.xiaodian.com/pc/shopadmin/shopface?acm=3.mce.1_10_19kzi.32163.0.cvbvOqgDjsoPu.m_223523">商家后台</a></li>
      <li class="mgj_footer_mgjinfo_item"><a rel="nofollow" target="_blank" class="color_666" href="http://peixun.xiaodian.com/?acm=3.mce.1_10_19kzk.32163.0.cvbvOqgDjsoPv.m_223524">蘑菇商学院</a></li>
      <li class="mgj_footer_mgjinfo_item"><a rel="nofollow" target="_blank" class="color_666" href="http://bbs.xiaodian.com/?acm=3.mce.1_10_19kzm.32163.0.cvbvOqgDjsoPw.m_223525">商家社区</a></li>
     </ul>
     <p class="mgjhostname color_999">&copy;2017 Mogujie.com 杭州卷瓜网络有限公司</p>
    </div>
    <div class="mgj_footer_copyright">
     <p class="mgj_footer_copyright_container"><span class="mgj_footer_copyright_span color_999">营业执照注册号：</span><a rel="nofollow" target="_blank" class="mgj_footer_a color_999" href="http://s16.mogucdn.com/p1/160525/upload_ifrdimtcgeztgzdchazdambqmeyde_2480x3508.jpg?acm=3.mce.1_10_19kyq.32170.0.cvbvPqgDjsoxg.m_223509">330106000129004</a><b class="mgj_footer_b color_999"> | </b><span class="mgj_footer_copyright_span color_999">网络文化经营许可证：</span><a rel="nofollow" target="_blank" class="mgj_footer_a color_999" href="http://s18.mogucdn.com/p2/160831/upload_59405ekk9ieijjcidl1fijcg04c69_960x1385.jpg?acm=3.mce.1_10_19kyu.32170.0.cvbvPqgDjsoxh.m_223511">浙网文（2016）0349-219号</a><b class="mgj_footer_b color_999"> | </b><span class="mgj_footer_copyright_span color_999">增值电信业务经营许可证：</span><a rel="nofollow" target="_blank" class="mgj_footer_a color_999" href="https://s10.mogucdn.com/p1/161216/idid_ifqtmylfmvqwiy3emmzdambqgyyde_1239x1753.png?acm=3.mce.1_10_19kys.32170.0.cvbvPqgDjsoxi.m_223510">浙B2-20110349</a><b class="mgj_footer_b color_999"> | </b><span class="mgj_footer_copyright_span color_999"></span><a rel="nofollow" target="_blank" class="mgj_footer_a color_999" href="http://s16.mogucdn.com/p2/160831/upload_506h1d771b5k20j9148ldjj0kdaab_960x1344.jpg?acm=3.mce.1_10_19l02.32170.0.cvbvPqgDjsoxj.m_223533">安全责任书</a><b class="mgj_footer_b color_999"> | </b><span class="mgj_footer_copyright_span color_999"></span><a rel="nofollow" target="_blank" class="mgj_footer_a color_999" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=33010602002329&amp;acm=3.mce.1_10_19kz0.32170.0.cvbvPqgDjsoxk.m_223514">浙公网安备 33010602002329号</a><b class="mgj_footer_b color_999"> | </b></p>
    </div>
   </div>
  </div>
</body>
</html>
<script type="text/javascript" src="/Project/thinkphp_3.2.3_full/Public/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript">

    //删除商品
    $('.deleteThisGoods').click(function (){

        var that = $(this);

        //为当前的tr标签加上success类，使其不显示
        that.parent().parent().attr('class','success');

        //若之前有删除多个商品，使其撤销删除的提示取消
        $('.J_undo').parent().parent().parent().attr('class','success');

        //使得当前删除的商品的撤销提示显示
        that.parent().parent().next().attr('class',' ');

        //定义当前的商品的mark标记
        var mark = that.attr('mark');

        //若该商品是选中的状态，则获取到该商品的小计，ajax请求，SESSION中的总的订单的金额减去该小计的金额，并返回新的金额，和订单中的商品的数量
        
        //判断该商品是否被选中
        var thisChange = that.parent().prev().prev().prev().prev().prev().prev().find('.cart_thcheck').prop('checked');

        if (thisChange == true){

            //获取到该商品的小计
            var subtotal = that.parent().prev().prev().prev().prev().prev().prev().find('.cart_thcheck').attr('subtotal');

            //ajax请求，改变总的订单金额,把该商品从订单下删除掉，获取到订单下商品的数量
            $.post(
                   "/Project/thinkphp_3.2.3_full/index.php/Home/Cart/everyDeleteChangeAllMoney",
                   {
                    mark:mark,
                    delete:'delete',
                    subtotal:subtotal,
                   },
                   function (data) {

                    //获取到返回的订单下的商品的的数量
                    var orderGoodsNum = data[0];

                    //获取到返回的订单下的商品的金额
                    var orderMoney = data[1];

                    $('.cart_paybar_info_cost').html(orderMoney);

                    $('.goodsNum').html(orderGoodsNum);

                   },
                   'json',

            );
            
        }

        //ajax请求从购物车下删除该商品
        $.post(
            "/Project/thinkphp_3.2.3_full/index.php/Home/Cart/deleteThisGoods",

            {
                mark:mark,
            },

            function (data) {

            },

            'json'
        );
    });

    //撤销删除
    $('.J_undo').click(function (){

        var that = $(this);

        //使得删除的该商品显示出来
        that.parent().parent().parent().prev().attr('class',' ');

        //使得之前删除商品留下来的撤销提示显示出来
        $('.J_undo').parent().parent().parent().attr('class','success');

        //获取到该商品的mark标记
        var mark = that.attr('mark');

        //判断该商品是否被选中
        var thisChange = that.parent().parent().parent().prev().find('.cart_thcheck').prop('checked');
        
        if (thisChange == true) {

            //获取到该商品的小计
        var subtotal = that.parent().parent().parent().prev().find('.cart_thcheck').attr('subtotal');
        
            //ajax请求，改变总的订单金额,把该商品从订单下撤销删除，获取到订单下商品的数量
            $.post(
                   "/Project/thinkphp_3.2.3_full/index.php/Home/Cart/everyDeleteChangeAllMoney",
                   {
                    mark:mark,
                    cancelDelete:'cancelDelete',
                    subtotal:subtotal,
                   },
                   function (data) {

                    //获取到返回的商品的数量
                    var orderGoodsNum = data[0];

                     //获取到返回的商品的金额
                    var orderMoney = data[1];

                    $('.cart_paybar_info_cost').html(orderMoney);

                    $('.goodsNum').html(orderGoodsNum);

                   },
                   'json'

            );
        }

        //把从购物车中删除的商品返回到购物车中
        $.post(
            "/Project/thinkphp_3.2.3_full/index.php/Home/Cart/CancelDeleteThisGoods",

            {
                mark:mark,
            },

            function (data) {

            },

            'json'
        );
    });

    //上面一个全选功能的实现
    $('#s_all_h').click(function () {        

        var allCheck = $('#s_all_h').prop('checked');

        if (allCheck == true) {

            //全选之后访问ajax,将SESSION购物车里的商品加入到SESSION订单下，并返回商品的数量和总计的金额
            $.post(
                   "/Project/thinkphp_3.2.3_full/index.php/Home/Cart/allChecked",

                   function (data) {

                    //获取到返回的商品的数量
                    var orderGoodsNum = data[0];

                    //获取到返回的商品的订单的金额
                    var subtotalStorage = data[1];

                    $('.cart_paybar_info_cost').html(subtotalStorage);

                    $('.goodsNum').html(orderGoodsNum);

                   },
                   'json'
            );

            //使得所有的按钮都被选中
            $('.cart_thcheck').prop('checked',true);           

            //使得下面一个全选按钮也被选中
            $('#s_all_f').prop('checked',true);

        } else if (allCheck == false) {

            //全不选之后，ajax访问将SESSION订单里的商品返回到SESSION购物车下，并返回商品的数量和总计的金额
            $.post(
                   "/Project/thinkphp_3.2.3_full/index.php/Home/Cart/cancelAllChecked",
                   function (data) {

                    $('.cart_paybar_info_cost').html('0.00');

                    $('.goodsNum').html(0);

                   },
                   'json'
            );

            //使得所有的的input框都不选中
            $('.cart_thcheck').prop('checked',false);

            //使得下面一个多选框为不选中
            $('#s_all_f').prop('checked',false);
        }
        
    });

    //下面一个全选功能的实现
    $('#s_all_f').click(function () {        

        var allCheck = $('#s_all_f').prop('checked');

        if (allCheck == true) {

            //全选之后访问ajax,将SESSION购物车里的商品加入到SESSION订单下，并返回商品的数量和总计的金额
            $.post(
                   "/Project/thinkphp_3.2.3_full/index.php/Home/Cart/allChecked",
                   function (data) {

                    var orderGoodsNum = data[0];

                    var subtotalStorage = data[1];

                    $('.cart_paybar_info_cost').html(subtotalStorage);

                    $('.goodsNum').html(orderGoodsNum);

                   },
                   'json'
            );

            //使得所有的input框都选中
            $('.cart_thcheck').prop('checked',true);

            //使得上面一个多选框选中
            $('#s_all_h').prop('checked',true);

        } else if (allCheck == false) {

            //全不选之后，ajax访问将SESSION订单里的商品返回到SESSION购物车下，并返回商品的数量和总计的金额
            $.post(
                   "/Project/thinkphp_3.2.3_full/index.php/Home/Cart/cancelAllChecked",
                   function (data) {

                    $('.cart_paybar_info_cost').html('0.00');

                    $('.goodsNum').html(0);

                   },
                   'json'
            );

            //使得所有的input框为不选中
            $('.cart_thcheck').prop('checked',false);

            //使得上面一个全选按钮为不选中
            $('#s_all_h').prop('checked',false);
        }        
        
    });

    //点击选择加入订单提交
    $('.cart_thcheck').click(function () {

        var that = $(this);

        var goodsid = that.attr('goodsid');//正确

        var goodsName = that.attr('goodsName');//正确

        var selectSize = that.attr('selectSize');//正确

        var selectColor = that.attr('selectColor');//正确
        
        var floatgoodsPrice = that.attr('floatgoodsPrice');//正确

        var selectNum = that.attr('selectNum');//正确

        var subtotal = that.attr('subtotal');//正确

        var colorPic = that.attr('colorPic');//正确
        
        var mark = that.attr('mark');//正确        
        
        if (that.prop('checked') == true) {

            //ajax将商品的信息写入SEEEION中
            $.post(
                   "/Project/thinkphp_3.2.3_full/index.php/Home/Cart/addOrder",
                   {
                    goodsid:goodsid,
                    goodsName:goodsName,
                    selectSize:selectSize,
                    selectColor:selectColor,
                    floatgoodsPrice:floatgoodsPrice,
                    selectNum:selectNum,
                    subtotal:subtotal,
                    colorPic:colorPic,
                    mark:mark,
                   },

                   function (data){

                    //库存不足时的提示                    
                    var store = data;

                   if (store <= 0) {

                        $('#payBtn').attr('submit','no');
                   }
                    var orderGoodsNum = data[0];

                    var subtotalStorage = data[1];
                    
                    $('.cart_paybar_info_cost').html(subtotalStorage);

                    $('.goodsNum').html(orderGoodsNum);

                   },
                   'json'
                );

        } else if (that.prop('checked') == false) {

            //ajax请求,将SESSION中的改商品的去除掉
            $.post(
                   "/Project/thinkphp_3.2.3_full/index.php/Home/Cart/reduceOrder",
                   {
                    goodsid:goodsid,
                    selectNum:selectNum,
                    subtotal:subtotal,
                    mark:mark,
                   },

                   function (data){

                    console.log(data);

                    var orderGoodsNum = data[0];

                    var subtotalStorage = data[1];

                    var judgeStore = data[2];

                    //若库存不够，但是取消了选中状态，则取消不能付款的标记
                    if (judgeStore <= 0) {

                        $('#payBtn').attr('submit',' ');
                    }

                    $('.cart_paybar_info_cost').html(subtotalStorage);

                    $('.goodsNum').html(orderGoodsNum);
                    
                   },
                   'json'
                );
        }
        
    });

    //商品数量的增加
    $('.cart_num_add').click(function () {

        var that = $(this);

        var inputNum = that.next().attr('value');

        inputNum ++ ;

        that.next().attr('value',inputNum);

        that.next().next().css('cursor','pointer');

        //获取到单价
        var floatgoodsPrice = that.attr('floatgoodsPrice');

        var subtotal = inputNum * floatgoodsPrice;

        that.parent().parent().parent().next().find('.subtotal').html(subtotal);

        //把小计写入当前的input多选框，方便使用
        that.parent().parent().parent().prev().prev().prev().prev().find('.cart_thcheck').attr('subtotal',subtotal);

        var mark = that.attr('mark');
        //把选择的数量写入当前的inptu框，方便使用
        that.parent().parent().parent().prev().prev().prev().prev().find('.cart_thcheck').attr('selectNum',inputNum);

        //ajax请求，验证输入的商品的数量是否大于现有的库存,
        var goodsid = that.attr('goodsid');

        $.post(
               '/Project/thinkphp_3.2.3_full/index.php/Home/Cart/inventoryStore',

               {
                goodsid:goodsid,
                inputNum:inputNum,
                add:'add',
                },

                function (data) {

                    if (data == 0) {

                        that.next().next().next().next().attr('class','');

                       //判断该商品是否被选中，若没被选中，则去掉改不能提交的属性
                       var changeThisInput = that.parent().parent().parent().prev().prev().prev().prev().find('.cart_thcheck').prop('checked');
                       
                       if (changeThisInput == false) {

                            $('#payBtn').attr('submit',' ');

                       } else {

                            //库存不足，不能提交订单
                            $('#payBtn').attr('submit','no');
                       }
                    }
                },
                'json'
            );

        //ajax请求，更改购物车里面的商品的选择数量
        $.post(
               "/Project/thinkphp_3.2.3_full/index.php/Home/Cart/changeCartGoodsSelectNum",
               {
                mark:mark,
                inputNum:inputNum,
                },
               function (data) {
                
               },
               'json'
            );

        //若当前的商品被选中，则总的订单的金额加上当前的单价
        var thatInputProp = that.parent().parent().parent().prev().prev().prev().prev().find('.cart_thcheck').prop('checked');

        if (thatInputProp == true) {

            //ajax请求，把订单金额加上当前的商品价格
            $.post(
                   "/Project/thinkphp_3.2.3_full/index.php/Home/Cart/changeOrderMoneyByNum",
                   {
                    floatgoodsPrice:floatgoodsPrice,
                    add:'add',
                   },
                   function (data) {

                    $('.cart_paybar_info_cost').html(data);
                    console.log(data);
                   },
                   'json'
            );
        }
        
    });

    //商品数量的减少
    $('.cart_num_reduce').click(function () {

        var that = $(this);

        var inputNum = that.prev().attr('value');

        var realInputNum = that.prev().attr('value');

        inputNum --;

        that.prev().attr('value',inputNum);       

        if (inputNum <= 1) {

            that.prev().attr('value',1);

            that.css('cursor','no-drop');
        }

        var floatgoodsPrice = that.attr('floatgoodsPrice');

        var num = that.prev().attr('value');

        var subtotal = num * floatgoodsPrice;

        that.parent().parent().parent().next().find('.subtotal').html(subtotal);

        //ajax请求，把SEEEION里面的当前商品的选择数量改变
        var mark = that.attr('mark');
        console.log(realInputNum);
        $.post(
               "/Project/thinkphp_3.2.3_full/index.php/Home/Cart/changeCartGoodsSelectNum",
               {
                mark:mark,
                inputNum:num,
               },

               function (data) {
                // console.log(data);
               },
               'json'
        );

        //把小计写入当前的input多选框，方便使用
        that.parent().parent().parent().prev().prev().prev().prev().find('.cart_thcheck').attr('subtotal',subtotal);

        //若当前的商品被选中，则总的订单的金额减去当前的单价
        var thatInputProp = that.parent().parent().parent().prev().prev().prev().prev().find('.cart_thcheck').prop('checked');

        if (thatInputProp == true) {

            //ajax请求，把订单金额减去当前的商品价格,但是，不能过多的减去，该商品的选择数量为1时不能再减去啦
            $.post(
                   "/Project/thinkphp_3.2.3_full/index.php/Home/Cart/changeOrderMoneyByNum",
                   {
                    floatgoodsPrice:floatgoodsPrice,
                    inputNum:realInputNum,
                    reduce:'reduce',
                   },
                   function (data) {

                    $('.cart_paybar_info_cost').html(data);
                    
                   },
                   'json'
            );

        }

        //把选择的数量写入当前的input多选框，方便使用
        that.parent().parent().parent().prev().prev().prev().prev().find('.cart_thcheck').attr('selectNum',num);

        //ajax验证库存是否足够,若库存足够，取消库存不够的提示
        var goodsid = that.attr('goodsid');
        $.post(
               '/Project/thinkphp_3.2.3_full/index.php/Home/Cart/inventoryStore',

               {
                goodsid:goodsid,
                inputNum:num,
                reduce:'reduce',
                },

                function (data) {

                    if (data == 1) {

                        that.next().next().attr('class','success');
                        //可以去付款
                        $('#payBtn').attr('submit','');                       
                       
                    }
                },
                'json'
            );
    });

    //当选择数量为1时，鼠标样式为no-drop
    $('.cart_num_reduce').mouseover(function () {

        var that = $(this);

        var inputNum = that.prev().attr('value');

        if (inputNum == 1) {

            that.css('cursor','no-drop');
        }
    });

    //鼠标移到图片上方时，图片的大图显示
    $('.cartImgTip').mouseover(function () {

        var that = $(this);

        that.parent().next().css('display','block');
    });

    //鼠标移出图片，大图消失
    $('.cartImgTip').mouseout(function () {

        var that = $(this);

        that.parent().next().css('display','none');
    });

    //去付款判断
    $('#payBtn').click(function () {

        var that = $(this);

        if ($('.goodsNum').html() == 0) {

            alert('您有选择商品不成功');
        }

        if (that.attr('submit') == 'no') {

            alert('您有选择的商品超过了库存');
        }

        //判断是否有货物被选中
        if ( ($('.goodsNum').html() != 0) && (that.attr('submit') != 'no') ) {

            //有商品被选中，可以去付款啦,去获取到$_SESSION中的订单的商品，并且把购物车中删除掉的商品彻底清除掉
            location.href = "<?php echo U('Order/orderShow');?>";
        } 
    });

    //全选的删除
    $('#cartRemoveChecked').click(function () {

        var allCheck = $('#s_all_f').prop('checked');

        //删除之前，先判断前面的全选框是否被选中
        if (allCheck == true){

            var bool = confirm('亲，确认删除购物车中的所有商品吗？');

            if (bool == true) {

                console.log('确认删除');
                //ajax请求，删除订单下所选中的商品，和购物车里的对应的商品
                $.post(
                    "/Project/thinkphp_3.2.3_full/index.php/Home/Cart/allOrderDelete",

                    function (data) {

                        //清空购物车,并使得订单中的价格清空，订单商品数量清空
                        $('.cart_paybar_info_cost').html(data);

                        $('.goodsNum').html(0);

                        //使得购物车中的商品显示为为空
                        $('.cart_mitem').attr('class','success');

                        //取消上面和下面的全选按钮的选中状态
                        $('#s_all_h').prop('checked',false);

                        $('#s_all_f').prop('checked',false);

                        //显示购物车空空的提示
                        $('#cartEmptyPage').css('display','block');

                        console.log(data);
                    },
                    'json'
                );
                
            } else {

                console.log('取消删除');
            }
            
        }

    });

    //解决意外的刷新问题每次刷新页面
    $(document).ready(function () {

        //取消所有的商品的选中的状态
        $('.cart_thcheck').prop('checked',false);

        //取消两个全选的选中状态
        $('#s_all_h').prop('checked',false);

        $('#s_all_f').prop('checked',false);

        //ajax请求，删除订单下的所有的商品
        $.post(
               "/Project/thinkphp_3.2.3_full/index.php/Home/Cart/refreshDeleteOrderGoods",
               function (data) 
               {
                console.log(data);
               },
               'json'
        )
    });

    //判断购物车中是否有商品，若没有商品，给出提示
    $(window).load(function() {

        //判断购物车中是否有东西
        var num = $('#num').attr('goodsnum');

        if (num == 0) {

            //显示购物车为空的提示
            $('#cartEmptyPage').css('display','block');
        }
       
    });
</script>