<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Import extends CI_Controller {

    public function __construct(){
        parent::__construct();
		$this->common_model->checkpurview();
		$this->load->helper('download'); 
    }
	
	public function index() {
		$dir = './data/upfile/' . date('Ymd') . '/';
		//$path = '/data/upfile/' . date('Ymd') . '/';
		$err = json_encode(array('url' => '', 'title' => '', 'state' => '请登录'));
		$info = upload('resume_file', $dir);
		if (is_array($info) && count($info) > 0) {
			//$array = array('url' => $path . $info['file'], 'title' => $path . $info['file'], 'state' => 'SUCCESS');
			print_r($info);
			die();
		} else {
			die($err);
		}
	}
	
	//客户
	public function downloadtemplate1() {
		$info = read_file('./data/download/customer.xls');
		$this->common_model->logs('下载文件名:customer.xls');
		force_download('customer.xls', $info); 
	}
	
	//供应商
	public function downloadtemplate2() {
		$info = read_file('./data/download/vendor.xls');
		$this->common_model->logs('下载文件名:vendor.xls');
		force_download('vendor.xls', $info); 
	}
	
	//商品
	public function downloadtemplate3() {
		$info = read_file('./data/download/goods.xls');
		$this->common_model->logs('下载文件名:goods.xls');
		force_download('goods.xls', $info);  
	}
	
	//客户导入
	public function findDataImporter() {
	    $fn = (isset($_SERVER['HTTP_X_FILENAME']) ? $_SERVER['HTTP_X_FILENAME'] : false);
		 print_r($fn);
		die();
		if ($fn) {
			file_put_contents(
				'uploads/' . $fn,
				file_get_contents('php://input')
			);
			echo "http://119.10.11.187:82/AAAUPIMG/1/uploads/$fn";
			exit();
		}
	    print_r($_FILES);
		die();
//	    $dir = './data/upfile/' . date('Ymd') . '/';
//		//$path = '/data/upfile/' . date('Ymd') . '/';
//		$err = json_encode(array('url' => '', 'title' => '', 'state' => '请登录'));
//		$info = upload('resume_file', $dir);
//		if (is_array($info) && count($info) > 0) {
//			//$array = array('url' => $path . $info['file'], 'title' => $path . $info['file'], 'state' => 'SUCCESS');
//			print_r($info);
//			die();
//		} else {
//			die($err);
//		}
        die('{"status":200,"msg":"success","data":{"items":[{"id":1294598139109696,"date":"2015-04-25 14:41:35","uploadPath"
:"customer_20150425024011.xls","uploadName":"customer_20150425024011.xls","resultPath":"uploadfiles/88887901
/customer_20150425024011.xls","resultName":"customer_20150425024011.xls","resultInfo":"商品导入完毕。<br/>商
品一共：0条数据，成功导入：0条数据，失败：0条数据。<br/>供应商导入完毕。<br/>供应商一共：0条数据，成功导入：0条数据，失败：0条数据。<br/>客户导入完毕。<br/>客户一共：10条数
据，成功导入：10条数据，失败：0条数据。<br/>","status":2,"spendTime":0},{"id":1294598139109659,"date":"2015-04-25 14:40
:49","uploadPath":"customer_20150425024011.xls","uploadName":"customer_20150425024011.xls","resultPath"
:"uploadfiles/88887901/customer_20150425024011.xls","resultName":"customer_20150425024011.xls","resultInfo"
:"商品导入完毕。<br/>商品一共：0条数据，成功导入：0条数据，失败：0条数据。<br/>供应商导入完毕。<br/>供应商一共：0条数据，成功导入：0条数据，失败：0条数据。<br/>客户导入完毕
。<br/>客户一共：10条数据，成功导入：10条数据，失败：0条数据。<br/>","status":2,"spendTime":0},{"id":1294597559113847,"date":"2015-04-17
 16:54:39","uploadPath":"蓝港新系统xls.xls","uploadName":"蓝港新系统xls.xls","resultPath":"uploadfiles/88887901
/蓝港新系统xls.xls","resultName":"蓝港新系统xls.xls","resultInfo":"商品导入完毕。<br/>商品一共：557条数据，成功导入：0条数据，失败：557条数据
。<br/>(请检查模板是否匹配，建议重新下载模板导入)<br/>供应商导入完毕。<br/>供应商一共：0条数据，成功导入：0条数据，失败：0条数据。<br/>客户导入完毕。<br/>客户一共：0条数
据，成功导入：0条数据，失败：0条数据。<br/>","status":2,"spendTime":0}],"totalsize":3}}');  
	    die('{"status":200,"msg":"success"}');  
	}
	
	//上传文件
	public function upload() {
		die('{"status":200,"msg":"success","data":{"items":[{"id":1294598139109696,"date":"2015-04-25 14:41:35","uploadPath"
:"customer_20150425024011.xls","uploadName":"customer_20150425024011.xls","resultPath":"uploadfiles/88887901
/customer_20150425024011.xls","resultName":"customer_20150425024011.xls","resultInfo":"商品导入完毕。<br/>商
品一共：0条数据，成功导入：0条数据，失败：0条数据。<br/>供应商导入完毕。<br/>供应商一共：0条数据，成功导入：0条数据，失败：0条数据。<br/>客户导入完毕。<br/>客户一共：10条数
据，成功导入：10条数据，失败：0条数据。<br/>","status":2,"spendTime":0},{"id":1294598139109659,"date":"2015-04-25 14:40
:49","uploadPath":"customer_20150425024011.xls","uploadName":"customer_20150425024011.xls","resultPath"
:"uploadfiles/88887901/customer_20150425024011.xls","resultName":"customer_20150425024011.xls","resultInfo"
:"商品导入完毕。<br/>商品一共：0条数据，成功导入：0条数据，失败：0条数据。<br/>供应商导入完毕。<br/>供应商一共：0条数据，成功导入：0条数据，失败：0条数据。<br/>客户导入完毕
。<br/>客户一共：10条数据，成功导入：10条数据，失败：0条数据。<br/>","status":2,"spendTime":0},{"id":1294597559113847,"date":"2015-04-17
 16:54:39","uploadPath":"蓝港新系统xls.xls","uploadName":"蓝港新系统xls.xls","resultPath":"uploadfiles/88887901
/蓝港新系统xls.xls","resultName":"蓝港新系统xls.xls","resultInfo":"商品导入完毕。<br/>商品一共：557条数据，成功导入：0条数据，失败：557条数据
。<br/>(请检查模板是否匹配，建议重新下载模板导入)<br/>供应商导入完毕。<br/>供应商一共：0条数据，成功导入：0条数据，失败：0条数据。<br/>客户导入完毕。<br/>客户一共：0条数
据，成功导入：0条数据，失败：0条数据。<br/>","status":2,"spendTime":0}],"totalsize":3}}');  
	}
	
 
	
	 
	
	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */