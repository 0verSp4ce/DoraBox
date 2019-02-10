<?php
	if (@$_SERVER['HTTP_ORIGIN']){
		header("Access-Control-Allow-Origin: ".$_SERVER['HTTP_ORIGIN']);
	}else{
		header("Access-Control-Allow-Origin: *");
	}
	header("Access-Control-Allow-Headers: X-Requested-With");
	header("Access-Control-Allow-Credentials: true");
	header("Access-Control-Allow-Methods: PUT,POST,GET,DELETE,OPTIONS");

	$info = array('username' => 'Vulkey_Chen', 'mobilephone' => '13188888888', 'email' => 'admin@gh0st.cn', 'address' => '中华人民共和国', 'sex' => 'Cool Man');
	echo json_encode($info);
?>