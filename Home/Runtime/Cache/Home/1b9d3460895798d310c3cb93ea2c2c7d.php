<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="http://upcdn.b0.upaiyun.com/libs/jquery/jquery-2.0.2.min.js"></script>
    <script>
        function deleteSong(id) {
            $.ajax({
                url:"/final_work2/index.php?s=/Home/Index/delete",
                data:{id:id,
                    table:'collect_song'
                },
                type:'POST',
                datatype:'JSON',
                success:function(result){
                    $("#showSong").html(result);
                }
            })
        }
    </script>
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
        <th>用户</th>
    </tr>
    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <td><?php echo ($vo["id"]); ?></td>
            <td><?php echo ($vo["zuanji"]); ?></td>
            <td><?php echo ($vo["style"]); ?></td>
            <td><?php echo ($vo["language"]); ?></td>
            <td><?php echo ($vo["man_id"]); ?></td>
            <td><?php echo ($vo["sequence"]); ?></td>
            <td><?php echo ($vo["singer"]); ?></td>
            <td><?php echo ($vo["user"]); ?></td>
            <td><button onclick="deleteSong(<?php echo ($vo["id"]); ?>)" >删除</button></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
</body>
</html>