<?php
// データベースに接続
$mysqli = new mysqli('db', 'test_user', 'pass', 'test_database');
// 接続エラーの確認
if ($mysqli->connect_error) {
    throw new RuntimeException('mysqliの接続に失敗しました。', $mysqli->connect_error);
}


$result = $mysqli->query('SELECT * FROM employees');
if (!$result) {
    throw new RuntimeException('クエリの実行に失敗しました。', $mysqli->error);
}
$employees = $result->fetch_all(MYSQLI_ASSOC);

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    
    if (empty($name)) {
        $error = '社員名を入力してください。';
    } elseif (strlen($name) > 255) {
        $error = '社員名は255文字以内で入力してください。';
    } else {
        $stmt = $mysqli->prepare('INSERT INTO employees (name) VALUES (?)');
        if (!$stmt) {
            throw new RuntimeException('ステートメントの準備に失敗しました。', $mysqli->error);
        }
        $stmt->bind_param('s', $name);
        if (!$stmt->execute()) {
            throw new RuntimeException('ステートメントの実行に失敗しました。', $stmt->error);
        }
        $stmt->close();
        header('Location:./employee.php');
        exit;
    }
}

include __DIR__ . '/../views/employee.php';