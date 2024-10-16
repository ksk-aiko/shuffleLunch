<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
</head>
<body>
    <h1><?php echo $title; ?></h1>
    <!-- 社員登録ページへのリンクボタン -->
    <form action="./employee_registration_form.php" method="get">
        <button type="submit">社員を登録する</button>
    </form>
    <!-- 登録されている社員の一覧を表示 -->
     <h1>社員一覧</h1>
    <table border="1">
        <tr>
            <th>社員ID</th>
            <th>社員名</th>
        </tr>
</body>
</html>