<?php
// データベースに接続
$mysqli = new mysqli('db', 'test_user', 'pass', 'test_database');
// 接続エラーの確認
if ($mysqli->connect_error) {
    throw new RuntimeException('mysqliの接続に失敗しました。', $mysqli->connect_error);
}
// タイトルを設定
$title = "シャッフルランチサービス";
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
</head>
<body>
    <h1><?php echo $title; ?></h1>
    <!-- 社員登録ページへのリンクボタン -->
    <form action="employee_registration.php" method="get">
        <button type="submit">社員を登録する</button>
    </form>
    <!-- 登録されている社員の一覧を表示 -->
     <h1>社員一覧</h1>

</body>
</html>
