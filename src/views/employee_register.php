
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
            <button type="submit">登録</button>
            <!-- 戻るボタン -->
            <button type="button" onclick="location.href='index.php'">戻る</button>
        </div>
    </form>
</body>
</html>