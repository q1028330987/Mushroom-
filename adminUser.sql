--commit"管理员表"status 为1启用，2禁用 
create table mgj_Administrators(
       id int  unsigned auto_increment primary key,
      username varchar(32) not null,
      password varchar(100) not null,
      status tinyint(1) unsigned default 1,
      pic varchar(50) not null,
      email  varchar(100) not null,
      addtime  int not null
)engine=innodb default charset =utf8;
alter table  mgj_Administrators add unique(`username`);
alter table mgj_Administrators modify password varchar(100) not null;


--该表示用来记录用户是否需要记住一个周
create table mgj_cookie(
id int unsigned  auto_increment primary key,
username varchar(50) not null,
password varchar(100) not null,
addtime int not null,
sessionid varchar(100) not null
)engine = innodb default charset=utf8;
alter table mgj_cookie add addtime int not null;
alter table mgj_cookie change sessionid  password varchar(100) not null;
alter table mgj_cookie add sessionid varchar(100) not null;



--commit 用户组表 status1表示启用2，表示禁用
create table mgj_Auth_Group(
      id int unsigned auto_increment primary key,
      title char(100) not null,
      status tinyint(1) default 1,
      ruleid char(80) not null
)engine = innodb default charset=utf8;

--commit权限规则表 status 1表示正常 2,
--condition表示禁用为空表示存在就验证，不为空表示按照条件验证

create table mgj_Auth_Rule(
id int unsigned auto_increment primary key,
name char(80) not null,
title char(30) not null,
status tinyint(1) not null default 1,
`condition` char(100) not null
)engine=innodb default charset =utf8;

alter table mgj_Auth_Rule add uniquse(`name`);

--commit mgj_Auth_Group_Access用户组明细表 uid为管理员ID
create table mgj_Auth_Group_Access(
id int unsigned auto_increment primary key,
uid int unsigned not null,
group_id  int not null
)engine=innodb default charset = utf8;


--用户表mgj_User status状态1启用2，禁用
create table mgj_User(
id int unsigned auto_increment primary key,
username varchar(50),
userpass varchar(100) not null,
status tinyint(1) not null default 1,
addtime int not null,
phone varchar(12) not null,
email varchar(50) default '',
)engine = innodb default charset =utf8

--用户名的唯一索引 
alter table mgj_User add unique(`username`);
alter table mgj_User add unique(`phone`);
alter table mgj_User add unique(`email`);
alter table mgj_User modify userpass varchar(100) not null;
 alter table mgj_user modify  addtime int(10)  not null ;
 alter table mgj_user add email varchar(50) not null default '';




--commit用户详情表 grade等级1为普通状态1：青铜用户，2：白银用户,3:黄金用户,4:铂金用户,5:砖石用户                                   
--pic默认头像性别1 表示女
create table mgj_User_Detail(
id int unsigned auto_increment primary key,
address varchar(100)  default '',
birthday int,
job varchar(12) default '',
grade tinyint(1) default 1,
pic varchar(100) default '1.jpg',
phone varchar(12) not null,
sex tinyint(1) not null default 1,
introduce varchar(1000) default "这个人很懒，什么都没写。"
)engine = innodb default charset =utf8;

alter table  mgj_user_detail add phone varchar(12) not null;
alter table  mgj_user_detail add introduce varchar(1000) default "这个人很懒，什么都没写。";
alter table  mgj_user_detail add sex tinyint not null default 1;
alter table mgj_user_detail add unique(`phone`); 
alter table mgj_user_detail drop uid;
alter table mgj_user_detail modify pic varchar(100) default '1.jpg'; 
--用户锁定表mgj_User_Lock ipaddr位
create table mgj_User_Lock(
id int unsigned auto_increment primary key,
uid int unsigned not null,
ipaddr int  not null,
logintime int  not null default 0 P COMMENT '用户登陆时间',
pass_wrong_time_status  tinyint(10) NOT NULL COMMENT '登陆密码错误状态 '
)engine = innodb default charset= utf8;

alter table mgj_user_lock modify ipaddr int not null;

alter table mgj_user_lock modify logintime int not null default 0;
--添加索引 


