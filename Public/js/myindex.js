(function(){

    var slid_length = $('.mslide_banners a').size();

    var time;

    var flag = 0;

    function display() {

        time = setInterval(function(){               

                flag++;

                if ( flag >= slid_length ) {

                    flag=0;
                }

                $('.mslide_banners a').eq(flag).css('display', 'block').siblings().css('display', 'none').parent().next().children().eq(flag).addClass('dot_show').siblings().removeClass('dot_show');

                $('.MCUBE_MOD_ID_248606').css('background-color', 'rgb(' + $('.mslide_banners a').eq(flag).attr('data-rgb') + ')');
            }, 4000);
    }

    display();

    $('.mslide_dot_box a').mouseover(function () {
            
            clearInterval(time);

            $(this).addClass('dot_show').siblings().removeClass('dot_show').parent().prev().children().eq( $(this).index() ).css('display', 'block').siblings().css('display', 'none');

                $('.MCUBE_MOD_ID_248606').css('background-color', 'rgb(' + $('.mslide_banners a').eq(flag).attr('data-rgb') + ')');

            flag = $(this).index();

    }).mouseout(function () {

        display();

    });
    
})();



(function () {

    $('.nav_list_row_first').hover(function () {

    var that = $(this);

    that.children('dl').addClass('hover bd-coat').mouseout( function () {

        that.children('dl').removeClass('hover bd-coat')
    } );

    $('.nav_more_content').css('display', 'block').children().eq( that.index() ).css('display', 'block').siblings().css('display', 'none');

    if ( $(this).attr('data-flag') != 'true' ) {
        $.post(
            url,
            {pid:that.attr('data-pid')},
            function (data) {

                var len = data['type'].length;

                var str = '<h2 class="nav_more_list_head"><a rel="nofollow" target="_blank" href="'+that.find('.catagory').prop('href')+'">'+that.find('.catagory').html()+'</a></h2>';

                for(var i=0; i<len; i++) {

                    str += '<dl class="nav_more_wrap"><dt class="more_list_title"><a rel="nofollow" target="_blank" class="more_list_title_a" href="'+ showList +'?tid='+ data['type'][i]['id'] + '&pid=' + data['type'][i]['pid'] +'">'+data['type'][i]['cname']+'</a><a rel="nofollow" target="_blank" class="more_list_title_more fr" href="">更多<span class="checkMoreArchor"></span></a></dt><dd class="more_list clearfix">';

                    if (data['type'][i].son != null) {

                        for (var j=0; j<data['type'][i].son.length; j++) {

                            str += '<a class="more_list_item_a" rel="nofollow" data-ext-acm="3.mce.1_10_18842.18785.0.fCf8tqfqXIDmD.m_191853" target="_blank" href="'+ showList +'?tid='+ data['type'][i]['son'][j]['id'] + '&pid=' + data['type'][i].son[j]['pid'] +'" style="color:#999">'+data['type'][i].son[j].cname+'</a>';
                        }
                    }

                    str+= '</dd></dl>';

                }

                $('.nav_more_left_content').eq( that.index() ).append(str);

                var tmp = '<h2 class="nav_more_guess_h2 yahei">为你推荐</h2><h3 class="nav_more_guess_h3 yahei">根据你购买浏览记录专门推荐</h3>';

                var leng = data['goods'].length;
                // console.log(leng);
                for (var k=0; k<leng; k++) {

                tmp += '<a class="nav_more_item cube-acm-node has-log-mod" rel="nofollow" data-ext-acm="3.mce.1_4_1k5mj9m.40457.29475.3Va85qfqXIDWQ.p_3_180-lc_201" target="_blank" href=""><div class="nav_more_item_image J_dynamic_imagebox" suffix-ratio="1:1" img-src=""><div class="nav_more_title text-hide yahei">'+ data['goods'][k]['gname'] +'</div><img class="" src="'+ pub + data['goods'][k].picurl+'" alt=""></div><div class="nav_more_price yahei">'+data['goods'][k].price+'</div></a>';

                }

                $('.nav_more_guess').eq( that.index() ).append(tmp);

                that.attr('data-flag', true);
            },
            'json'

            );
    }
    },function () {

        $('#nav1').hover(function() {

        },function() {

             $('#nav_more_content').css('display', 'none');
        });
     });
})();

$.ajaxSetup({  
    async : false
}); 

