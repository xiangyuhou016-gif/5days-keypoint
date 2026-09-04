<?php
require_once 'db.php';
$code = trim($_GET['code'] ?? '');  //从post数据中取得名字叫code的数据并保存到code变量中;trim:如果输入前后有空格则删除空格
$name = trim($_GET['name'] ?? '');
$name_kana = trim($_GET['name_kana'] ?? '');
$gender = $_GET['gender'] ?? '';
$sql = 'SELECT `id`, `code`, `name`, `name_kana`, `gender` FROM `user`';
$where = [];
$params = [];
if($code !== '')
    {
        $where[] = '`code` = ?'; 
        $params[] = $code;
}
if($name !== '')
    {
        $where[] = '`name` LIKE ?'; 
        $params[] = '%' . $name . '%';
}
if($name_kana !== '')
    {
        $where[] = '`name_kana` LIKE ?'; 
        $params[] = '%' . $name_kana . '%';
}
if($gender !== '')
    {
        if (!in_array($gender, ['0', '1', '2'], true)) 
            {
                $where[] = '`name` LIKE ?'; 
                $params[] = '%' . $name . '%';
        }
}
if (count($where) > 0) {
    $sql .= ' WHERE ' . implode(' AND ', $where);
}
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
function getGenderName($gender) { if ($gender == 1) { return '男性'; } if ($gender == 2) { return '女性'; } return '不明'; }


?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>検索結果</title>
</head>
<body>
<div>検索結果</div>
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
    <?php if (count($users) === 0): ?> 
        <tr> 
            <td colspan="8"> 該当する社員が見つかりません </td> 
        </tr>
    <?php else: ?>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user['code'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($user['name_kana'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars(getGenderName($user['gender']), ENT_QUOTES, 'UTF-8') ?></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
    
</table>
<button type="button" onclick="location.href='./search_form.php'">戻る</button>
<button type="button" onclick="location.href='./list1.php'">一覧に戻る</button>
</body>
</html>
