<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>歌曲信息</title>
</head>
<body>
<p>歌曲信息</p>
<table border="1">
    <tr>
        <th>歌曲编号</th>
        <th>专辑名</th>
        <th>歌曲风格</th>
        <th>语种</th>
        <th>歌手编号</th>
        <th>点播频率</th>
        <th>歌手姓名</th>
    </tr>
    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <td><?php echo ($vo["id"]); ?></td>
            <td><?php echo ($vo["zuanji"]); ?></td>
            <td><?php echo ($vo["style"]); ?></td>
            <td><?php echo ($vo["language"]); ?></td>
            <td><?php echo ($vo["man_id"]); ?></td>
            <td><?php echo ($vo["sequence"]); ?></td>
            <td><?php echo ($vo["singer"]); ?></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>

</body>
</html>