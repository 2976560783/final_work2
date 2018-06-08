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
</head>
<body>
<p>歌手信息</p>
<table border="1">

    <tr>
        <th>歌手编号</th>
        <th>歌手名</th>
        <th>性别</th>
        <th>歌手地区</th>
        <th> 所属公司</th>
        <th>用户</th>
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
</table>
</body>
</html>