<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="http://upcdn.b0.upaiyun.com/libs/jquery/jquery-2.0.2.min.js"></script>
    <script>

        $(document).ready(function(){
            //设置一开始的时候的表单隐藏
            $("tr.formUpdate").css('display','none');
            $("#update").click(function () {
                $("tr.formUpdate").toggle();
            });

            $("tr.formDelete").css('display','none');
            $("#delete").click(function () {
                $("tr.formDelete").toggle();
            });

            $("tr.formInsert").css('display','none');
            $("#insert").click(function () {
                $("tr.formInsert").toggle();
            });

           //表单按钮跳转
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
            $("#insertSubmit").click(function () {
                //var name=document.getElementById("name").value;
                $.ajax({url:"/final_work2/admin.php?s=/Home/CURD/insert",
                    data:{table:"admin_user",
                        name:document.getElementById("nameInsert").value,
                        password:document.getElementById("passwordInsert").value},
                    type:"POST",
                    datatype:"JSON",
                    success:function(result){
                        $("#show").html(result);
                    }
                });
            });
            $("#deleteSubmit").click(function () {
                //var name=document.getElementById("name").value;
                $.ajax({url:"/final_work2/admin.php?s=/Home/CURD/delete",
                    data:{table:"admin_user",
                        name:document.getElementById("name").value},
                    type:"POST",
                    datatype:"JSON",
                    success:function(result){
                        $("#show").html(result);
                    }
                });
            });




        });
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
    <tr class="formInsert">
        <td>用户名：<input type="text" id="nameInsert"></td>
    </tr>
    <tr class="formInsert">
        <td>密码：<input type="password" id="passwordInsert"></td>
    </tr>
    <tr class="formInsert">
        <td><button id="insertSubmit">提交</button></td>
    </tr>
</table>
</body>
</html>

<!--
  <tr class="formUpdate">
      <td >
          id：<input type="text" id="idUpdate">
      </td>
  </tr>
  <tr class="formUpdate">
      <td >
          用户名：<input type="text" id="nameUpdate">
      </td>
  </tr>
  <tr class="formUpdate">
      <td >
          密码：<input type="password" id="passwordUpdate">
      </td>
  </tr>
  <tr class="formUpdate">
      <td><button id="updateSubmit">提交</button></td>
  </tr>

  <tr class="formDelete">
      <td>为了安全起见，本系统设置为只能通过输入用户名删除用户</td>
  </tr>
  <tr class="formDelete">
      <td>用户名：<input type="text" id="nameDelete"></td>
  </tr>
  <tr class="formDelete">
      <td><button id="deleteSubmit">提交</button></td>
  </tr>


  -->