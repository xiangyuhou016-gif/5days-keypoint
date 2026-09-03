<?php
require_once 'db.php';

$id = $_GET['id'] ?? '';  //防止用户直接访问导致id为空
if(!ctype_digit($id))     //判断员工id是否为整数，不是则报错
    {exit('不正なアクセスです');
}

$id = (int)$id;
$sql = 'DELETE FROM `user` WHERE `id` = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
echo '削除に成功しました。';
echo '<br>';

?>



<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>削除結果</title>
</head>
<body>
<button type="button" onclick="location.href='list1.php'">一覧に戻る</button>
</body>
</html>
