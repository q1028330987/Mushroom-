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
    <title>品牌管理</title>
</head>
<body>
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 产品管理 <span class="c-gray en">&gt;</span> 品牌管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c">
		<a href="./product-brand-add.html" type="submit" class="btn btn-success" id="" name="" ><i class="Hui-iconfont">&#xe600;</i> 添加</a>
		
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"></span> <span class="r">共有数据：<strong><?php echo ($num); ?></strong> 条</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value="<?php echo ($v["id"]); ?>"></th>
					<th width="70">ID</th>
					<th width="80">排序</th>
					<th width="200">LOGO</th>
					<th width="120">品牌名称</th>
					<th>具体描述</th>
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>
            <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr class="text-c">
					<td><input name="" type="checkbox" value=""></td>
					<td><?php echo ($v["id"]); ?></td>
					<td><input type="text" class="input-text text-c" value="1"></td>
					<td><img src="/Project/thinkphp_3.2.3_full/Public/<?php echo ($v["brandpic"]); ?>" width="120"></td>
					<td class="text-l"><img title="" src="/Project/thinkphp_3.2.3_full/Public/<?php echo ($v["brandpic"]); ?>" width="40"><?php echo ($v["brandname"]); ?></td>
					<td class="text-l"><?php echo ($v["descript"]); ?></td>
					<td class="f-14 product-brand-manage"><a style="text-decoration:none"  href="<?php echo U('brandedit');?>?id=<?php echo ($v["id"]); ?>&brandName=<?php echo ($v["brandname"]); ?>" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5"  href="<?php echo U('brandDelete');?>?id=<?php echo ($v["id"]); ?>" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
				</tr><?php endforeach; endif; ?>
			</tbody>
		</table>
	</div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/Project/thinkphp_3.2.3_full/Public/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/Project/thinkphp_3.2.3_full/Public/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Project/thinkphp_3.2.3_full/Public/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/Project/thinkphp_3.2.3_full/Public/static/h-ui.admin/js/H-ui.admin.js"></script>
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/Project/thinkphp_3.2.3_full/Public/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/Project/thinkphp_3.2.3_full/Public/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/Project/thinkphp_3.2.3_full/Public/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
$('.table-sort').dataTable({
	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"aoColumnDefs": [
	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
	  {"orderable":false,"aTargets":[0,6]}// 制定列不参与排序
	]
});
    function datadel()
    {
        // $val = $('input[type="chexkbox"]').value();

        alert(val);
    }
</script>
</body>
</html>