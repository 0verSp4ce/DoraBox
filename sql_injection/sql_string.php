<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>DoraBox - SQLi_STRING</title>
</head>
<body>
<?php
include('../conn.php');
include "../class/function.class.php";
$p = new Func("GET","title");
$p -> con_html();
if (isset($_REQUEST['submit'])) {
	$title = empty($_REQUEST['title']) ? "DoraBox" : $_REQUEST['title'];
	$row = $p -> con_mysql("news","title",$title,"string");
	$title = htmlspecialchars($title);
	echo "<hr>SQLi语句：SELECT * FROM news WHERE title='<font color='red'>{$title}</font>'";
	echo "<hr>";
	echo "<center><table border='2'><tr><td>标题</td><td>内容</td></tr><tr><td>{$row['title']}</td><td>{$row['content']}</td></tr></table></center>";
}
?>
</body>
</html>
