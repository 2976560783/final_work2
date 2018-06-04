<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录</title>
</head>
<body>
<p style="width: 100%;height: 45px;display: block;line-height: 45px;text-align: center;">欢迎使用本系统</p>
<table width="990" height="98"  align="center">

<tr>
    <td  align="center" valign="middle">
        可以选择登录或者直接按登录按钮登录
    </td>
</tr>
<form action="/final_work2/index.php?s=/Home/Index/check" method="post">
    <tr>
        <td  align="center" valign="middle">
            用户名:<input type="text" name="name">
        </td>
    </tr>
    <tr>
        <td  align="center" valign="middle">
            密码： <input type="password" name="password">
        </td>
    </tr>
    <td  align="center" valign="middle">
        <input type="submit" value="登录">
        <input type="reset" value="重置">
    </td>
    <td>
        <a href="/final_work2/index.php?s=/Home/Index/regist">注册</a>
    </td>
    </tr>
</form>

</table>


</body>
</html>