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
    <style type="text/css">
        #customers
        {
            font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
            width:100%;
            border-collapse:collapse;
        }

        #customers td, #customers th
        {
            font-size:1em;
            border:1px solid #98bf21;
            padding:3px 7px 2px 7px;
        }

        #customers th
        {
            font-size:1.1em;
            text-align:left;
            padding-top:5px;
            padding-bottom:4px;
            background-color:#A7C942;
            color:#ffffff;
        }

        #customers tr.alt td
        {
            color:#000000;
            background-color:#EAF2D3;
        }
    </style>
</head>
<body>
<p>歌曲信息</p>
<table border="1" id="customers">
    <tr>
        <th style="font-family:arial;color:blue;font-size:20px;">歌曲编号</th>
        <th style="font-family:arial;color:blue;font-size:20px;">专辑名</th>
        <th style="font-family:arial;color:blue;font-size:20px;">歌曲风格</th>
        <th style="font-family:arial;color:blue;font-size:20px;">语种</th>
        <th style="font-family:arial;color:blue;font-size:20px;">歌手编号</th>
        <th style="font-family:arial;color:blue;font-size:20px;">点播频率</th>
        <th style="font-family:arial;color:blue;font-size:20px;">歌手姓名</th>
        <th style="font-family:arial;color:blue;font-size:20px;">用户</th>
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