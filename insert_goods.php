<?php
require_once('./access.php');
$res = "";
if(isset($_POST['insert'])){
    $sql = "insert into goods value(?,?,?)";
    $stmt = $pdo->prepare($sql);
    $array = array($_POST['GoodsID'],$_POST['GoodsName'],$_POST['Price']);
    $res = $stmt->execute($array);
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>売上管理システム</title>
</head>
<body>
    <h1>商品マスタの登録</h1>
    <form action="" method="post">
        <label>GoodsID<input type="text" name="GoodsID" size="20" required></label>
        <label>GoodsName<input type="text" name="GoodsName" size="40" required></label>
        <label>Price<input type="text" name="Price" size="20" required></label>
        <input type="submit" name="insert" value="登録">
    </form>
    <?php echo $res;?>
</body>
</html>