(function () {

    var num = 0;
    $(window).scroll(function () {

        for ( var i=0; i<$('.god').length; i++) {

            if ( $('.god').eq(i).attr('data-i') != 1 ) {

                if ( $('.god').eq(i).offset().top-$(window).scrollTop() <= $(window).height() ) {
                    var spid = $('.god').eq(i).attr('data-id');

                    var str='';
                    $.post(
                        goods,
                        {"pid":spid},
                        function (data) {
                            
                            str +='<div class="lazyData clearfix fl big-banner-content"><a rel="nofollow" target="_blank" href="" class="big-banner-item cube-acm-node yahei has-log-mod"><div class="title title-base bigBanner-color text-hide yahei" style="color: #333;">'+ data[0].gname +'</div><div class="sub-title title-base bigBanner-color text-hide yahei" style="color: #666;">'+ data[0].describe +'</div><div class="big-banner-img J_dynamic_imagebox"><img class="J_dynamic_img fill_img" src="'+ pub + data[0].picurl +'" alt=""></div></a></div>';

                            $('.god').eq(num).find('.data-good').html(str);

                            var flag =0;
                            for (var j=1; j < data.length-1; j++) {

                                var sixstr = '<a rel="nofollow" class="multi-col-con multi-pic-item-2" style="float:left" target="_blank" href=""><div class="top-title text-hide yahei col333">'+data[j].gname+'</div><div class="sub-title top-subTitle text-hide yahei col999">'+data[j].describe+'</div><div class="pic-box J_dynamic_imagebox"><img class="J_dynamic_img fill_img" src="'+ pub + data[j].picurl +'" alt=""></div></a>';
                                $('.multi-pic1').eq(num).append(sixstr);

                                var last = data[data.length-1];
                                var groom = '<a class="recSingleGoodsBox clearfix cube-acm-node has-log-mod" href="" target="_blank"><div class="recGoodsPicBox J_dynamic_imagebox fl" suffix-ratio="1:1"><img class="J_dynamic_img fill_img" width="200" height="200" src="'+pub+last.picurl+'" alt=""></div><div class="recGoodsInfo yahei"><div class="goodsDesc">'+last.gname+'</div><div class="goodsPrice">'+last.price+'</div></div></a>';

                                $('.changeNew+.tofu-col-con-items').eq(num).append(groom);
                                flag++;

                            }

                            num ++;

                        },
                        'json'
                    );

                    $('.god').eq(i).attr('data-i', 1);

                }
            }
        }

    });


})();


(function () {

    var start = 0;

    $(window).scroll(function () {

        if ( $('.foot').attr('data-flag') != 'true') {


            if ( $('.foot').offset().top-$(window).scrollTop() <= $(window).height() ) {

                $.post(
                    showGoods,
                    {"start" : start},
                    function (data) {

                        if (data.length != 0) {

                            var str ='';

                            for (var i=0; i<data.length; i++) {


                                str += '<div class="iwf goods_item" data-tradeitemid="17o66hc" goods-index="120" is-exposed="true"><a rel="nofollow" href="" class="img J_dynamic_imagebox loading_bg_120" target="_blank"><img class="J_dynamic_img fill_img" src="' + pub + data[i].picurl +'" alt=""></a><a rel="nofollow" target="_blank" href="" class="goods_info_container" ><p class="title yahei fl" style="height:40px;margin-bottom:3px">'+ data[i].gname +'</p> <div class="goods_info fl"><b class="price_info yahei">¥'+ data[i].price +'</b><p class="org_price fl yahei">¥&nbsp;<span>136</span></p><span class="fav_num fr"><img src="" alt="">17661</span></div></a></div>';
                            }


                            $('.showgoods').append(str);
                        } else {

                            $('.foot').attr('data-flag', true);
                        }
                    },
                    'json'
                    );

                start += 20;

                if (start >= 200) {

                    $('.foot').attr('data-flag', true);
                }
            }
        }
    });
})()


function randGoods(obj)
{

   $.post(
        randGood,
        {pid:$(obj).attr('data-tid')},
        function (data) {

            var groom = '<a class="recSingleGoodsBox clearfix cube-acm-node has-log-mod" href="" target="_blank"><div class="recGoodsPicBox J_dynamic_imagebox fl" suffix-ratio="1:1"><img class="J_dynamic_img fill_img" width="200" height="200" src="'+pub+data.picurl+'" alt=""></div><div class="recGoodsInfo yahei"><div class="goodsDesc">'+data.gname+'</div><div class="goodsPrice">'+data.price+'</div></div></a>';

            $(obj).next().html(groom);
        },
        'json'
   ); 
}