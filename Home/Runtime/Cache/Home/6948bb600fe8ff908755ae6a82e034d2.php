<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>专辑信息</title>
</head>
<body>
<p>专辑信息</p>
<table border="1">
    <tr>
        <td>专辑编号</td>
        <td>发行日期</td>
        <td>歌手名</td>
    </tr>
<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
        <td><?php echo ($vo["id"]); ?></td>
        <td><?php echo ($vo["date"]); ?></td>
        <td><?php echo ($vo["man_name"]); ?></td>
        <td><a href="<?php echo U('collect','key=zuanji&value='.$vo['zuanji']);?>">收藏</a></td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
</body>
</html>