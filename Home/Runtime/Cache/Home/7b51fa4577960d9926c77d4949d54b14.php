<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="http://upcdn.b0.upaiyun.com/libs/jquery/jquery-2.0.2.min.js"></script>
    <script>
        function deleteMan(id) {
            $.ajax({
                url:"/final_work2/index.php?s=/Home/Index/delete",
                data:{id:id,
                    table:'collect_man'
                },
                type:'POST',
                datatype:'JSON',
                success:function(result){
                    $("#showMan").html(result);
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
<p>歌手信息</p>
<table border="1" id="customers">

    <tr>
        <th style="font-family:arial;color:blue;font-size:20px;">歌手编号</th>
        <th style="font-family:arial;color:blue;font-size:20px;">歌手名</th>
        <th style="font-family:arial;color:blue;font-size:20px;">性别</th>
        <th style="font-family:arial;color:blue;font-size:20px;">歌手地区</th>
        <th style="font-family:arial;color:blue;font-size:20px;"> 所属公司</th>
        <th style="font-family:arial;color:blue;font-size:20px;">用户</th>
    </tr>
    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <td><?php echo ($vo["id"]); ?></td>
            <td><?php echo ($vo["name"]); ?></td>
            <td><?php echo ($vo["sex"]); ?></td>
            <td><?php echo ($vo["area"]); ?></td>
            <td><?php echo ($vo["company"]); ?></td>
            <td><?php echo ($vo["user"]); ?></td>
            <td><button onclick="deleteMan(<?php echo ($vo["id"]); ?>)" >删除</button></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    <div><?php echo ($page); ?></div>
</table>
</body>
</html>