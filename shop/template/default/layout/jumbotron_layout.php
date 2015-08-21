<?php defined('InShopNC') or exit('Access Invalid!');?>
<!DOCTYPE html>
<html lang="zh">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="<?php echo $output['seo_keywords']; ?>" />
	<meta name="description" content="<?php echo $output['seo_description']; ?>" />

    <title><?php echo $output['html_title'];?></title>
	<link href="<?php echo RESOURCE_SITE_URL;?>/bootstrap/3.3.4/css/base.css" rel="stylesheet" type="text/css">
    <link href="<?php echo RESOURCE_SITE_URL;?>/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo RESOURCE_SITE_URL;?>/bootstrap/3.3.4/css/jumbotron-narrow.css" rel="stylesheet">
	
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
	<script src="//code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="<?php echo RESOURCE_SITE_URL;?>/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <!--[if lt IE 9]><script src="<?php echo RESOURCE_SITE_URL;?>/bootstrap/3.3.4/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo RESOURCE_SITE_URL;?>/bootstrap/3.3.4/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
	body {
		font-family: "Microsoft Yahei", "Helvetica Neue",Helvetica,Arial,sans-serif;
		padding-right:0px !important;
		margin-right:0px !important;
		padding-top: 70px;
	}
	body.modal-open{
		overflow: auto
	}
	@media (min-width: 768px) {
	  .container {
		max-width: 1170px;
	  }
	}
	.jumbotron {
		text-align: left;
	}
	</style>
  </head>
<?php require_once($tpl_file);?>
</html>