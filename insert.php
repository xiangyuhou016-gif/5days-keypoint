<?php

require_once 'db.php';

if($_SERVER['REQUEST_METHOD'] !== 'POST')  //防止用户直接进入insert界面导致数值均没有的报错
    {
        exit('不正なアクセスです');
}

$code = trim($_POST['code']);  //从post数据中取得名字叫code的数据并保存到code变量中;trim:如果输入前后有空格则删除空格
$name = trim($_POST['name']);
$name_kana = trim($_POST['name_kana']);
$gender = $_POST['gender'] ?? 0;  //如果用户不选择性别，此行不存在数值会报错。空值合并运算符：如果左边存在，就使用左边，如果不存在，就使用右边

if($code === '' || $name === '' || $name_kana === '')  //判断输入中是否存在空格
    {
        exit('入力してください');
}

/* 判断社员番号是否重复 */
$sql = 'SELECT `id` FROM `user` WHERE `code` = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$code]);
if($stmt->fetch())
    {
        exit('社員番号がすでに存在します');
}

/* 写入社员信息 */
$sql = 'INSERT INTO `user`(`code`, `name`, `name_kana`, `gender`) VALUES(?, ?, ?, ?)';  //sql命令：写入user这些内容，值为？？？？，这里防止sql注入风险，防止用户输入的内容被错误的当成sql指令执行
$stmt = $pdo->prepare($sql);  //让数据库连接$pdo准备一条sql
$stmt->execute([$code, $name, $name_kana, $gender]);  //告诉pdo上面的空占符分别填写什么
echo '追加に成功しました';

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>追加結果</title>
</head>
<body>
<button type="button" onclick="location.href='./list1.php'">一覧に戻る</button>
</body>
</html>
