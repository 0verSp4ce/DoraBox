<?php
	//code refence:https://github.com/c0ny1/xxe-lab/blob/master/php_xxe/
	header('Content-Type: text/html; charset=utf-8');
	include "../class/function.class.php";
	$account = "admin";
	$pwd = "admin";
	libxml_disable_entity_loader(false);
	$xmlfile = file_get_contents('php://input');
	try{
		$dom = new DOMDocument();
		$dom->loadXML($xmlfile, LIBXML_NOENT | LIBXML_DTDLOAD);
		$creds = simplexml_import_dom($dom);
		$username = $creds->username;
		$password = $creds->password;
	if($username == $account && $password == $pwd){
		$result = sprintf("<result><code>%d</code><msg>%s</msg></result>",1,$username);
	}else{
		$result = sprintf("<result><code>%d</code><msg>%s</msg></result>",0,$username);
	}	
	}catch(Exception $e){
		$result = sprintf("<result><code>%d</code><msg>%s</msg></result>",3,$e->getMessage());
	}
	echo $result;
?>