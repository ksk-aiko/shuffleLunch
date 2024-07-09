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
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>社員登録フォーム</title>
</head>
<body>
    <h1>社員登録フォーム</h1>
    <form action="employee_register.php" method="post">
        <div>
            <label for="name">名前：</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="email">メールアドレス：</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="department">部署：</label>
            <input type="text" id="department" name="department">
        </div>
        <div>
            <button type="submit">登録</button>
            <!-- 戻るボタン -->
            <button type="button" onclick="location.href='index.php'">戻る</button>
        </div>
    </form>
</body>
</html>