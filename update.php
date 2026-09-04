<?php
require_once 'db.php';

if($_SERVER['REQUEST_METHOD'] !== 'POST')  //防止用户直接进入界面导致数值均没有的报错
    {
        exit('不正なアクセスです');
}

$id = $_POST['id'] ?? '';
if(!ctype_digit($id))     //判断员工id是否为整数，不是则报错
    {exit('不正なアクセスです');
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $code = trim($_POST['code'] ?? '');  //从post数据中取得名字叫code的数据并保存到code变量中;trim:如果输入前后有空格则删除空格
    $name = trim($_POST['name'] ?? '');
    $name_kana = trim($_POST['name_kana'] ?? '');
    $gender = $_POST['gender'] ?? ''; 



    /* 更新员工信息 */
    $sql = 'UPDATE `user` SET `code` = ?, `name` = ?, `name_kana` = ?, `gender` = ? WHERE `id` = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$code, $name, $name_kana, $gender, $id]);
    echo '編集に成功しました';
    echo '<br>';
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>編集結果</title>
</head>
<body>
<button type="button" onclick="location.href='./list1.php'">一覧に戻る</button>
</body>
</html>
