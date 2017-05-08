<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <title>确认订单</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="/Project/thinkphp_3.2.3_full/Public/order/index.css-709a8a6f.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="/Project/thinkphp_3.2.3_full/Public/order/bottom.css" media="all">
        <link href="/Project/thinkphp_3.2.3_full/Public/order/index.css-e45ee123.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="/Project/thinkphp_3.2.3_full/Public/js/jquery-1.8.3.min.js"></script>
    </head>
    
    <body class="media_screen_1200">
        <div class="mgj_rightbar J_sidebar" data-ptp="_sidebar" style="right: 0px;">
            <!--空的右侧边栏-->
            <div id="mgj_rightbar_top_blank" class="mgj_rightbar_960"></div>
            <!--方便定margin的空dediv-->
            <div id="mgj_rightbar_blank_div"></div>
            <!--用户头像-->
            <div class="sidebar-item mgj-my-avatar">
                <a target="_blank" href="http://www.mogujie.com/member" rel="nofollow">
                    <div class="img">
                        <img width="20" height="20" src="/Project/thinkphp_3.2.3_full/Public/order/05.jpg_48x48.jpg" alt=""></div>
                </a>
            </div>
            <!--购物车-->
            <div class="sidebar-item mgj-my-cart" style="left: 0px;">
                <a target="_blank" href="<?php echo U('Cart/cartShow');?>" rel="nofollow">
                    <i class="s-icon"></i>
                    <div class="s-txt">购物车</div>
                    <div class="num" style="display: block;">4</div></a>
            </div>
            <!--优惠券-->
            <div class="sidebar-item mgj-my-coupon">
                <a target="_blank" rel="nofollow" href="">
                    <i class="s-icon"></i>
                    <div class="s-txt">优惠券</div>
                    <div class="num" style="display: none;"></div>
                </a>
            </div>
            <!--钱包-->
            <div class="sidebar-item mgj-my-wallet">
                <a target="_blank" rel="nofollow" href="">
                    <i class="s-icon"></i>
                    <div class="s-txt">钱包</div></a>
            </div>
            <!--足迹-->
            <div class="sidebar-item mgj-my-browserlog">
                <a target="_blank" rel="nofollow" href="">
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
                <span class="cart-info">购物车</span></a>
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
          </ul>
        </div>
      </div>
        <style>.innerwrap{ margin-right: -30px; } .media_screen_960 { min-width: 960px; } .promotionTopNavContainer { height: 50px; overflow: hidden; display: none;} .promotionTopNavContainer a { display: block; width: 86px; height: 50px; overflow: hidden;} .promotionTopNavContainer a.first { width: 168px; } /** screnn-960 **/ .media_screen_960 .promotionTopNavContainer .first{ width: 153px!important; } .media_screen_960 .promotionTopNavContainer a { width: 66px; } .media_screen_960 .promotionTopNavContainer a.last {width: 80px;} .wrap { position: relative;}


            .cart_address_list .cart_address_card {
             
                background: url("/Project/thinkphp_3.2.3_full/Public/order/sel.png") -240px 0 no-repeat;
            }
            .addressbg{
                display: block;
                position: relative;
                padding: 10px 20px 15px;
                width: 200px;
                height: 135px;
                cursor: pointer;


            }
            .addressbg:hover{
                 background: url("/Project/thinkphp_3.2.3_full/Public/order/sel.png") -240px 0 no-repeat;
            }
           .cart_address_sel {
    
                background: url("/Project/thinkphp_3.2.3_full/Public/order/sel.png") 0px 0 no-repeat;
            }
        </style>
        <div class="promotionTopNavContainer"></div>
        <!-- 中间区域 -->
        <div id="body_wrap">
            <div id="process_bar">
                <div class="g-header clearfix">
                    <div class="g-header-in wrap clearfix">
                        <div class="process-bar">
                            <div class="md_process md_process_len4">
                                <div class="md_process_wrap md_process_step2_5">
                                    <div class="md_process_sd"></div>
                                    <i class="md_process_i md_process_i1">1
                                        <span class="md_process_tip">购物车</span></i>
                                    <i class="md_process_i md_process_i2">2
                                        <span class="md_process_tip">确认订单</span></i>
                                    <i class="md_process_i md_process_i3">3
                                        <span class="md_process_tip">支付</span></i>
                                    <i class="md_process_i md_process_i4">
                                        <img src="/Project/thinkphp_3.2.3_full/Public/order/right.png" width="23" height="23" alt="">
                                        <span class="md_process_tip">完成</span></i>
                                </div>
                            </div>
                        </div>
                        <a title="蘑菇街|我的买手街" href="http://www.mogujie.com/" target="_blank">
                            <div class="logo logo-generate"></div>
                        </a>
                    </div>
                </div>
            </div>
            <div id="pay_info">
                <div class="g-wrap wrap">
                    <div class="cart_wrap">
                        <!-- 页面内容 -->
                        <div class="cart_page_wrap pt0">
                            <h2 class="cart_stit">选择收货地址</h2>
                            <div class="cart_address_wrap" id="cartAddress">
                                <!-- 选择收获地址list -->
                                <ul class="cart_address_list clearfix" style="height:160px" id="cartAddressList">
                                    <?php if(is_array($allAddress)): foreach($allAddress as $key=>$vo): ?><li  >
                                        <a onclick="return  sel(this)" href="javascript:;"
                                        <?php if($vo["status"] == 1 ): ?>class="cart_address_sel  addressbg" 
                                        <?php else: ?>
                                            class ="cart_address_card  addressbg"<?php endif; ?>
                                         >
                                            <?php if($vo["status"] == 1 ): ?><i class="cart_address_default">默认地址
                                                </i>
                                            <?php else: endif; ?>
                                            <input type="hidden"name="aid" value="<?php echo ($vo["id"]); ?>">
                                            <h5 class="cart_address_tit"><?php echo ($vo["name"]); ?></h5>
                                            <p class="cart_address_street"><?php echo ($vo["det_detail"]); ?></p>
                                            <p class="cart_address_zipinfo" data-postcode="123123" data-province="湖南省" data-city="张家界市" data-area="慈利县"><?php echo ($vo["address"]); ?> <?php echo ($vo["code"]); ?></p>
                                            <p class="cart_address_mobile"><?php echo ($vo["tel"]); ?></p>

                                            <i class="cart_address_edit" style="display: none;">编辑</i>
                                        </a>
                                    </li><?php endforeach; endif; ?>
                                </ul>
                                <!-- 管理收获地址 -->
                                <ul class="cart_address_ctrl clearfix" id="addressCtrl">
                                    <li>
                                        <a href="javascript:;" class="cart_icon_link allAddressSwitch" style="display:none">显示全部地址
                                            <i class="cart_icon_quarw">down</i></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo U('Personal/showAddress');?>" target="_blank">管理收货地址</a></li>
                                    <li>
                                        <a href="javascript:;"  onclick="return  showaddAddress()"  class="addOtherAddress">使用新地址</a></li>
                                </ul>
                                <div id="J_otherAddrWrap">
                                    <dl id="showAddress" style="display:none;" class="address_pop">
                                        <form id="search_form" action="<?php echo U('addAddress');?>" method="post">
                                        <input type="hidden" class="J_isdefault" name="uid" value="<?php echo ($_SESSION['home']['id']); ?>" >
                                        <dt>省：</dt>
                                        <dd class="pt_ie6hack">
                                            <i class="needicon">*</i>
                                            <select name="province" id="home_address-sprovince" class="J_province J_select w140 vm">
                                                <option value="0">请选择</option>
                                            </select>
                                            <label class="dt" for="">市：</label>
                                            <select name="city" id="home_address-scity" class="J_city J_select w100 vm">
                                                <option value="0">请选择</option>
                                                </select>
                                            <label class="dt" for="">区：</label>
                                            <select name="area" id="home_address-sarea" class="J_area J_select w100 vm">
                                                <option value="0">请选择</option>
                                                </select>
                                            <span class="prompt city_select"></span>
                                        </dd>
                                        <dt>邮政编码：</dt>
                                        <dd>
                                            <i class="needicon">*</i>
                                            <input style="height:20px;" type="text"data-type="c" data-errormsg="请填写正确的邮政编码" data-normal="" class="text formsize_normal J_postcode J_form vm" name="postcode" >
                                            <span id="code_tip" class="prompt mail_select"></span>
                                        </dd>
                                        <dt>街道地址：</dt>
                                        <dd>
                                            <i class="needicon">*</i>
                                            <textarea data-type="*" data-min="5" data-max="100" data-normal="请填写街道地址，最少5个字，最多不能超过100个字" data-errormsg="请填写街道地址，最少5个字，最多不能超过100个字" id="detailAddress" class="textarea formsize_large J_street J_form" name="street" cols="30" rows="3"></textarea>
                                            <span class="prompt breakline">请填写街道地址，最少5个字，最多不能超过100个字</span></dd>
                                        <dt>收货人姓名：</dt>
                                        <dd>
                                            <i class="needicon">*</i>
                                            <input  style="height:20px;" type="text" data-type="*" data-errormsg="请填写收货人" data-normal="" class="text formsize_normal J_name J_form vm" name="name" >
                                            <span id="name_tip" class="prompt name_select"></span>
                                        </dd>
                                        <dt>手机：</dt>
                                        <dd>
                                            <i class="needicon">*</i>
                                            <input  style="height:20px;" type="text" data-type="phone" data-errormsg="请填写正确的联系号码" data-normal="" class="text formsize_normal J_mobile J_form vm" name="mobile" >
                                            <span  id="mobile_tip" class="prompt mobile_select"></span>
                                        </dd>
                                        <dt></dt>
                                        </form>
                                        <dd class="pt10 oper_btn">
                                            <a href="javascript:;"id="confirmAdd" class="confirm_btn J_okbtn mr10">确认地址</a>
                                            <a href="javascript:;"onclick="return displayAddress()" class="cancel_btn J_cancelbtn">取消</a></dd>
                                    </dl>
                                </div>
                            </div>
                            <h2 class="cart_stit pt10">确认商品信息</h2>
                            <!-- 身份认证 -->
                            <!-- 身份认证end -->
                            <form action="<?php echo U('payMoney');?>" id="orderForm" method="POST">
                                <!-- orderForm -->
                                <!-- 表格 -->
                                <table class="cart_table" id="orderTable">
                                    <tr>
                                        <th class="cart_table_goods_wrap">商品</th>
                                        <th class="cart_table_goodsinfo_wrap">商品信息</th>
                                        <th width="80">单价(元)</th>
                                        <th width="80">数量</th>
                                        <th class="cart_table_goodsctrl_wrap">小计(元)</th>
                                    </tr>
                                        <!--商品 遍历-->
                                    <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr class="tr_checked item4shop1o9whq">
                                            <td class="cart_table_goods_wrap">
                                                <!-- 商品 -->
                                                <a  href="<?php echo U('Detail/detailShow');?>/id/<?php echo ($v["goodsid"]); ?>">
                                                    <img class="cartImgTip" src="<?php echo ($v["colorPic"]); ?>" width="78" height="78" alt=""></a>
                                                <a href="<?php echo U('Detail/detailShow');?>/id/<?php echo ($v["goodsid"]); ?>" target="_blank" class="cart_goods_t cart_hoverline" title="<?php echo ($v["goodsName"]); ?>"><?php echo ($v["goodsName"]); ?></a></td>
                                            <td>
                                                <p class="cart_lh20">颜色：<?php echo ($v["selectColor"]); ?></p>
                                                <p class="cart_lh20">尺码：<?php echo ($v["selectSize"]); ?></p></td>
                                            <td class="cart_alcenter">
                                                <!-- 单价 -->
                                                <p class="cart_bold cart_itemUnit"><?php echo ($v["floatgoodsPrice"]); ?></p></td>
                                            <td class="cart_alcenter">
                                                <!-- 数量 -->
                                                <p class="cart_itemNum"><?php echo ($v["selectNum"]); ?></p>
                                            </td>
                                            
                                            <td class="cart_alcenter">
                                                <!-- 小计 -->
                                                <p class="cart_font16 item_sum itemSum" data-price="88.99"><?php echo ($v["subtotal"]); ?></p></td>
                                        </tr>
                                        <!--备注：-->
                                        <tr class="tr_checked">
                                            <td colspan="3" class="pl10 cart_largepding">
                                                <label for="">备注：</label>
                                                <input type="text" class="" name="comment[]"  placeholder="补充填写其他信息，如有快递不到也请留言备注" style="color: rgb(204, 204, 204);width:500px;"></td>
                                            <td colspan="3" class="pr15 cart_largepding">
                                                <!-- 店铺优惠 -->
                                                <div class="cart_table_discount shopPromo pt5 pr10 clearfix" data-shopindex="0" data-groupid="13h2ntk"></div>
                                                <!-- 店铺优惠end -->
                                                <div class="cart_table_discount shopLogi pt5 pr10 clearfix" data-groupid="13h2ntk">
                                                    <label>快递公司：</label>
                                                    <select class="postage cart_vm" data-shopindex="0" data-groupid="13h2ntk">
                                                        <option value="nationalfreepostage" selected="selected">全国包邮</option>
                                                    </select>
                                                    <span class="ml20 fr">快递运费：
                                                        <strong class="J_ShipExpense" data-groupid="13h2ntk">¥ 0.00</strong></span>
                                                </div>
                                            </td>
                                        </tr>
                                        <!--合计-->
                                        <tr class="tr_checked">
                                            <td colspan="6" class="pl10 pr20 cart_largepding">
                                                <div class="cart_table_disduce cart_lightgray cart_font16 fr">合计：
                                                    <span class="cart_red cart_bold cart_money shopSum" data-groupid="13h2ntk"><?php echo ($v["subtotal"]); ?></span>
                                                    <input type="hidden" class="shoppro" value="<?php echo ($subtotal); ?>" name="substrtotal">
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- 商品对应数量 -->
                                        <input type="hidden" name="gnum[]" value="<?php echo ($v["selectNum"]); ?>" >
                                        <!-- 商品单价 -->
                                         <input type="hidden" name="price[]" value="<?php echo ($v["floatgoodsPrice"]); ?>" >
                                        <input type="hidden" name="color[]" value="<?php echo ($v["selectColor"]); ?>" >
                                        <!-- 商品尺寸-->
                                        <input type="hidden" name="size[]" value="<?php echo ($v["selectSize"]); ?>" >
                                        <!-- 商品ID -->
                                        <input type="hidden" name="goodId[]" value="<?php echo ($v["goodsid"]); ?>">
                                        <!-- 商品图片 -->
                                        <input type="hidden" name="pic[]" value="<?php echo ($v["colorPic"]); ?>">
                                        <!-- 商品名 -->
                                        <input type="hidden" name="gname[]" value="<?php echo ($v["goodsName"]); ?>">
                                        <!-- 小计 -->
                                         <input type="hidden" name="gtotal[]" value="<?php echo ($v["subtotal"]); ?>"><?php endforeach; endif; ?>
                                </table>
                                <!-- 地址ID -->
                                <input type="hidden" name="addressId" id="addressId" value="">
                                <!-- 用户id -->
                                <input type="hidden" name="uid" value="<?php echo ($_SESSION['home']['id']); ?>" >
                                <!-- 订单总价 -->
                                <input type="hidden" name="total" value="<?php echo ($subtotal); ?>" >
                                <!-- 商品件数 -->
                                <input type="hidden" name="goodsNum" value="<?php echo ($goodsNum); ?>" >

                                </form>
                        </div>
                    </div>
                    <!-- footer显示价格 -->
                    <div>
                        <div class="cart_paybar">
                            <a href="javascript:;"onclick="return submitOrder()" class="cart_surebtn fr">确认并付款 &gt;</a>
                            <span class="cart_paybar_info_cost cart_red cart_bold cart_font26 cart_money fr goodsSum" finalprice="<?php echo ($subtotal); ?>">¥<?php echo ($subtotal); ?></span>
                            <div class="cart_paybar_info cart_pregray fr">
                                <!-- 这里的商品不会变动，后端自己算出来就好了 -->共有
                                <span class="cart_red goodsNum"><?php echo ($goodsNum); ?></span>件商品，总计：</div>
                            <a href="<?php echo U('Cart/cartShow');?>" class="cart_back cart_hoverline cart_pregray">返回购物车</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="g-footer">
            <p title="mofa015027">
                <a href="" target="_blank">蘑菇街</a>|
                <a href="" target="_blank">加入开放平台</a>© 2016 Mogujie.com,All Rights Reserved.</p>
        </div>
    </body>
    <script type="text/javascript">

          //该函数是用来显示和添加省份的数据
        function showaddAddress(){
            $('#showAddress').css('display','block');

             var URL = "<?php echo U('ajaxGetProivnce');?>"
            $.ajax({
                type:"POST",
                url:URL,
                data:"upid=0",
                success:function (data){
                    var province = jQuery.parseJSON(data,true);
                    // console.log(province);
                    for(var i=0; i < province.length; i++){
                        $('#home_address-sprovince').append('<option value="'+province[i]['name']+'">'+province[i]['name']+'</option>');
                    }
                  
            } })

        }

        //该函数是用来获取市的信息
        $('#home_address-sprovince').on('change',

            function(){
                    var priVal=$(this).val();
                    var URL1 ="<?php echo U('ajaxarea');?>";
                    $.ajax({
                        type:"POST",
                        url:URL1, 
                        data:"name="+priVal,
                        success:function (data){

                          var cityData =$.parseJSON(data, true);

                            $('#home_address-scity option[data-city="true"]').remove()

                          for(var i = 0; i<cityData.length; i++ ){

                                $('#home_address-scity').append('<option data-city="true" value="'+cityData[i]['name']+'" >'+cityData[i]['name']+'</option>');
                          }

                        },
                        error:function(error){

                            console.log(error);
                        },

                      })

            })

        // 给市绑定一个改变事件、
        $('#home_address-scity').on('change', function(){
                    var cityVal=$(this).attr('value');
                    var URL2 ="<?php echo U('Personal/ajaxGetArea');?>";
                    $.ajax({
                        type:"POST",
                        url:URL2, 
                        data:"name="+cityVal,
                        success:function (data){
                          var areaData = jQuery.parseJSON( data, true );
                           $('#home_address-sarea option[data-area="true"]').remove()

                          for(var i = 0; i<areaData.length; i++ ){

                                $('#home_address-sarea').append('<option data-area="true" value="'+areaData[i]['name']+'" >'+areaData[i]['name']+'</option>');
                          }

                    }  })

            })

        function displayAddress(){
            $('#home_address-scity option').remove();
            $('#home_address-sarea option').remove();
            $('#home_address-sprovince option').remove();
            $('input[name="postcode"]').attr('value','');
            $('textarea[name="street"]').attr('value','');
            $('input[name="name"]').attr('value','');
            $('input[name="mobile"]').attr('value','');
            $('#showAddress').css('display','none');
        }
        //这个函数是用来判断提交的时候值是否合法
        $('#confirmAdd').on('click', function(){

                var provinceSel = $('#home_address-sprovince option').attr('selected')=="selected" ;//等于true表示要重新选择
                var citySel =  $('#home_address-scity option').attr('selected')=="selected";
                var townSel = $('#home_address-sarea option').attr('selected')=="selected";
                var codeVal = $('input[name="postcode"]').val();

                var preg=/^\d{6}$/;

                var coderes = codeVal.match(preg);

                 $('span[ data-address-tip="true" ]').remove();
                if( (!provinceSel) && (!citySel) && (!townSel) ){

                     $('span[ data-address-tip="true" ]').remove();

                }else{
                    $('.city_select').html('<span data-address-tip="true" style="color:#FF0078;">地址不合法</span>')
                    return false;
                }
                $('span[data-code="postcode"]').remove();
                 if(!coderes){
                    $('#code_tip').html('<span data-code="postcode" style="color:#FF0078;">邮编不合法</span>');
                    return false;
                 }else{
                    $('span[data-code="postcode"]').remove();
                 }
                // 匹配中的字符
                var detailAddRes = $('#detailAddress').val() ;

                if( detailAddRes.length< 5 || detailAddRes=="" ){
                    $('.breakline').css('color','#FF0078');
                    return false; 
                   }else{
                    $('.breakline').css('color','');
                 
                   }
                
                $('span[data-name="true"]').remove();
                var  nameVal =$('input[name="name"]').val();
                
                if( nameVal=="" ){

                    $('#name_tip').html('<span data-name="true" style="color:#FF0078;">收货人不能为空</span>');

                    return  false;

                }else{ 

                     $('span[data-name="true"]').remove();

                }
                var  mobile =  $('input[name="mobile"]').val();

                var phonepreg = /^1[34578]\d{9}$/;

                $('span[data-phone="true"]').remove();

                if( !mobile.match(phonepreg) ){

                    $('#mobile_tip').html('<span data-phone="true" style="color:#FF0078;">手机号不合法</span>');

                    return false;

                }else{

                   $('span[data-phone="true"]').remove();

                }

                // 绑定a标签提交
                document:search_form.submit();
        })      
        
        function displayEditAddress(){

                $('input[name="postcode1"]').attr('value','');
                $('textarea[name="street1"]').attr('value','');
                $('input[name="name1"]').attr('value','');
                $('input[name="mobile1"]').attr('value','');

        }

           if ($('.addressbg').hasClass('cart_address_sel'))
           {
                var aid = $('input[name="aid"]').val();
                $('input[name="addressId"]').attr('value', aid);
           }
            

        /*选中切换背景*/
        function sel(obj)
        {       
            $(obj).removeClass('cart_address_card');

            $(obj).addClass('cart_address_sel');


            $(obj).parent().siblings('li').children('a').removeClass('cart_address_sel');

            var aid = $('input[name="aid"]').val();
            
             $('input[name="addressId"]').attr('value', aid);
    
        }

        // 提交订单
        function submitOrder()
        {       
            // 如果没有选中地址提示一下
            if( $('input[name="addressId"]').attr('value')=="" ){

                    alert('请选择收货地址');
                     return false;

            }

           
            // if(){

            // }
            // 
            // 1.           is(‘.classname’)
            // 2.           hasClass(‘classname’)
            // 获得地址ID
            if("<?php echo (session('order')); ?>"=="" ){
                location.href="<?php echo U('Index/index');?>";

            }
          
            document:orderForm.submit();

        }





    </script>
</html>