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
        header('Location: /employee.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>シャッフルランチ</title>
</head>
<body>
    <h1>
        <a href="index.php">社員の登録</a>
    </h1>
    <form action="employee.php" method="post">
        <label for="name">社員名</label>
        <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($name ?? '', ENT_QUOTES, 'UTF-8'); ?>">
        <?php if ($error): ?>
            <p style="color: red;"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p>
        <?php endif; ?>
        <button type="submit">登録する</button>
    </form>

    <h2>社員の一覧</h2>
    <ul>
        <?php if (empty($employees)) : ?>
            <li>社員が登録されていません。</li>
        <?php else : ?>
            <?php foreach ($employees as $employee) : ?>
                <li><?php echo htmlspecialchars($employee['name'], ENT_QUOTES, 'UTF-8'); ?></li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</body>
</html>