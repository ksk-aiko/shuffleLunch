<?php

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>社員登録フォーム</title>
</head>
<body>
    <h1>社員登録フォーム</h1>
    <form action="register_employee.php" method="post">
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
        </div>
    </form>
</body>
</html>