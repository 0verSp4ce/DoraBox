<?php
$uploaddir = 'upload/';
if (isset($_POST['submit'])) {
    if (file_exists($uploaddir)) {
        if (($_FILES['upfile']['type'] == 'image/gif') || ($_FILES['upfile']['type'] == 'image/jpeg') ||
            ($_FILES['upfile']['type'] == 'image/png') || ($_FILES['upfile']['type'] == 'image/bmp')
        ) {
            if (move_uploaded_file($_FILES['upfile']['tmp_name'], $uploaddir . '/' . $_FILES['upfile']['name'])) {
                echo '文件上传成功，保存于：' . $uploaddir . $_FILES['upfile']['name'] . "\n";
            }
        } else {
            echo '文件类型不正确，请重新上传！' . "\n";
        }
    } else {
        exit($uploaddir . '文件夹不存在,请手工创建！');
    }
    //print_r($_FILES);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="content-language" content="zh-CN"/>
    <title>DoraBox - 文件上传漏洞演示脚本--MIME验证实例</title>
<body>
<h3>DoraBox - 文件上传漏洞演示脚本--MIME验证实例</h3>

<form action="" method="post" enctype="multipart/form-data" name="upload">
    请选择要上传的文件：<input type="file" name="upfile"/>
    <input type="submit" name="submit" value="上传"/>
</form>
</body>
</html>
