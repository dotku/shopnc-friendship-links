# ShopNC ��������

## ��װ˵��

1. ���ݲ����������ļ�  

- /admin/control/navigation.php  
- /admin/template/default/navigation.index.php  

- /shop/control/links.php  
- /shop/template/default/home/index.php
- /shop/template/default/home/friendship-links.php 

- /data/resource/bootstrap/*

2. ����Ҫ�ĵط������������Ӵ��룬������������

<?php require_once(__DIR__ . '/friendship-links.php') ?>

(*) ����ģ�������ļ������������ļ���ͬһ��ҳ��

## ��������  

1. �û�ͨ�� /shop/index.php?act=links �ύ����
2. ����Աͨ����̨�� ��վ > ���� ҳ����й���������ֻ�蹴ѡ���þͿ�����

## ��������

1. ����Ա�������������Զ������� (*)
2. ����ͨ����̨���ú������������� 

(*) ������������� item_id Ϊ 1��Ĭ����ֻ���ȡ nav_type �� if_approved �ֶ���Ϣ�ͺ���