<?php
$uploaddir = 'upload/';
if (isset($_POST['submit'])) {
    if (file_exists($uploaddir)) {
        $deny_ext = array('.asp', '.php', '.aspx', '.jsp');
        //echo strrchr($_FILES['upfile']['name'], '.');
        $file_ext = strrchr($_FILES['upfile']['name'], '.');
        //echo $file_ext;
        if (!in_array($file_ext, $deny_ext)) {
            if (move_uploaded_file($_FILES['upfile']['tmp_name'], $uploaddir . '/' . $_FILES['upfile']['name'])) {
                echo '文件上传成功，保存于：' . $uploaddir . $_FILES['upfile']['name'] . "\n";
            }
        } else {
            echo '此文件不允许上传' . "\n";
        }
    } else {
        exit($uploaddir . '文件夹不存在,请手工创建！');
    }
}
?>
<html>
<head>
    <meta charset="utf-8" />
    <title>DoraBox - 文件上传漏洞演示脚本--服务端扩展名验证实例</title>
<body>
<h3>DoraBox - 文件上传漏洞演示脚本--服务端扩展名验证实例</h3>

<form action="" method="post" enctype="multipart/form-data" name="upload">
    请选择要上传的文件：<input type="file" name="upfile"/>
    <input type="submit" name="submit" value="上传"/>
</form>
</body>
</html>
