<?php 
defined('InShopNC') or exit('Access Invalid!');
/**
 * 友情链接插件 v0.1
 * @author Weijing Jay Lin <44219991@qq.com>
 * @copyrights 福州丰杰软件有限公司
 */
class linksControl extends BaseHomeControl{
	public function __construct(){
		parent::__construct();
		// Tpl::setLayout('taobao_layout');
	}
	public function indexOp(){
		$model_navigation = Model()->table('navigation');
		// $model_navigation_diy = Model('navigation_diy_class');
		
		if (isset($_POST['op']) && $_POST['op'] == 'index') {
			$data['nav_type'] = $_POST['nav_type'];
			$data['nav_description'] = $_POST['nav_description'];
		}
		$condition_navigation['nav_type'] = 0; // 自定义链接
		// $condition_navigation['item_id'] = 1;
		$condition_navigation['if_approved'] = 1;
		
		$link_list = $model_navigation->where($condition_navigation)->select();
		// var_dump($link_list);
		Tpl::output('link_list', $link_list);
		Tpl::showpage('links', 'jumbotron_layout');
	}
	
	public function ajaxOp(){
		$request = $_SERVER['REQUEST_METHOD'];
		$output['if_ajax'] = false;
		if (!empty($request)) {
			switch ($request) {
				case 'GET':
					parse_str(file_get_contents("php://input"),$input);
					
					switch ($_GET['action']) {
						case 'urlCheck':
							$output['input'] = $_GET['nav_url'];
							$condition['nav_url'] = $_GET['nav_url'];
							$repeatSample = Model()->table('navigation')->where($condition)->find();
							//$output['sample'] = $repeatSample;
							if (!empty($repeatSample)) {
								$output['urlCheck_repeat'] = true;
							}
							break;
						case 'repeatCheck' : 
							$output['repeatCheck'] = $this->_repeatCheck();
							$output['if_repeat'] = $output['repeatCheck']['if_repeat'];
							//var_dump($output['repeatCheck']);
							break;
						default :
							// do nothing
					}
					$output['if_ajax'] = true;
					break;
				case 'POST':
					parse_str(file_get_contents("php://input"),$input);
					
					switch ($input['action']) {
						case 'checkURL':
							$output['repeatCheck'] = $this->_repeatCheck();
						case 'formSubmit':
							$output['formSubmit'] = $this->_formSubmit();
					}
					
					$output['if_ajax'] = true;
					break;
				default: 
					// nothing...
			}
		}
		echo json_encode($output, JSON_UNESCAPED_UNICODE);
	}
	
	private function _repeatCheck(){
		$flag = false;
		// $output['input'] = $_GET;
		// field set check 
		if (isset($_GET['field']) && !empty($_GET['field'])) {
			$flag = true;
		} else {
			$flag = false;
			$output['msg'] = 'missing field';
		}
		
		if ($flag && isset($_GET['val'])) {
			$condition[$_GET['field']] = $_GET['val'];
			$sample = Model()->table('navigation')->where($condition)->find();
			//$output['condition'] = $condition;
			//$output['sample'] = $sample;
			if (!empty($sample)){
				$output['if_repeat'] = true;
			} else {
				$output['if_repeat'] = false;
			}
		} else {
			$output['msg'] = 'repeat check failed';
		}
		return $output;
	}
	
	private function _formSubmit(){
		parse_str(file_get_contents("php://input"),$input);
		if (checkSeccode($input['nchash'], $input['passcode'])) {
			$output['input'] = $input;
			$data['nav_title'] = $input['nav_title'];
			$data['nav_url'] = $input['nav_url'];
			$data['nav_description'] = $input['nav_description'];
			$data['if_approved'] = 0; // -2, spam; -1, rejected; 0, wait for approval; 1, approved
			$data['item_id'] = 1; // 友情链接
			$data['nav_new_open'] = 1;
			$condition['nav_url'] = $data['nav_url'];
			$condition['nav_title'] = $data['nav_title'];
			$condition['_op'] = 'or';
			// repeat check
			$repeatSample = Model()->table('navigation')->where($condition)->find();
			if (!empty($repeatSample)) {
				$output['msg'] = 'repeat URL';
			} else {
				Model()->table('navigation')->insert($data);
				// check insert 
				$condition = array();
				$condition['nav_url'] = $data['nav_url'];
				$sample = Model()->table('navigation')->where($condition)->find();
				if(!empty($sample)) {
					$output['msg'] = 'submit successfuly';
				} else {
					$output['msg'] = 'insert failed';
				}
				
			}
		} else {
			$output['msg'] = 'passcode failed';
			$output['hash'] = $input['nchash'];
			$output['check'] = checkSeccode($input['nchash'], $input['passcode']);
		}
		return $output;
	}
}