<?php
require_once 'db.php';

$id = $_GET['id'] ?? '';
if(!ctype_digit($id)) //检查是否是整数
    {
        exit('不正なアクセスです');
}

$id = (int)$id;
$sql = 'SELECT `id`, `code`, `name`, `name_kana`, `gender` FROM `user` WHERE `id` = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);  //

/* 判断社员是否存在（防止用户直接访问自己输入id） */
if(!$user){
    exit('社員が見つかりません');
}

if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $code = trim($_POST['code'] ?? '');
        $name = trim($_POST['name'] ?? '');
        $name_kana = trim($_POST['name_kana'] ?? '');
        $gender = $_POST['gender'] ?? '';


        $sql = 'UPDATE `user` SET `code` = ?, `name` = ?, `name_kana` = ?, `gender` = ? WHERE `id` = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$code, $name, $name_kana, $gender, $id]);
    }
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>編集</title>
</head>
<body>
<div>編集</div>
<form method="post" action="./update.php">
    <!-- 社員ID -->
    <input type=hidden name="id" value="<?= $user['id'] ?>">
    <table border="1">
        <tr>
            <td>社員番号</td>
            <td><input type="text" name="code" value="<?= $user['code'] ?>" required></td>
        </tr>
        <tr>
            <td>社員名</td>
            <td><input type="text" name="name" value="<?= $user['name'] ?>" required></td>
        </tr>
        <tr>
            <td>社員名 かな</td>
            <td><input type="text" name="name_kana" value="<?= $user['name_kana'] ?>" required></td>
        </tr>
        <tr>
            <td>性別</td>
            <td>
                <input type="radio" name="gender" value="1" <?= $user['gender'] == 1 ? 'checked' : '' ?> required>男<br>
                <input type="radio" name="gender" value="2" <?= $user['gender'] == 2 ? 'checked' : '' ?> required>女<br>
                <input type="radio" name="gender" value="0" <?= $user['gender'] == 0 ? 'checked' : '' ?> required>選択しない
            </td>
        </tr>
    </table>
    <button type="button" onclick="location.href='./list1.php'">戻る</button>
    <button type="submit">保存</button>
</form>
</body>
</html>
