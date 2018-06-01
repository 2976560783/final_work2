<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册</title>
</head>
<body>
<p>
    请填写注册信息
</p>
<form action="/final_work2/index.php?s=/Home/Index/add" method="post">
    <table>
        <tr>
            <td>用户名:<input type="text" name="name"></td>
        </tr>
        <tr>
            <td>
                密码：         <input type="password" name="password">
            </td>
        </tr>
        <tr>
            <td><input type="submit" value="注册"></td>
            <td><input type="reset" value="重置"></td>
        </tr>
    </table>
</form>
</body>
</html>