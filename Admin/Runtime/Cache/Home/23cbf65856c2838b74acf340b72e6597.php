<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台登录</title>
    <style>
        .kj
        {
            background:url(./Public/images/weather.png);
            background-size: 100% 100%;
        }
        .bun{
            height: 30px;
            background: #4CAF50;
            border: none;
            color: white;
            font-size: 16px;
        }
    </style>
</head>
<body class="kj">
<p style="width: 100%;height: 45px;display: block;line-height: 45px;text-align: center;">请登录<p>
<table width="1000" height="100" align="center">
    <form action="/final_work2/admin.php?s=/Home/Index/check" method="post">
        <tr>
            <td align="center" valign="middle">用户名：<input type="text" name="name"> </td>
        </tr>
        <tr>
            <td align="center" valign="middle">密码：<input type="password" name="password"> </td>
        </tr>
        <tr>
            <td align="center" vlign="middle">
                <input type="submit" value="登录" class="bun">
                <input type="reset" value="重置" class="bun">
            </td>
        </tr>
    </form>
</table>
</body>
</html>