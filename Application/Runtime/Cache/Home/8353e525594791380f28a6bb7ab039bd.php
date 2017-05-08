<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="/Project/thinkphp_3.2.3_full/Public/Detail/bottom.css">
        <link rel="stylesheet" href="/Project/thinkphp_3.2.3_full/Public/Detail/icon.css">
        <link rel="stylesheet" href="/Project/thinkphp_3.2.3_full/Public/Detail/index_002.css">
        <link rel="stylesheet" href="/Project/thinkphp_3.2.3_full/Public/Detail/index.css">
        <link rel="stylesheet" href="/Project/thinkphp_3.2.3_full/Public/Detail/cart.css">
        <link rel="icon" href="/Project/thinkphp_3.2.3_full/Public/Detail/icon.jpg">
        <meta http-equiv="Cache-Control" content="no-transform ">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>
        </title>
    </head>
    
    <body class="media_screen_1200">
        <div class="mgj_rightbar J_sidebar" data-ptp="_sidebar" style="right: 0px;">
            <div class="sidebar-item mgj-my-cart" style="left: 0px;">
                <a target="_blank" href="<?php echo U('Cart/cartShow');?>" rel="nofollow">
                    <i class="s-icon">
                    </i>
                    <div class="s-txt">
                        购物车
                    </div>
                    <div class="num">
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
                    <div class="num">
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
                <div class="sidebar-item mgj-back2top show" style="left: 0px;">
                    <a href="#onetop">
                        <i class="s-icon">
                        </i>
                    </a>
                </div>
            </div>
        </div>
       <!-- 锚点跳转 -->
        <a name="onetop"></a>
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
        <!-- 店铺公共头部-店铺信息 end -->
        <input id="shopId" value="17dby" type="hidden">
        <input id="shopBaseUrl" value="http://shop.mogujie.com/" type="hidden">
        <input id="shopBaseUrlSec" value="http://shop.mogujie.com/17dby" type="hidden">
        <!-- topBanner -->
        <div class="ovbox mod_topBanner">
            <div class="mod_list clearfix">
                <div class="mod_item w1200" data-id="411449" data-width="1200" data-type="topBanner"
                data-title="$commonTopBanner.layoutname">
                    <div class="mod_cont topbanner">
                    </div>
                </div>
            </div>
        </div>
        <!-- topNavgation -->
        <div class="ovbox mod_topNav blackStyle">
            <div class="mod_list clearfix">
                <div class="mod_item w1200" data-id="411450" data-width="1200" data-type="topNav"
                data-title="$commonTopNav.layoutName">
                    <div class="mod_cont topNav">
                        <div class="category_list slideer " style="display: none;">
                            <dl>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="body_wrap">
            <div class="shop-detail">
                <div class="detail-primary clearfix">
                    <div class="primary-goods">
                        <div class="clearfix">
                            <div class="fl goods-info goods-info-normal" id="J_GoodsInfo">
                                <div class="info-box">
                                    <h1 class="goods-title">
                                    <?php if(is_array($goods)): foreach($goods as $key=>$v): ?><span id="goodsinfo" itemprop="name" goodsnum="<?php echo ($v["id"]); ?>"><?php echo ($v["gname"]); ?></span><?php endforeach; endif; ?>
                                    </h1>
                                    <div class="goods-prowrap goods-main">
                                        <div class="clearfix main-box">
                                            <dl class="clearfix property-box">
                                                <dt class="property-type property-type-now">
                                                    价格：
                                                </dt>
                                                <dd class="property-cont property-cont-now fl">
                                                <?php if(is_array($goods)): foreach($goods as $key=>$v): ?><span id="J_NowPrice" class="price"><?php echo ($v["price"]); ?></span>&nbsp;&nbsp;<span style="font-size:18px;color:red; ">&yen;</span><?php endforeach; endif; ?>
                                                </dd>
                                                <dd class="property-extra fr">
                                                    
                                                    <span>
                                                        累计销量：
                                                        <span class="num J_SaleNum">
                                                            <?php if(is_array($goods)): foreach($goods as $key=>$v): echo ($v["buy"]); endforeach; endif; ?>
                                                        </span>
                                                    </span>
                                                </dd>
                                            </dl>
                                            <div id="J_ModulePromotions">
                                                <div class="clearfix promotions-box slide-up">
                                                    
                                                    <div class="clearfix content">
                                                        <div class="promotions-list">
                                                            <div class="promotions-needget">
                                                                
                                                                
                                                                
                                                            </div>
                                                            <div class="promotions-normal">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="promotions-occupying">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="goods-prowrap goods-im">
                                    </div>
                                    <div class="goods-prowrap goods-sku" id="J_GoodsSku">
                                        <div class="content">
                                            <div class="pannel-title">
                                                <span class="choose-goods-info">
                                                    选择商品信息
                                                </span>
                                                <b class="J_PannelClose pannel-close">
                                                </b>
                                            </div>
                                            <div class="box">
                                                <dl class="style clearfix" style="display: block;">
                                                    <dt>
                                                        颜色：
                                                    </dt>
                                                    <dd>
                                                        <ol id="colorSelect" class="J_StyleList style-list clearfix">
                                                            <?php if(is_array($colorandpic)): foreach($colorandpic as $k=>$v): ?><li class="img" data-id="1" data-src="" title="<?php echo ($colorandpic[$k][0]); ?>">
                                                                    <img src="/Project/thinkphp_3.2.3_full/Public/<?php echo ($colorandpic[$k][1]); ?>" title="<?php echo ($colorandpic[$k][0]); ?>" style="position:relative" >
                                                                    <span style="position:absolute;top:25px;left:35px;color:pink;display:none;" class="selectImg">✔</span>
                                                                    <b>
                                                                    </b>
                                                                </li><?php endforeach; endif; ?>
                                                        </ol>
                                                        <span class="colorTip" style="display:none;color:#ff0078;">请选择颜色!</span>
                                                    </dd>
                                                </dl>

                                                <dl class="size clearfix" style="display: block;">
                                                    <dt>
                                                        尺码：
                                                    </dt>
                                                    <dd>
                                                        <ol class="J_SizeList size-list clearfix">
         <?php if(is_array($size)): foreach($size as $key=>$v): ?><li class="SIZE" data-id="100" title="<?php echo ($v); ?>">
                                                                <?php echo ($v); ?>
                                                            </li><?php endforeach; endif; ?>                                              </ol>
                                                    </dd><span class="sizeTip" style="margin-left:60px;display:none;color:#ff0078;">请选择尺码!</span>
                                                </dl>
                                                <dl class="clearfix">
                                                    <dt>
                                                        数量：
                                                    </dt>
                                                    <dd class="num clearfix">
                                                        <div id="J_GoodsNum" class="goods-num fl" data-stock="10526">
                                                            <span class="num-reduce" disabled="123">
                                                            </span>
                                                            <input class="num-input" value="1" type="text">
                                                            <span class="num-add ">
                                                            </span>
                                                        </div>
                                                        <div class="J_GoodsStock goods-stock fl">
    <!-- <?php if(is_array($goods)): foreach($goods as $key=>$v): ?>库存<?php echo ($v["store"]); ?>件<?php endforeach; endif; ?> -->                                                 </div>
                                                        <div class="J_GoodsStockTip fl" id="buynumtip" style="display:none;">
                                                            您所填写的商品数量超过库存！
                                                        </div>
                                                    </dd>
                                                </dl>
                                            </div>
                                            <div class="pannel-action">
                                                <a href="javascript:;" class="J_PannelOK pannel-ok">
                                                    确认
                                                </a>
                                            </div>
                                        </div>
                                        <div class="goods-buy clearfix">
                                            <a href="javascript:;" id="J_BuyNow" class="fl mr10 buy-btn buy-now">
                                                立刻购买
                                            </a>
                                            <input value="nodapei" id="dapeiShow" type="hidden">
                                            <a href="javascript:;" id="J_BuyCart" class="fl mr10 buy-cart buy-btn">
                                                加入购物车
                                            </a>

                                            <img class="refresh-loading" src="">
                                        </div>
                                    </div>
                                    <!-- 加入购物车成功的提示 -->
                                    <div class="CartBox" style="display:none;height:450px">
                                    <span class="cancel">×</span>
                                        <span class="success">已成功将商品加入到购物车</span>
                                        <a href="<?php echo U('Cart/CartShow');?>"><span class="account">去购物车结算</span></a>
                                        <div>
                                            <img src=" " width="200" height="200" class="CartImg">
                                        </div>
                                        <span id="aa"></span>
                                        <div class="cprice"></div>
                                    </div>
                                    <div class="goods-social clearfix">
                                        <div class=" " goodsid="0" tradeitemid="18y4dmm" tid="0">
                                        </div>
                                        <div class="report">
                                            <a target="_blank" href="" class="goods_report fl" rel="nofollow">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="goods-extra clearfix">
                                        
                                        <div class="extra-pay">
                                            <div class="fl clearfix label">
                                                支付方式：
                                            </div>
                                            <div class="fl list list-nomaibei">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="fl goods-topimg" id="J_GoodsImg">
                                <div class="big-img">
                                    <button class="middle">
                                   
                                        <img id="J_BigImg" src="/Project/thinkphp_3.2.3_full/Public/<?php echo ($pic[0]); ?>" alt="" width="400" height="600">    
                                    </button>
                                </div>
                                <div id="J_SmallImgs" class="small-img">
                                    <div class="box">
                                        <div class="list">
                                            <ul class="clearfix" style="text-align: center;">
                                            <?php if(is_array($colorandpic)): foreach($colorandpic as $k=>$v): ?><li>
                                                    <img src="/Project/thinkphp_3.2.3_full/Public/<?php echo ($colorandpic[$k][1]); ?>" title="<?php echo ($colorandpic[$k][0]); ?>" height="80"  style="opacity:0.6;">
                                                    <i>
                                                    </i>
                                                </li><?php endforeach; endif; ?>                                                
                                            </ul>
                                        </div>
                                    </div>
                                    <a class="left-btn arrow-btn" href="javascript:;">
                                    </a>
                                    <a class="right-btn arrow-btn" href="javascript:;">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="primary-slide">
                        <div class="goods-recommend" id="J_ModuleLook" data-ptp="_rechot">
                            <!-- 热卖推荐 -->
                            <p class="title">
                                <s>
                                </s>
                                <span>
                                    热卖推荐
                                </span>
                            </p>
                            <div class="list">
                                <div class="box">
                                    <ul>
                                        <?php if(is_array($hotSaleGoods)): foreach($hotSaleGoods as $key=>$v): ?><li>
                                            <a href="/Project/thinkphp_3.2.3_full/index.php/Home/Detail/detailShow/id/<?php echo ($v["id"]); ?>" target="_blank">
                                                <img src="/Project/thinkphp_3.2.3_full/Public/<?php echo ($v["picurl"]); ?>" data-iids="1k0p2yu" data-indexs="0" data-acms=""
                                                class="" width="118" height="180">
                                            </a>
                                            <span>
                                                ￥<?php echo ($v["price"]); ?>
                                            </span>
                                        </li><?php endforeach; endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>               
                <div class="detail-content ">
                    <!-- 主体 -->
                    <div class="col-main">
                        <!-- 模块标签页 -->
                        <div class="module-tabpanel" id="J_ModuleTabpanel">
                            <!-- 选项栏 -->
                            <div class="tabbar-box">
                                <ul class="tabbar-list clearfix">
                                    <li data-panels="graphic,recommend" data-hasnav="true" class="tab-graphic selected">
                                        <a href="javascript:;">
                                            商品详情
                                        </a>
                                    </li>
                                    
                                    <!-- 购物车模块 -->

                                </ul>
                            </div>
                            <!-- 选项页 -->
                            <div class="panel-box">
                                <!-- 图文详情 -->
                                <div class="module-panel module-graphic" id="J_ModuleGraphic">
                                    <!-- 图文详情 -->
                                    <!-- 注：PHP模板走的是本地模板文件：views/modules/module-graphic.php-->
                                    <!-- 商品描述 -->
                                    <!-- 添加锚点 -->
                                    <a name="describe"></a>
                                    <div id="J_Graphic_desc">
                                        <div class="panel-title">
                                            <h1>
                                                商品描述
                                            </h1>
                                        </div>
                                        <!-- 描述 -->
                                        <div class="graphic-text">
                                        <?php if(is_array($goods)): foreach($goods as $key=>$v): echo ($v["describe"]); endforeach; endif; ?>
                                        </div>
                                    </div>
                                    <!-- 产品参数 -->
                                    <!-- 添加锚点 -->
                                    <a name="parameter"></a>
                                    <div id="J_Graphic_产品参数">
                                        <div class="panel-title">
                                            <h1>
                                                产品参数
                                            </h1>
                                        </div>
                                        <!-- 产品参数 -->
                                        <div class="graphic-block">
                                            <!-- 描述 -->
                                            <!-- 表格 -->
                                            <table class="parameter-table" id="J_ParameterTable">
                                                <tbody>
                                                <?php if(is_array($proprety)): foreach($proprety as $key=>$v): ?><tr class="">
                                                        <td>
                                                            <?php echo ($v["propretyname"]); ?>
                                                        </td>
                                                        <td>
                                                            <?php echo ($v["proval"]); ?>
                                                        </td>
                                                        
                                                    </tr><?php endforeach; endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- 模块级别 -->
                                    <!-- 添加锚点 -->
                                    <a name="show"></a>
                                    <div class="graphic-block">
                                        <!-- 图片列表 -->
                                        <div id="J_Graphic_穿着效果">
                                            <div class="panel-title">
                                                <h1>
                                                    商品展示
                                                </h1>
                                            </div>
                                            <!-- 描述 -->
                                            <?php if(is_array($pic)): foreach($pic as $key=>$v): ?><div class="graphic-pic">
                                                <div class="" style="padding-bottom:20px;">
                                                    <img class="" style="left: -350px; display: block;" data-original=""
                                                    src="/Project/thinkphp_3.2.3_full/Public/<?php echo ($v); ?>" width="700" height="800">

                                                </div>

                                            </div><?php endforeach; endif; ?>
                                        </div>
                                    </div>
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 侧边栏 -->
                    <div class="col-sidebar">
                        <!-- 看了又看模块 -->
                        <div class="module-repeat" id="J_ModuleRepeat">
                            <!-- 看了又看信息 -->
                            <div class="ui-box repeat-info">
                                <h3 class="ui-hd">
                                    相似商品
                                </h3>

                                <?php if(is_array($sameCategoryGoods)): foreach($sameCategoryGoods as $key=>$v): ?><div class="ui-bd">
                                    <!-- 列表 -->
                                    <ul class="repeat-list">
                                        <li data-id="17s3a0w">
                                            <a class="pic" href="/Project/thinkphp_3.2.3_full/index.php/Home/Detail/detailShow/id/<?php echo ($v["id"]); ?>" target="_blank">
                                                <img class="lazy loggered" src="/Project/thinkphp_3.2.3_full/Public/<?php echo ($v["picurl"]); ?>" data-original="" data-iids="17s3a0w"
                                                data-indexs="0" data-acms="" style="display: block;" height="240">
                                            </a>
                                            <a class="title" href="/Project/thinkphp_3.2.3_full/index.php/Home/Detail/detailShow/id/<?php echo ($v["id"]); ?>" target="_blank">
                                                <?php echo ($v["gname"]); ?>
                                            </a>
                                            <div class="info">
                                                <div class="price">
                                                    <em class="price-u">
                                                        ¥
                                                    </em>
                                                    <span class="price-n">
                                                        <?php echo ($v["price"]); ?>
                                                    </span>
                                                </div>
                                                <div class="fav">
                                                    <em class="fav-i">
                                                    </em>
                                                    <span class="fav-n">
                                                        30081
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div><?php endforeach; endif; ?>
                            </div>
                        </div>
                    </div>
                    <!-- 扩展栏 -->
                    <div class="col-extra">
                        <div class="qrcode">
                        </div>
                        <!-- 右侧子导航模块 -->
                        <div class="module-extranav" id="J_ModuleExtranav">
                            <!-- 主体 -->
                            <div class="extranav-bd">
                                <!-- 模块-扩展导航栏 -->
                                <!-- 注：PHP模板走的是本地模板文件：views/modules/module-extranav.php-->
                                <!-- 子导航列表 -->
                                <ul class="extranav-list">
                                    <!-- 商品描述 -->
                                    <li data-module="J_Graphic_desc" class="">
                                        <a href="#describe">
                                            商品描述
                                        </a>
                                    </li>
                                    <!-- 产品参数 -->
                                    <li data-module="J_Graphic_产品参数" class="">
                                        <a href="#parameter">
                                            产品参数
                                        </a>
                                    </li>
                                    <!-- 模块列表 -->
                                    <li data-module="J_Graphic_商品展示" class="">
                                        <a href="#show">
                                            商品展示
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    
</html><?php echo ($colorandpic); ?>
<script type="text/javascript" src="/Project/thinkphp_3.2.3_full/Public/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
    //商品颜色图片的选择
    $('#colorSelect img').click(function (){
        
        var that = $(this);

        $('#colorSelect img').attr('select','');

        that.attr('select',that.attr('title'));

        $('#colorSelect img').attr('colorPic','');

        that.attr('colorPic',that.attr('src'));        

        $('#colorSelect img').css('border','');

        that.css('border','1px solid red');        

        $('.selectImg').css('display','none');

        that.next().css('display','block');
        
        var newUrl = that.attr('src');

        newBigImgUrl = $('#J_BigImg').attr('src',newUrl);

        $('.colorTip').css('display','none');
        
    });

    //商品尺码的选择
    $('.J_SizeList li').click(function () {

        var that = $(this);

        $('.J_SizeList li').attr('select','');

        that.attr('select',that.attr('title'));

        $('.J_SizeList li').css('border','');

        $(this).css('border','1px solid red');

        $('.sizeTip').css('display','none');

    });

    var inputNum = $('.num-input').val(); 

    //选择商品数量的增加
    $('.num-add').click(function (){
        
        inputNum ++ ;

        $('.num-input').attr('value',inputNum);

        var goodsnum = $('.num-input').val();

        var goodsid = $('#goodsinfo').attr('goodsnum');

        //ajax请求，验证是否所选择的商品的数量大于商品的库存
        $.post(
               '/Project/thinkphp_3.2.3_full/index.php/Home/Detail/inventory',
               {
                buynum:goodsnum,
                goodsid:goodsid,
               },
               function(data){

                    if (data == 'toomuch') {
                        
                        $('#buynumtip').css('display','block');

                        $('#J_BuyCart').css('display','none');

                        $('#J_BuyNow').css('display','none');
                    }            
               },
               'json');
        
    });

    //商品选择数量的减去
    $('.num-reduce').click(function (){

        //当所选择的商品的数量小于等于1时
        if ($('.num-input').val() <= 1) {

            //由于存在点击事件，重新把商品的选择数量定义为2
            inputNum = 2;
        }

        inputNum -- ;

        $('.num-input').attr('value',inputNum);    

        var goodsnum = $('.num-input').val();

        var goodsid = $('#goodsinfo').attr('goodsnum');

        //ajax请求，验证所选择的商品的数量是否小于改商品的库存
        $.post(
               '/Project/thinkphp_3.2.3_full/index.php/Home/Detail/inventory',
               {
                buynum:goodsnum,
                goodsid:goodsid,
               },
               function(data){

                    if (data == null) {
                        
                        $('#buynumtip').css('display','none');

                        $('#J_BuyCart').css('display','block');

                        $('#J_BuyNow').css('display','block');
                    }              
               },
               'json');   
        
    });

    //商品下面的小图绑定mouseover事件，改变大图的图片的地址
    $('#J_SmallImgs img').mouseover(function (){

        that = $(this);

        var newUrl = that.attr('src');

        newBigImgUrl = $('#J_BigImg').attr('src',newUrl);

        $('#J_SmallImgs img').css('opacity',0.7);

        that.css('opacity',1);
    });    

    //点击加入购物车
    $('#J_BuyCart').click(function (){     

        var selectColor = $('#colorSelect img[select!=""]').attr('select');

        var colorPic = $('#colorSelect img[colorPic!=""]').attr('colorPic');

        var selectSize = $('.J_SizeList li[select!=""]').attr('select');;

        var selectNum = $('.num-input').attr('value');

        var goodsid = $('#goodsinfo').attr('goodsnum');
        
        var goodsName = $('#goodsinfo').html();

        var goodsPrice = $('#J_NowPrice').html();

        var floatgoodsPrice = goodsPrice;
        
        //判断所选择的商品的颜色是否为空
        if (selectColor == null) {

            $('.colorTip').css('display','block'); 

            return false;

        } 

        //判断所选择的商品的尺码是否为空
        if (selectSize == null) {

            $('.sizeTip').css('display','block');
            
            return false;
        }

        // ajax验证用户是否登录
        $.post(
               "<?php echo U('Cart/buyCartConfirmLogin');?>",
               {
                floatgoodsPrice:floatgoodsPrice,
                selectColor:selectColor,
                colorPic:colorPic,
                selectSize:selectSize,
                selectNum:selectNum,
                goodsid:goodsid,
                goodsName:goodsName,
                
               },
               
               function(data){

                     if (data == 0) {
                        //用户还没有登录的情况
                        location.href = "<?php echo U('User/login');?>";

                     } else {

                        $('.CartBox').css('display','block');

                        $('.CartImg').attr('src',colorPic);

                        $('#aa').html(goodsName);
                        
                        $('.cprice').html(goodsPrice);

                        console.log(data);
                        
                     }           
               },
               'json');
    });

    //取消去购物车结算的按钮
    $('.cancel').click(function (){

        $('.CartBox').css('display','none');
    });

    //立即购买
    $('#J_BuyNow').click(function () {

        var selectColor = $('#colorSelect img[select!=""]').attr('select');

        var colorPic = $('#colorSelect img[colorPic!=""]').attr('colorPic');

        var selectSize = $('.J_SizeList li[select!=""]').attr('select');;

        var selectNum = $('.num-input').attr('value');

        var goodsid = $('#goodsinfo').attr('goodsnum');
        
        var goodsName = $('#goodsinfo').html();

        var goodsPrice = $('#J_NowPrice').html();

        var floatgoodsPrice = goodsPrice.substring(1);
        
        var subtotal = selectNum * goodsPrice;

        //判断所选择的商品的颜色是否为空
        if (selectColor == null) {

            $('.colorTip').css('display','block'); 

            return false;

        } 

        //判断所选择的商品的尺码是否为空
        if (selectSize == null) {

            $('.sizeTip').css('display','block');
            
            return false;
        }

        // ajax验证用户是否登录
        $.post(
               "<?php echo U('Cart/buyNowConfirmLogin');?>",
               
               function(data){

                     if (data == 0) {

                        location.href = "<?php echo U('User/login');?>";

                     } else {
                        // 在这里判断是否把数据存如表单中，生成成功了就可以直接跳到表单页面
                        $.ajax( { 
                                type:'get', 
                                data:"selectColor="+selectColor+'&colorPic='+colorPic+'&selectSize='+selectSize+'&selectNum='+selectNum+'&goodsid='+goodsid+'&goodsName='+goodsName+'&floatgoodsPrice='+goodsPrice+'&subtotal='+subtotal, 
                                url:"<?php echo U('Order/showPage');?>",
                                success:function (data){
                                if(data==1){
                                     location.href="<?php echo U('Order/orderShow');?>";
                                }
                        },
                         } )
                     }           
               },
               'json');
    });

    //判断商品的颜色和尺码的数量
    $(document).ready(function () {

        //获取到大图的图片地址
        var newPiC = $('#J_BigImg').attr('src');

        //判断商品的颜色是否为空
        var goodsTitle = $('#colorSelect img').attr('title');

        var color = 0;//定义一个变量，用于统计商品颜色的个数

        $('#colorSelect img').each(function(){
            
            color++;
        });

        if (color == 1) 

        //获取到大图的图片地址
        var newPiC = $('#J_BigImg').attr('src');

        if (!goodsTitle) {
            //商品的颜色为空的情况            
            
            //使得颜色的图片为大图的图片
            $('#colorSelect img').attr('src',newPiC);

            //使得颜色的标题为黑色
             $('#colorSelect img').attr('title','随机');

             //设置为默认选中的状态
            $('#colorSelect img').css('border','3px solid red');

            //设置其select属性
            $('#colorSelect img').attr('select','随机');

            //设置其colorPic属性
            $('#colorSelect img').attr('colorPic',newPiC);
        }

        //判断商品的尺码是否为空
        var goodsSize =  $('.J_SizeList li').attr('title');

        if (!goodsSize) {

            //赋值商品的尺码为均码
            $('.J_SizeList li').html('均码');

            //赋值商品的标题为均码
            $('.J_SizeList li').attr('title','均码');

            //赋值该商品的select属性为均码
            $('.J_SizeList li').attr('select','均码');

            //设置该尺码为默认选中的状态
            $('.J_SizeList li').css('border','3px solid red');
        }

        //定义一个变量，统计尺码的个数
        var size = 0;

        $('.J_SizeList li').each(function () {

            size ++;
        });

        if (size == 1)         

        //判断小图是否为空
        var sPic = 0;

        $('#J_SmallImgs img').each(function () {

            sPic ++;

        });

        if (sPic <= 1) {

            $('#J_SmallImgs img').attr('src',newPiC);
        }

        //为加入购物车成功后，加上提示的商品的图片
        $('.CartImg').attr('src',newPiC);
        
    });

    //加载图片失败，设置默认的图片
     $(window).load(function() {
      $('img').each(function() {
        if (!this.complete || typeof this.naturalWidth == "undefined" || this.naturalWidth == 0) {
          this.src = 'http:/www/Project/thinkphp_3.2.3_full/Public/Uploads/Error/error.jpg';
          }
       });
    });
    
</script>