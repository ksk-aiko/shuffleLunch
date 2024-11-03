//TODO:viewとlogicを分離する
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
$groups = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // シャッフルする
    shuffle($employees);

    // グループ分けのロジック
    $totalEmployees = count($employees);
    $groups = [];

    if ($totalEmployees % 2 === 0) {
        // 偶数の場合は2人ずつのグループに分ける
        $groups = array_chunk($employees, 2);
    } else {
        // 奇数の場合は、最初の3人を1つのグループにし、残りを2人ずつに分ける
        $firstGroup = array_slice($employees, 0, 3);
        $remainingEmployees = array_slice($employees, 3);
        
        $groups[] = $firstGroup;
        if (!empty($remainingEmployees)) {
            $remainingGroups = array_chunk($remainingEmployees, 2);
            $groups = array_merge($groups, $remainingGroups);
        }
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
        <a href="">シャッフルランチ</a>
    </h1>
    <a href="./employee.php">社員を登録する</a>
    <form method="POST" action="">
        <button type="submit">シャッフルする</button>
    </form>

    <?php if (!empty($groups)): ?>
        <h2>グループ分け結果</h2>
        <?php foreach ($groups as $index => $group): ?>
            <h3>グループ <?php echo $index + 1; ?></h3>
            <ul>
                <?php foreach ($group as $employee): ?>
                    <li><?php echo htmlspecialchars($employee['name'], ENT_QUOTES, 'UTF-8'); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
