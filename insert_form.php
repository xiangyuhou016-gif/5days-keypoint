<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>追加</title>
</head>
<body>
<div>追加</div>
<form method="post" action="./insert.php">
    <table border="1">
        <tr>
            <td>社員番号</td>
            <td><input type="text" name="code"></td>
        </tr>
        <tr>
            <td>社員名</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>社員名(かな)</td>
            <td><input type="text" name="name_kana"></td>
        </tr>
        <tr>
            <td>性別</td>
            <td>
                <!-- name为相同的一组，而radio按钮只能选择一个 -->
                <input type="radio" name="gender" value="1">男性<br>  
                <input type="radio" name="gender" value="2">女性<br>
                <input type="radio" name="gender" value="0">選択しない
            </td>
        </tr>
    </table>
    <button type="button" onclick="location.href='./list1.php'">戻る</button>
    <button type="submit">追加</button>
</form>
</body>
</html>
