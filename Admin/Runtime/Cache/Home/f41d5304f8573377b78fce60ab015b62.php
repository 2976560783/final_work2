<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="http://upcdn.b0.upaiyun.com/libs/jquery/jquery-2.0.2.min.js"></script>
    <script>

        $(document).ready(function(){
            //设置一开始的时候更新的表单隐藏
            $("tr.formUpdate").css('display','none');
            $("#update").click(function () {
                $("tr.formUpdate").toggle();
            });
        /*
            $("#updateSubmit").click(function(){
                $.ajax({
                    url:"/final_work2/admin.php?s=/Home/CURD/test",
                    data:{name:document.getElementById("name").value},
                    type:"POST",
                    datatype:"JSON",
                    success:function (result) {
                        $("#result").html(result);
                    }
                });
            });
            */
            //
            //
            //

            $("#updateSubmit").click(function () {
                //var name=document.getElementById("name").value;
                $.ajax({url:"/final_work2/admin.php?s=/Home/CURD/update",
                    data:{table:"admin_user",id:document.getElementById("id").value,
                        name:document.getElementById("name").value,
                        password:document.getElementById("password").value},
                    type:"POST",
                    datatype:"JSON",
                    success:function(result){
                        $("#show").html(result);
                    }
                });
            });





        })
    </script>
</head>
<body>
<table border="1">
    <tr>
        <td>用户名</td>
        <td>密码</td>
        <td>操作</td>
    </tr>
    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <td><?php echo ($vo["name"]); ?></td>
            <td><?php echo ($vo["password"]); ?></td>
            <td>
                <button id="update">更新</button>
                <button id="delete">删除</button>
            </td>

        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<table>
    <tr>
        <td> <button id="insert">插入</button></td>

    </tr>
    <tr class="formUpdate">
        <td >
            id：<input type="text" id="id">
        </td>
    </tr>
    <tr class="formUpdate">
        <td >
            用户名：<input type="text" id="name">
        </td>
    </tr>
    <tr class="formUpdate">
        <td >
            密码：<input type="password" id="password">
        </td>
    </tr>
    <tr class="formUpdate">
        <td><button id="updateSubmit">提交</button></td>
    </tr>
</table>
</body>
</html>