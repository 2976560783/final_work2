<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<table border="1">
<tr>
    <td>id</td>
    <td>姓名</td>
    <td>性别</td>
    <td>地区</td>
    <td>公司</td>
</tr>
<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
        <td><?php echo ($vo["id"]); ?></td>
        <td><?php echo ($vo["name"]); ?></td>
        <td><?php echo ($vo["sex"]); ?></td>
        <td><?php echo ($vo["area"]); ?></td>
        <td><?php echo ($vo["company"]); ?></td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
</body>
</html>