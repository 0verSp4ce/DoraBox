<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>支付页面</title>
</head>
<body>
<?php 
include('../conn.php');
$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$sql = "SELECT rest FROM account";
$rest = intval($db->query($sql)->fetch_assoc()['rest']);
$sql = "SELECT own FROM account";
$own = intval($db->query($sql)->fetch_assoc()['own']);
echo "
<form action='' method='post'>
    余额：{$rest}元
    <br>
    支付<input type='text' name='money'>元给林晨去买辣条<br>
    <input type='submit' value='支付'><br>
    林晨现在手里有{$own}元
</form>
";
if ($_POST){
    $money = intval($_POST['money']);
    if($money <= $rest) {
        $sql = "UPDATE account SET rest=rest-".$money;
        $db->query($sql);
        $sql = "UPDATE account SET own=own+".$money;
        $db->query($sql);
        echo "<script>alert('支付成功');window.location.href=this.location.href</script>";
    } else {
        echo "支付失败，可能是因为您的余额不足。";
    }
}
?>
</body>
</html>
