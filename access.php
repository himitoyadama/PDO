<?php
$dnsinfo = 'mysql:host=localhost;dbname=database;charset=utf8';
$user = 'root';
$pw = 'password';

try{
    $pdo = new PDO($dnsinfo,$user,$pw);
    //var_dump('connected');
}catch(PDOException $e){
    exit();
}
?>
