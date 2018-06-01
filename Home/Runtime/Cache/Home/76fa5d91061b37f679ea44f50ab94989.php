<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>前台主页</title>
</head>
<body>
<table>
    <tr>
        <th>欢迎使用本系统</th>
    </tr>
    <tr>
        <td>
            可以选择登录或者直接按登录按钮登录
        </td>
    </tr>
    <form action="/final_work2/index.php?s=/Home/Index/check" method="post">
    <tr>
        <td>
            用户名:<input type="text" name="name">
        </td>
    </tr>
    <tr>
        <td>
            密码： <input type="password" name="password">
        </td>
    </tr>
        <td>
            <input type="submit" value="登录">
            <input type="reset" value="重置">
        </td>
        <td>
            <a href="<?php echo U('Index/login');?>">注册</a>
        </td>
    </tr>
    </form>

</table>

</body>
</html>