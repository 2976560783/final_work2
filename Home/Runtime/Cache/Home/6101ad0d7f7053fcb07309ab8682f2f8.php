<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>歌曲信息</title>
    <script src="http://upcdn.b0.upaiyun.com/libs/jquery/jquery-2.0.2.min.js"></script>
    <script>
        function collectIt(id) {
            $.ajax({
                    url:"/final_work2/index.php?s=/Home/Index/collect",
                    data:{
                        id:id,
                        //dd:'ss'
                        //value:name,
                        //
                        tableFrom:'search_song',
                        tableTo:'collect_song'
                    },
                    type:"POST",
                    datatype:"JSON",
                    success:function(result){
                        $("#showSong").html(result);
                    }
                }
            )
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
            border:1px solid #FF00FF;
            padding:3px 7px 2px 7px;
        }



        #customers tr.alt td
        {
            color:#000000;
            background-color:#FF00FF;
        }
    </style>
</head>
<body>
<p>歌曲信息</p>
<table border="1" id="customers">
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
            <td><button onclick="collectIt(<?php echo ($vo["id"]); ?>)">收藏</button></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>

</body>
</html>