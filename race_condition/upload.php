<?php
show_source(__FILE__);
$allowtype = array("gif","png","jpg");
$size = 10000000;
$path = "./uploads/";
$filename = $_FILES['myfile']['name'];

if (is_uploaded_file($_FILES['myfile']['tmp_name'])){
    if (!move_uploaded_file($_FILES['myfile']['tmp_name'],$path.$filename)){
        die("error:can not move!");
    }   
} else {
    die("error:not an upload file！");
}

$newfile = $path.$filename;
echo "file upload success.file path is: ".$newfile."\n<br />";

if ($_FILES['myfile']['error'] > 0){
    unlink($newfile);
    die("Upload file error: ");
}

$ext = array_pop(explode(".",$_FILES['myfile']['name']));
if (!in_array($ext,$allowtype)){
    unlink($newfile);
    die("error:upload the file type is not allowed，delete the file！");
}
?>
