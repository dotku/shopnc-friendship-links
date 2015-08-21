# ShopNC 友情链接
## 版权信息
@author Weijing Jay Lin <44219991@qq.com>  
@release-date 2015/08/20  
@version v0.1  
@license MIT 保留作者信息，可以修改或商业用途  
@link https://github.com/dotku/shopnc-friendship-links  

## 安装说明

### 1. 备份并覆盖以下文件  

- /admin/control/navigation.php  
- /admin/template/default/navigation.index.php  

- /shop/control/links.php  
- /shop/template/default/home/index.php
- /shop/template/default/home/friendship-links.php 

- /data/resource/bootstrap/*

### 2. 在需要的地方引用友情链接代码，代码例子如下

    <?php require_once(__DIR__ . '/friendship-links.php') ?>

(*) 假设模板引用文件与友情链接文件在同一个页面

## 操作步骤  

1. 用户通过 /shop/index.php?act=links 提交申请
2. 管理员通过后台的 网站 > 导航 页面进行管理操作，只需勾选启用就可以了

## 其他操作

1. 管理员可以自行添加自定义链接 (*)
2. 可以通过后台禁用和启用友情链接 

(*) 设计上友情链接 item_id 为 1，默认下只需读取 nav_type 和 if_approved 字段信息就好了