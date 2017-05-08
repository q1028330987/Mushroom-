<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/Project/thinkphp_3.2.3_full/Public/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/Project/thinkphp_3.2.3_full/Public/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/Project/thinkphp_3.2.3_full/Public/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/Project/thinkphp_3.2.3_full/Public/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/Project/thinkphp_3.2.3_full/Public/static/h-ui.admin/css/style.css" />
<link rel="stylesheet" href="/Project/thinkphp_3.2.3_full/Public/lib/zTree/v3/css/zTreeStyle/zTreeStyle.css" type="text/css">
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<style>
    form{
        text-align:right;
    }
    body{
        background:#F5F5F5; 
    }
</style>
<title>产品分类</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 产品管理 <span class="c-gray en">&gt;</span> 产品分类 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<!-- <table class="table">
    <tr>
        <td width="200" class="va-t"><ul id="treeDemo" class="ztree"></ul></td>
        <td class="va-t"><iframe ID="testIframe" Name="testIframe" FRAMEBORDER=0 SCROLLING=AUTO width=100%  height=390px SRC="product-category-add.html"></iframe></td>
    </tr>
</table> -->
    <center><a href="./product-category-add.html" style="background: #5EB95E;">增加顶级分类</a></center>  
    <form action="<?php echo U('categorySearch');?>" method="get">
        
        分类名：<input type="text" name="keyword" />
        <button>搜索</button>
    </form>
    <table class="table" border="1" style="text-align:center">
        <tr>
            <th>编号</th>
            <th>分类名</th>
            <th>父商品编号</th>
            <th>子商品路径</th>
            <th colspan="3">操作</th>
        </tr>
        <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
            <td><?php echo ($v["id"]); ?></td>
            <td><?php echo ($v["cname"]); ?></td>
            <td><?php echo ($v["pid"]); ?></td>
            <td><?php echo ($v["path"]); ?></td>
            <td><a href="/Project/thinkphp_3.2.3_full/index.php/MGJAdmin/Goods/categoryDelete/id/<?php echo ($v["id"]); ?>">删除</a></td>
            <td><a href="/Project/thinkphp_3.2.3_full/index.php/MGJAdmin/Goods/categoryAddSon/pid/<?php echo ($v["id"]); ?>/path/<?php echo ($v["path"]); ?>">添加子分类</a></td>
            <td><a href="/Project/thinkphp_3.2.3_full/index.php/MGJAdmin/Goods/categoryEdit/id/<?php echo ($v["id"]); ?>/pid/<?php echo ($v["pid"]); ?>/path/<?php echo ($v["path"]); ?>">编辑</a></td>
        </tr><?php endforeach; endif; ?>
    </table>
    <div id="page">
        <?php echo ($pageBtn); ?>
    </div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/Project/thinkphp_3.2.3_full/Public/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/Project/thinkphp_3.2.3_full/Public/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Project/thinkphp_3.2.3_full/Public/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/Project/thinkphp_3.2.3_full/Public/static/h-ui.admin/js/H-ui.admin.js"></script>
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/Project/thinkphp_3.2.3_full/Public/lib/zTree/v3/js/jquery.ztree.all-3.5.min.js"></script> 
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
				demoIframe.attr("src",treeNode.file + ".html");
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
		
var code;
		
function showCode(str) {
	if (!code) code = $("#code");
	code.empty();
	code.append("<li>"+str+"</li>");
}
		
$(document).ready(function(){
	var t = $("#treeDemo");
	t = $.fn.zTree.init(t, setting, zNodes);
	demoIframe = $("#testIframe");
	//demoIframe.on("load", loadReady);
	var zTree = $.fn.zTree.getZTreeObj("tree");
	//zTree.selectNode(zTree.getNodeByParam("id",'11'));
});
</script>
</body>
</html>