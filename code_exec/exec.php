<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>DoraBox - 命令执行</title>
</head>
<body>
<?php
	include "../class/function.class.php";
	$p = new Func("GET","command");
	$p -> con_html();
	if (isset($_REQUEST['submit'])) {
		$command = $_REQUEST['command'];
		echo $p -> con_function('exec',$command);
	}
?>
</body>
</html>
