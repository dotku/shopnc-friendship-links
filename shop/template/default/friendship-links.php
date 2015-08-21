<?php 
	// control
	$table = Model()->table('navigation');
	$condition['nav_type'] = 0; // 自定义导航
	$condition['if_approved'] = 1; // 已经通过认证
	$rows = $table->where($condition)->select();
	//var_dump($rows);
?>
<!-- friendship-links style -->
<style>
	#friendship-links ul, #friendship-links li {
		list-style-type: none;
		padding-right: 10px;
	}
	#friendship-links li { float: left; }
	#friendship-links li a:visited, #friendship-links li a {
		color: #077E98;
	}
</style>
<!-- friendship-links -->
<?php if (!empty($rows) && is_array($rows)) {?>
	<ul>
		<?php foreach ($rows as $key => $val) { ?>
			<li><a href="<?php echo $val['nav_url']?>" target="_blank"><?php echo $val['nav_title']?></a></li>
		<?php } ?>
	</ul>
<?php } ?>
<div style="clear: both"></div>