<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>专辑信息</title>
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
                        tableFrom:'search_zuanji',
                        tableTo:'collect_zuanji'
                    },
                    type:"POST",
                    datatype:"JSON",
                    success:function(result){
                        $("#showZuanji").html(result);
                    }
                }
            )
        }
    </script>
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
        <td><button onclick="collectIt(<?php echo ($vo["id"]); ?>)">收藏</button></td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
</body>
</html>