--commit mgj_Goods商品表 status 1表示上架，2表示下架  3，表示缺货
create table mgj_Goods(
id int unsigned auto_increment primary key,
gname varchar(100) not null,
status tinyint(1) not null default 1 ,
price decimal(10,2) not null,
buy int unsigned  not null default 0,--销售量
brandid int  unsigned not null
)engine = innodb default charset =utf8; 

alter table mgj_goods add store int unsigned  not null default 0;--单个商品的库存
alter table mgj_goods add addtime timestamp;
alter table mgj_goods add categoryid int unsigned not null;
alter table mgj_goods add `describe` varchar(255);
alter table mgj_goods add `collectnum` int;--卖家收藏改商品的数量
alter table mgj_goods add totalstore int;--总的库存，为尺码的个数 * 颜色的数量

--commit商品分类表 mgj_category
create table mgj_category(
id int unsigned auto_increment primary key,
cname int not null,
pid int not null,
path varchar(255),
comment varchar(255)
)engine = innodb default charset =utf8;

alter table mgj_Goods add index(`gname`);
alter table mgj_Goods add index(`price`); 
--commit品牌表mgj_brand
create table mgj_Brand(
id int unsigned auto_increment primary key,
brandName varchar(20) not null,
brandPic varchar(50) not null
)engine = innodb default charset = utf8;
alert table mgj_brand add descript varchar(255);
--commit购买属性表mgj_Property_Name

create table mgj_proprety_name(
id int unsigned auto_increment primary   key,
gid int unsigned not null,
propretyname varchar(30) not null,
typeid  int not null
)engine = innodb default charset = utf8;
alter table mgj_proprety_name drop typeid;
alter table mgj_proprety_name add proval varchar(30) not null;

--commit购买属性值表
create table mgj_Proprety_Val(
id int unsigned auto_increment primary key,
proid int unsigned not null,
proval varchar(30) not null
)engine = innodb default charset=utf8;
drop table mgj_proprety_val;

--尺寸表mgj_Size
create table mgj_Size(
id int unsigned auto_increment primary key,
sizeName varchar(32)  not null,
sizeVal varchar(255) not null
)engine = innodb default charset =utf8;
alter table mgj_size add gid int unsigned  not null;
drop table mgj_size;

-- --购买属性表mgj_buyAttr
-- create table mgj_buyAttr(
-- id int unsigned auto_increment primary key,
-- gid  int unsigned  not null,
-- attr varchar(255) not null,
-- size varchar(100) not null,
-- store int  unsigned not null,
-- price decimal(10,2) not null,
-- addtime int not null
-- )engine =innodb default charset =utf8;


--商品图表mgj_Pic
create table mgj_Pic(
id int unsigned auto_increment primary key,
gid int unsigned not null,
picName varchar(255) not null,
picUrl varchar(50) not null
)engine= innodb default charset =utf8;
alter table mgj_pic drop picName;
alter table mgj_pic change picUrl picurl varchar(50) not null;

--店铺表mgj_Shop bail保证金 1表示未缴纳，2表示已经缴纳
-- create table mgj_Shop(
-- id int unsigned auto_increment primary key,
-- shopName varchar(50) not null,
-- shopPic varchar(50) not null,
-- addtime int  not null,
-- bail tinyint(1) default 1,
-- index shopName(`shopName`)
-- )engine = innodb default charset =utf8;

--店铺详情表mgj_ShopDetail  collection表示收藏者
-- create table mgj_ShopDetail(
-- id int unsigned auto_increment primary key,
-- sid int unsigned not null,
-- saleNumber int  unsigned not null default 0,
-- collection int unsigned default 0,
-- address varchar(100) not null
-- )engine = innodb default charset = utf8;


--商品详情表 mgj_Goods_Detail
create table mgj_Goods_Detail(
id int unsigned auto_increment primary key,
gid int unsigned not null,
contents text not null,
addtime int  not null
)engine = innodb default charset = utf8;



--购物车表 mgj_Cart
create table mgj_Cart(
id int unsigned auto_increment primary key,
uid  int unsigned not null,
gid int  unsigned  not null,
size varchar(20) not null,
color varchar(20) not null,
price  decimal(10,2) not null,
`number` int  unsigned not null,
goodsPic varchar(50) not null,
goodsNmae varchar(50) not null
)engine = innodb default charset =utf8;


