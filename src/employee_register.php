<?php

// データベースに接続
$mysqli = new mysqli('db', 'test_user', 'pass', 'test_database');
// 接続エラーの確認
if ($mysqli->connect_error) {
    throw new RuntimeException('mysqliの接続に失敗しました。', $mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $mysqli->prepare('INSERT INTO employees (name) VALUES (?)');
    $stmt->bind_param('s', $_POST['name']);
    $stmt->execute();
    $stmt->close();
}
// viewsのemployee_register.phpを読み込む
require_once('views/employee_register.php');
?>
