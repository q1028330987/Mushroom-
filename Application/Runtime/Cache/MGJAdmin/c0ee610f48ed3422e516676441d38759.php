<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="stylesheet" type="text/css" href="/Project/thinkphp_3.2.3_full/Public/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/Project/thinkphp_3.2.3_full/Public/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/Project/thinkphp_3.2.3_full/Public/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/Project/thinkphp_3.2.3_full/Public/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/Project/thinkphp_3.2.3_full/Public/static/h-ui.admin/css/style.css" />
<style type="text/css">
    .cancelStatus:hover{
        cursor:pointer;
        color:red;
    }
</style>
<title>产品列表</title>
<link rel="stylesheet" href="/Project/thinkphp_3.2.3_full/Public/lib/zTree/v3/css/zTreeStyle/zTreeStyle.css" type="text/css">
</head>
<body class="pos-r">
<div style="margin-left:0px;">
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 产品管理 <span class="c-gray en">&gt;</span> 产品列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="page-container">
        <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a class="btn btn-primary radius"  href="<?php echo U('Goods/productAdd');?>"><i class="Hui-iconfont">&#xe600;</i> 添加产品</a></span> <span class="r">共有数据：<strong><?php echo ($num); ?></strong> 条</span> </div>
        <div class="mt-20">
            <table class="table table-border table-bordered table-bg table-hover table-sort">
                <thead>
                    <tr class="text-c">
                        <th width="40"><input name="" type="checkbox" value=""></th>
                        <th width="40">ID</th>
                        <th width="100">产品名称</th>
                        <th width="60">产品状态</th>
                        <th width="60">添加时间</th>
                        <th width="100">单价</th>
                        <th width="100">操作</th>
                        <th width="150">详情</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr class="text-c va-m">
                        <td><input name="" type="checkbox" value=""></td>
                        <td><?php echo ($v["id"]); ?></td>
                        <td class="text-l"><a style="text-decoration:none" onClick="" href="javascript:;"><img title="" src=""> <b class="text-success"></b><?php echo ($v["gname"]); ?></a></td>
                        <td class="text-l" style="text-align:center; "><?php echo ($arr[$v['status']]); ?></td>
                        <td class="text-l"><?php echo ($v["addtime"]); ?></td>
                        <td><span class="price"><?php echo ($v["price"]); ?></span> 元</td>

                        <!-- 商品状态的修改 -->
                        <td class="td-manage" style="position:relative; ">
                            <a style="text-decoration:none"  href="javascript:;" title="改变商品状态" goodsid="<?php echo ($v["id"]); ?>" status="<?php echo ($v["status"]); ?>"  class="changeStatus"><i>&#xe6de;</i></a>
                            <span style="display:none;width:92px;height:100px;position:absolute;border:1px solid pink;background: pink;left:70px;top:-2px;" class="statusbox">
                                 <label>上架:<input type="radio" name="status" goodsid="<?php echo ($v["id"]); ?>" status="<?php echo ($v["status"]); ?>" value="1" class="changeStatus" /></label><br/>
                                 <label>下架:<input type="radio" name="status" goodsid="<?php echo ($v["id"]); ?>" status="<?php echo ($v["status"]); ?>" value="2" class="changeStatus" /></label><br/>
                                 <label>缺货:<input type="radio" name="status" goodsid="<?php echo ($v["id"]); ?>" status="<?php echo ($v["status"]); ?>" value="3" class="changeStatus"/></label><br/><span style="" class="cancelStatus">关闭</span>
                            </span>
                            <a style="text-decoration:none" class="ml-5" onClick="product_edit('产品编辑','product-add.html','10001')" href="<?php echo U('Goods/productEdit');?>?id=<?php echo ($v["id"]); ?>&gname=<?php echo ($v["gname"]); ?>&price=<?php echo ($v["price"]); ?>&store=<?php echo ($v["store"]); ?>&describe=<?php echo ($v["describe"]); ?>" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> 
                            <a style="text-decoration:none" class="ml-5" href="<?php echo U('Goods/productDelete');?>?id=<?php echo ($v["id"]); ?>" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
                    <td>
                        <a class="btn btn-primary radius"  href="<?php echo U('Goods/productAddDetail');?>?id=<?php echo ($v["id"]); ?>"><i class="Hui-iconfont"></i> 添加详细信息</a><br/><br/>
                        <a class="btn btn-primary radius" onclick="" href="/Project/thinkphp_3.2.3_full/index.php/MGJAdmin/Goods/indexDetail/id/<?php echo ($v["id"]); ?>/brandid/<?php echo ($v["brandid"]); ?>/categoryid/<?php echo ($v["categoryid"]); ?>"><i class="Hui-iconfont"></i> 查看详细信息</a>
                    </td>
                    </tr><?php endforeach; endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/Project/thinkphp_3.2.3_full/Public/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Project/thinkphp_3.2.3_full/Public/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Project/thinkphp_3.2.3_full/Public/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/Project/thinkphp_3.2.3_full/Public/static/h-ui.admin/js/H-ui.admin.js"></script>
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/Project/thinkphp_3.2.3_full/Public/lib/zTree/v3/js/jquery.ztree.all-3.5.min.js"></script>
<script type="text/javascript" src="/Project/thinkphp_3.2.3_full/Public/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/Project/thinkphp_3.2.3_full/Public/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/Project/thinkphp_3.2.3_full/Public/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
var setting = {
    view: {
        dblClickExpand: false,
        showLine: false,
        selectedMulti: false
    },
    data: {
        simpleData: {
            enable:true,
            idKey: "id",
            pIdKey: "pId",
            rootPId: ""
        }
    },
    callback: {
        beforeClick: function(treeId, treeNode) {
            var zTree = $.fn.zTree.getZTreeObj("tree");
            if (treeNode.isParent) {
                zTree.expandNode(treeNode);
                return false;
            } else {
                //demoIframe.attr("src",treeNode.file + ".html");
                return true;
            }
        }
    }
};

