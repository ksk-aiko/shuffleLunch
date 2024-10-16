<?php
// タイトルを設定
$title = "シャッフルランチサービス";
// viewsのindex.phpを読み込む
require_once('views/index.php');
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
