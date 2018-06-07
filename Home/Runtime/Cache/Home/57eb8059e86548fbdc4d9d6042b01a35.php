<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>前台</title>
    <script src="http://upcdn.b0.upaiyun.com/libs/jquery/jquery-2.0.2.min.js"></script>

</head>
<body>

<table border="1" align="center" valign="middle">
    <tr>
    <td>歌手</td>
    <td>歌曲</td>
    <td>专辑名称</td>
    <td>用户名</td>
    </tr>
<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <td><?php echo ($vo["man"]); ?></td>
            <td><?php echo ($vo["song"]); ?></td>
            <td><?php echo ($vo["zuanji"]); ?></td>
            <td><?php echo ($vo["user"]); ?></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>

<!--
<form action="/final_work2/index.php?s=/Home/Index/search" method="post">
    <input type="text" name="search">
    <input type="submit" value="搜索">
</form>

-->

</body>
</html>