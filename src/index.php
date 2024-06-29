<?php
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
</body>
</html>
