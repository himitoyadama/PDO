<?php
// データベース接続
$db = pdo_connect_mysql();

// 顧客IDを取得（この例では、セッションから取得しています）
$customerId = $_SESSION['customer_id'];

// ポイントの残高を確認
$stmt = $db->prepare("SELECT points FROM customers WHERE id = :customerId");
$stmt->execute([':customerId' => $customerId]);
$customer = $stmt->fetch(PDO::FETCH_ASSOC);

// ポイントの残高が0より上であることを確認
if ($customer['points'] > 0) {
    // ポイントの使用量を計算（この例では、全てのポイントを使用すると仮定しています）
    $pointsToUse = $customer['points'];

    // ポイントの使用を記録
    $stmt = $db->prepare("UPDATE customers SET points = points - :pointsToUse WHERE id = :customerId");
    $stmt->execute([':pointsToUse' => $pointsToUse, ':customerId' => $customerId]);

    echo "ポイントを使用しました。残高は0になりました。";
} else {
    echo "ポイントが0です。使用できません。";
}
