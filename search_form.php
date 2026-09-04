<?php
$code = $_GET['code'] ?? '';
$name = $_GET['name'] ?? '';
$name_kana = $_GET['name_kana'] ?? '';
$gender = $_GET['gnder'] ?? '';
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>検索</title>
</head>
<body>
<div>検索</div>
<form action="./search.php" method="get">
    <table border="1">
        <tr>
            <td>社員番号</td>
            <td><input type="text" name="code" value="<?= htmlspecialchars($code, ENT_QUOTES, 'UTF-8') ?>"></td>
        </tr>
        <tr>
            <td>社員名</td>
            <td><input type="text" name="name" value="<?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>"></td>
        </tr>
        <tr>
            <td>社員名(かな)</td>
            <td><input type="text" name="name_kana" value="<?= htmlspecialchars($name_kana, ENT_QUOTES, 'UTF-8') ?>"></td>
        </tr>
        <tr>
            <td>性別</td>
            <td>
                <input type="radio" name="gender" value="1" <?= $gender === '1' ? 'checked' : '' ?>required>男性<br>
                <input type="radio" name="gender" value="2" <?= $gender === '2' ? 'checked' : '' ?>required>女性<br>
                <input type="radio" name="gender" value="0" <?= $gender === '0' ? 'checked' : '' ?>required>不明
            </td>
        </tr>
    </table>
    <button type="button" onclick="location.href='./list1.php'">戻る</button>
    <button type="submit">検索</button>
</form>
</body>
</html>