--订单表mgj_Orders num_id订单号ID written留言 status 、默认1未付款，2等待发货 3确认收货，4，已完成待评价5，已评价 
--addtime 下单时间
create table mgj_Orders(
id int unsigned auto_increment primary key,
uid int unsigned not null,
num_id int unsigned  not null,
 total decimal(10,2) not null,  --总价    
status tinyint(1) not null default 1,
addtime int(10) not null,
num int unsigned not null,--总数量
`aid` int unsigned not null
)engine = innodb default charset= utf8;
alter table mgj_orders amgj_dd aid int unsigned not null;


--修改订单详情表
create table mgj_order_detail(
id int unsigned auto_increment primary key,
`gid` int unsigned not null,
`pic` varchar(255)  not null,
`comment` varchar(255) not null,
`size` varchar(20) not null,
`color` varchar(20) not null,
`price` decimal(10,2) not null,
`gname` varchar(255) not null,
`gtotal` decimal(10,2)  not null,
`oid` int  unsigned not null,
`gnum` int unsigned not null,
`uid` int unsigned not null
)engine=innodb default charset=utf8;

alter table mgj_order_detail add `oid` int unsigned not null;
alter table mgj_order_detail  add `uid` int unsigned not null;
alter table mgj_order_detail  add `id` int unsigned auto_increment primary key ;
alter table mgj_order_detail add `status` tinyint(1) default 1;--1表示未评价


--收货地址表mgj_Address
create table mgj_Address(
id int unsigned auto_increment primary key,
uid int unsigned not null,
address varchar(200) not null comment '省市区地址',
det_detail varchar(255) not null comment '详细地址',
name varchar(32) not null comment '收货人',
tel varchar(32) not null comment '联系电话',
code varchar(6) not null,
status tinyint(1) not null default 2,

)engine = innodb default charset=utf8;
--1表示默认地址，其他为非默认地址
alter table mgj_address add status tinyint(1) not null default 2;--表示不是默认地址
alter table mgj_address modify address varchar(200) not null;


--评价表 mgj_Assess
create table mgj_Assess(
 id int unsigned  auto_increment primary key,
uid int unsigned not null,
gid int unsigned not null,
grade tinyint(1) not null  default 1 comment '最大5星好评', 
contents text not null comment '评价内容', 
addtime int(10) not null
)engine = innodb default  charset =utf8;


--评价嗮图表mgj_AssessPic
create table mgj_AssessPic(
id int unsigned auto_increment primary key,
assessid int unsigned not null,
status tinyint(1) not null comment '1第一次评价，2，追评',
pic varchar(50) not null
)engine = innodb default charset =utf8;

--追评表mgj_ChaseRatings
create table mgj_ChaseRatings(
id int unsigned auto_increment primary key,
pingid int  not null comment '评价表id',
contents text not null,
addtime int(10) not null
)engine = innodb default charset = utf8;

--友情链接表 mgj_Link
create table mgj_Link(
id int unsigned auto_increment primary key,
pic varchar(50)  comment '友情链接图片',
contents varchar(255)    comment '描述',
url varchar(50)  comment '链接地址',
state tinyint(1)  default 1  comment '1 开启 ， 2为关闭'
)engine = innodb default charset = utf8;

--钱包记录表
create table mgj_Money_Note(
id int unsigned auto_increment primary key,
state tinyint not null comment '记录的类型',
money decimal(10,2) not null comment '处理的金额',
addtime int not null
)engine=innodb default charset=utf8;


--钱包表
create table mgj_Money(
id int unsigned auto_increment primary key,
uid int unsigned not null,
money decimal(10,2) not null default 0.0
)engine=innodb default charset=utf8;


--反馈表
create table mgj_Feedback(
id int unsigned auto_increment primary key,
username varchar(10) not null,
tel char(11) not null,
email varchar(50) not null,
contents text not null
)engine=innodb default charset=utf8;
alter table mgj_feedback drop email;
alter table mgj_feedback add username varchar(10) not null;

--轮播图
create table mgj_Slide_Show(
id int unsigned auto_increment primary key,
pic varchar(255) not null,
rgb char(11) not null,
gid int unsigned not null
)engine=innodb default charset=utf8;