<?php
// require '../Application.php';

// $app = new Application();
// $app->run();

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
    <form action="../employee.php" method="post">
        <label for="name">社員名</label>
        <input type="text" name="name" id="name">
    <button type="submit">登録する</button>
    </form>

    <h2>社員の一覧</h2>
</body>
</html>
