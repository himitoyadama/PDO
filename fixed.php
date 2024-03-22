<?php
require_once('./db_config.php');
$res = "";
if(isset($_POST['insert'])){
    // Assuming you want to select a host_name based on some condition
    // For demonstration, let's assume you want to select a host_name where id matches a form input
    $host_name = $_POST['host_name'];
    $sql = "SELECT * FROM host WHERE host_name = :host_name";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':host_name' => $host_name]);
    $host = $stmt->fetch(PDO::FETCH_ASSOC);

    if($host){
        // Assuming customer_id and customer_name are also coming from the form
        $customer_id = $_POST['customer_id'];
        $customer_name = $_POST['customer_name'];
        $sql = "INSERT INTO customer (customer_id, customer_name, host_name) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$customer_id, $customer_name, $host_name]);
        $res = "Record inserted successfully.";
    } else {
        $res = "Host not found.";
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
