//hostテーブルから登録されたhost_nameを選択してcustomerテーブルのhost_nameに登録したい

<?php
require_once('./db_config.php');
$res = "";
if(isset($_POST['insert'])){
    $sql = "select * from host";
    $stmt = $pdo->prepare($sql);
    $array = array($_POST['host_name']);
    $res = $stmt->execute($array);  //error
    if($res){
        $sql = "insert into customer values(?,?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(null);
        $res = "<table>\n";
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $res .= "<tr><td>" .$row['customer_id'] ."</td><td>" .$row['customer_name']
                 ."</td><td>" .$row['host_name'] ."</td></tr>\n";
        }
        $res .= "</table>\n";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ホストを指名</title>
</head>
<body>
<h1>ホストを指名</h1>
    <form action="" method="post">
        <label>customer_id<input type="text" name="customer_id" size="20" required></label>
        <label>customer_name<input type="text" name="customer_name" size="40" required></label>
        <label>host_name<input type="text" name="host_name" size="20" required></label>
        <input type="submit" name="insert" value="登録">
    </form>
    <?php echo $res;?>
</body>
</html>
