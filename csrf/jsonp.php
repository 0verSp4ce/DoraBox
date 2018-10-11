<?php
	include "../class/function.class.php";
	$reqMethod = "GET";
	$reqValue = "callback";
	$p = new Func($reqMethod, $reqValue);
	$info = array('username' => 'Vulkey_Chen', 'mobilephone' => '13188888888', 'email' => 'admin@gh0st.cn', 'address' => '中华人民共和国', 'sex' => 'Cool Man');
	if(!@$_GET['callback']){
		echo $p -> con_function('json_encode',$info);
	}else{
		$callback = htmlspecialchars($_GET['callback']);
		echo "{$callback}(" . $p -> con_function('json_encode',$info) . ")";
	}
?>