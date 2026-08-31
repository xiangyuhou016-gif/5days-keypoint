<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>編集</title>
</head>
<body>
<div>編集</div>
<form>
    <input type=hidden name="id" value="">
    <table border="1">
        <tr>
            <td>社員番号</td>
            <td><input type="text" name="code" value="1" required></td>
        </tr>
        <tr>
            <td>社員名</td>
            <td><input type="text" name="name" value="平川勇太" required></td>
        </tr>
        <tr>
            <td>社員名 かな</td>
            <td><input type="text" name="name_kana" value="ひらかわゆうた" required></td>
        </tr>
        <tr>
            <td>性別</td>
            <td>
                <input type="radio" name="gender" value="1" checked required>男<br>
                <input type="radio" name="gender" value="2" required>女<br>
                <input type="radio" name="gender" value="0" required>選択しない
            </td>
        </tr>
    </table>
    <button type="button" onclick="location.href=''">戻る</button>
    <button type="submit">保存</button>
</form>
</body>
</html>
