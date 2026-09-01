<?php
$host = 'localhost';
$port = 8899;
$dbname = 'company';
$username = 'root';
$password = 'root';
$charset = 'utf8mb4';    //字符编码
$dsn = "mysql:host={$host};port={$port};dbname={$dbname};charset={$charset}";   //告诉PHP数据库在哪里，怎么连接
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];  //是一个数组，告诉pdo连接和查询时按照这些规则进行
$pdo = new PDO($dsn, $username, $password, $options);
try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    exit('データベースに接続できませんでした。');
}
echo 'データベース接続成功';