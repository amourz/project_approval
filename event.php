<?php
require '../source/class/class_core.php';
$discuz = &discuz_core::instance();
$discuz -> init();
$act = $_POST['act'];

switch($act) {
	case 'new' :
		
		$date=time();
		$pic = $_POST['pic'];
		$name = $_POST['name'];
		$people = intval($_POST['people']);
		$s_time = $_POST['s_time'];
		$e_time = $_POST['e_time'];
		$place = $_POST['place'];
		$s_chief = $_POST['s_chief'];
		$crew = $_POST['crew'];
		$cash = floatval($_POST['cash']);
		$manager = intval($_POST['manager']);
		$file = 'upload/' . md5(time()) . '.jpg';
		$url = explode(',', $pic);
		file_put_contents($file, base64_decode($url[1]));

		$arr = array('name' => $name, 'people' => $people, 's_time' => $s_time, 'e_time' => $e_time, 'place' => $place, 's_chief' => $s_chief, 'crew' => $crew, 'cash' => $cash, 'manager' => $manager, 
		'pic' => $file, 'date' => $date);
		$id = DB::insert('project_approval', $arr, 'id');
		$status = ($id) ? true : false;
		$message = ($id) ? '提交成功，请等待审核' : '数据加载失败，请检查网络重试!';
		echo json_encode(array('status' => $status, 'msg' => $message));
		break;
}
?>