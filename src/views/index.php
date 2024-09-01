<!-- TODO:viewとlogicを分離し、画面を描画できるようにする -->
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
        <?php
        // mysqli使用して、データベースに接続
        $link = mysqli_connect('db', 'test_user', 'pass', 'test_database');
        if (mysqli_connect_errno()) {
            echo 'データベースに接続できませんでした';
        }
        // データベースから社員情報を取得
        $query = 'SELECT * FROM employees';
        if ($result = mysqli_query($link, $query)) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '</tr>';
            }
            mysqli_free_result($result);
        }
        mysqli_close($link);
        ?>
</body>
</html>