var zNodes =[
    { id:1, pId:0, name:"一级分类", open:true},
    { id:11, pId:1, name:"二级分类"},
    { id:111, pId:11, name:"三级分类"},
    { id:112, pId:11, name:"三级分类"},
    { id:113, pId:11, name:"三级分类"},
    { id:114, pId:11, name:"三级分类"},
    { id:115, pId:11, name:"三级分类"},
    { id:12, pId:1, name:"二级分类 1-2"},
    { id:121, pId:12, name:"三级分类 1-2-1"},
    { id:122, pId:12, name:"三级分类 1-2-2"},
];
        
        
        
$(document).ready(function(){
    var t = $("#treeDemo");
    t = $.fn.zTree.init(t, setting, zNodes);
    //demoIframe = $("#testIframe");
    //demoIframe.on("load", loadReady);
    var zTree = $.fn.zTree.getZTreeObj("tree");
    //zTree.selectNode(zTree.getNodeByParam("id",'11'));
});

$('.table-sort').dataTable({
    "aaSorting": [[ 1, "desc" ]],//默认第几个排序
    "bStateSave": true,//状态保存
    "aoColumnDefs": [
      {"orderable":false,"aTargets":[0,7]}// 制定列不参与排序
    ]
});
/*产品-添加*/
function product_add(title,url){
    var index = layer.open({
        type: 2,
        title: title,
        content: url
    });
    layer.full(index);
}
/*产品-查看*/
function product_show(title,url,id){
    var index = layer.open({
        type: 2,
        title: title,
        content: url
    });
    layer.full(index);
}
/*产品-审核*/
function product_shenhe(obj,id){
    layer.confirm('审核文章？', {
        btn: ['通过','不通过'], 
        shade: false
    },
    function(){
        $(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="product_start(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
        $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
        $(obj).remove();
        layer.msg('已发布', {icon:6,time:1000});
    },
    function(){
        $(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="product_shenqing(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
        $(obj).parents("tr").find(".td-status").html('<span class="label label-danger radius">未通过</span>');
        $(obj).remove();
        layer.msg('未通过', {icon:5,time:1000});
    }); 
}
/*产品-下架*/
function product_stop(obj,id){
    layer.confirm('确认要下架吗？',function(index){
        $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="product_start(this,id)" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a>');
        $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已下架</span>');
        $(obj).remove();
        layer.msg('已下架!',{icon: 5,time:1000});
    });
}

/*产品-发布*/
function product_start(obj,id){
    layer.confirm('确认要发布吗？',function(index){
        $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="product_stop(this,id)" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>');
        $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
        $(obj).remove();
        layer.msg('已发布!',{icon: 6,time:1000});
    });
}

/*产品-申请上线*/
function product_shenqing(obj,id){
    $(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">待审核</span>');
    $(obj).parents("tr").find(".td-manage").html("");
    layer.msg('已提交申请，耐心等待审核!', {icon: 1,time:2000});
}

/*产品-编辑*/
function product_edit(title,url,id){
    var index = layer.open({
        type: 2,
        title: title,
        content: url
    });
    layer.full(index);
}

/*产品-删除*/
function product_del(obj,id){
    layer.confirm('确认要删除吗？',function(index){
        $.ajax({
            type: 'POST',
            url: '',
            dataType: 'json',
            success: function(data){
                $(obj).parents("tr").remove();
                layer.msg('已删除!',{icon:1,time:1000});
            },
            error:function(data) {
                console.log(data.msg);
            },
        });     
    });
}
</script>
</body>
</html>
<script type="text/javascript">
    //给修改商品的状态绑定点击事件，通过ajax进行操作
    $('.changeStatus').click(function () {

        var that = $(this);

        var goodsid = that.attr('goodsid');
        
        var status = that.attr('status');

        // console.log(that.next());

        that.next().css('display','block');
       
        //显示出修改状态的盒子
        $('.cancelStatus').css('display','block');
        
    });

    //隐藏显示改变状态的盒子
    $('.cancelStatus').click(function () {

        var that = $(this);

        that.parent().css('display','none');

        that.parent().parent().prev().prev().prev().css({"font-size":"13px","color":"black"});

    });

    //选择更改状态按钮
    $('.changeStatus').click(function () {

        var that = $(this);

        //当前商品的状态
        var nowStatus = that.attr('status');

        //要把状态改变为当前值的这个状态
        var nowValue = that.attr('value');

        //获取到当前商品的id,方便查询库存
        var goodsid = that.attr('goodsid');

        if (that.prop('checked') == true) {

            //ajax请求，判断是否满足条件，然后改变产品的状态
            $.post(
                   "/Project/thinkphp_3.2.3_full/index.php/MGJAdmin/Goods/productStatusChange",
                   {
                    nowStatus:nowStatus,
                    nowValue:nowValue,
                    goodsid:goodsid,
                   },
                   function (data) {

                    // console.log(data);

                    if (data == true) {

                        alert('库存不足，修改状态失败');
                    } else {

                        console.log('可修改');
                    }
                    
                   },
                   'json',
            );

                //ajax请求获得新的状态显示
                $.post(
                       "/Project/thinkphp_3.2.3_full/index.php/MGJAdmin/Goods/getNewStatus",
                       {
                        id:goodsid,
                       },
                       function (data) {

                        that.parent().parent().parent().prev().prev().prev().html(data);                        

                        that.parent().parent().parent().prev().prev().prev().css({"font-size":"26px","color":"red"});

                        var timer = setTimeout(function () {

                        that.parent().parent().parent().prev().prev().prev().css({"font-size":"13px","color":"black"});

                        },1000);

                       },
                       'json',
                );
        }

        
    });
</script>