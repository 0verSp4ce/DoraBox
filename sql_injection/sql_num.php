<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>DoraBox - SQLi_NUM</title>
</head>
<body>
<?php
include('../conn.php');
include "../class/function.class.php";
$p = new Func("GET","id");
$p -> con_html();
if (isset($_REQUEST['submit'])) {
	$id = empty($_REQUEST['id']) ? 1 : $_REQUEST['id'];
	$row = $p -> con_mysql("news","id",$id,"num");
	$id = htmlspecialchars($id);
	echo "<hr>SQLi语句：SELECT * FROM news WHERE id = <font color='red'>{$id}</font>";
	echo "<hr>";
	echo "<center><table border='2'><tr><td>标题</td><td>内容</td></tr><tr><td>{$row['title']}</td><td>{$row['content']}</td></tr></table></center>";
}
?>
</body>
</html>
