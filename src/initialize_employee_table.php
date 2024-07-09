<?php
    $mysqli = new mysqli('db', 'test_user', 'pass', 'test_database');
    if ($mysqli -> connect_error) {
        throw new RuntimeException('mysqliの接続に失敗しました。', $mysqli->connect_error);
    }

    $mysqli->query('DROP TABLE IF EXISTS employees');

    $createTableSql = 'CREATE TABLE employees (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
    )';

    $mysqli->query($createTableSql);

    $mysqli->close();
?>