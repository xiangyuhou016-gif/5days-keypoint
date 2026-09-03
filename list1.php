<?php require_once 'db.php';  //引用一次db.php
$sql = 'SELECT * FROM `user`';  //sql=读取user
$stmt = $pdo->query($sql);  //把$sql里的SQL交给MySQL执行
$users = $stmt->fetchAll();  //把查询结果全部取出来

function genderLabel($gender) {  //判断性别的函数
    if ($gender == 1) {
        return '男性';
    }

    if ($gender == 2) {
        return '女性';
    }

    return '不明';
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>一覧</title>
</head>
<body>
<button type="button" onclick="location.href='./insert_form.php'">追加</button>
<div>社員一覧表</div>
<table border="1">
    <tr>
        <td>社員番号</td>
        <td>社員名</td>
        <td>社員名(かな)</td>
        <td>性別</td>
        <td>登録日</td>
        <td>更新日</td>
        <td>編集</td>
        <td>削除</td>
    </tr>

    <?php foreach ($users as $user): ?>

        <tr>
            <td>
                <?= htmlspecialchars($user['code'], ENT_QUOTES, 'UTF-8') //htmlspecialchars:把特殊字符转换成文字,把双引号也一起转义，用UTF-8的方式?>  
            </td>
            <td>
                <?= htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8') ?>
            </td>
            <td>
                <?= htmlspecialchars($user['name_kana'], ENT_QUOTES, 'UTF-8') ?>
            </td>
            <td>
                <?= htmlspecialchars(genderLabel($user['gender']), ENT_QUOTES, 'UTF-8') ?>
            </td>
            <td>
                <?= htmlspecialchars($user['created_at'], ENT_QUOTES, 'UTF-8') ?>
            </td>
            <td>
                <?= htmlspecialchars($user['updated_at'], ENT_QUOTES, 'UTF-8') ?>
            </td>
            <td>
                <button type="button" onclick="location.href='./update_form.php?id=<?= $user['id'] ?>'">編集</button>
            </td>
            <td>
                <button type="button" onclick="location.href='./delete.php?id=<?= $user['id'] ?>'">削除</button>  
            </td>
        </tr>

    <?php endforeach; ?>

    
</table>

</body>
</html> 