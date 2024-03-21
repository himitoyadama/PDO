<?php
require_once('./access.php');
$res = "";
if(isset($_POST['select'])){
    $sql = 'select * from goods where GoodsID=?';
        $stmt = $pdo->prepare($sql);
        $array = array($_POST['GoodsID']);
        $stmt->execute($array);
        $res = "<table>\n";
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $res .= "<tr><td>" .$row['GoodsID'] ."</td><td>" .$row['GoodsName']
            ."</td></tr>\n";
        }
        $res .= "</table>\n"; 
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>商品マスタの選択</h1>
    <form action="" method="post">
        <label><input type="text" name="GoodsID" size="20" required></label>
        <input type="submit" name="select" value="表示">
    </form>
    <?php echo $res;?>
</body>
</html>
