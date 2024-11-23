<?php

class EmployeeController extends Controller
{
    public function index()
    {

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


        include __DIR__ . '/../views/employee.php';
    }
}
