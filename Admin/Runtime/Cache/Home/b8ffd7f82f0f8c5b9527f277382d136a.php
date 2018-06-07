<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>操作数据</title>
    <script src="http://upcdn.b0.upaiyun.com/libs/jquery/jquery-2.0.2.min.js">
    </script>
    <script>
        $(document).ready(function(){
            /*
            $("#showTest").click(function () {
                $.ajax({url:"/final_work2/admin.php?s=/Home/Index/test.html",success:function(result){
                        $("#show").html(result);
                    }});
            });
            */
            $("button.userManager").css('display','none');
            $("#manager").click(function () {
                $("button.userManager").toggle(1000);
            })
            $("button.data").css('display','none');
            $("#dataManager").click(function () {
                $("button.data").toggle(1000);
            })

            $("#admin_user").click(function () {
                $.ajax({url:"/final_work2/admin.php?s=/Home/Index/read",
                    data:{table:"admin_user"},
                    type:"POST",
                    datatype:"JSON",
                    success:function(result){
                        $("#show").html(result);
                    }
                });
            });
            $("#user").click(function () {
                $.ajax({url:"/final_work2/admin.php?s=/Home/Index/read",
                    data:{table:"user"},
                    type:"POST",
                    datatype:"JSON",
                    success:function(result){
                        $("#show").html(result);
                    }
                });
            });
            $("#collect").click(function () {
                $.ajax({url:"/final_work2/admin.php?s=/Home/Index/read",
                    data:{table:"collect"},
                    type:"POST",
                    datatype:"JSON",
                    success:function(result){
                        $("#show").html(result);
                    }
                });
            });
            $("#search_man").click(function () {
                $.ajax({url:"/final_work2/admin.php?s=/Home/Index/read",
                    data:{table:"search_man"},
                    type:"POST",
                    datatype:"JSON",
                    success:function(result){
                        $("#show").html(result);
                    }
                });
            });
            $("#search_song").click(function () {
                $.ajax({url:"/final_work2/admin.php?s=/Home/Index/read",
                    data:{table:"search_song"},
                    type:"POST",
                    datatype:"JSON",
                    success:function(result){
                        $("#show").html(result);
                    }
                });
            });
            $("#search_zuanji").click(function () {
                $.ajax({url:"/final_work2/admin.php?s=/Home/Index/read",
                    data:{table:"search_zuanji"},
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
<p>操作数据</p>

<!-- 高级版  -->
<p id="manager" style="color:red;font-size:16px;">管理用户数据</p>
<button id="admin_user" class="userManager">管理员数据管理</button><br>
<button id="user" class="userManager">普通用户数据管理</button><br>
<p id="dataManager" style="color:red;font-size:16px;">系统数据管理</p>
<button id="collect" class="data">用户收藏歌曲专辑歌手信息</button><br>
<button id="search_man" class="data">系统歌手数据</button><br>
<button id="search_song" class="data">系统歌曲数据</button><br>
<button id="search_zuanji" class="data">系统专辑数据</button><br>

<!--
<select>
    <option id="admin_user">管理员用户数据管理</option>
    <option id="user">普通用户数据管理</option>
</select>
-->
<div id="show" style="position: absolute;left:400px;top:200px"></div>
</body>
</html>



<!--
<script>
    function loadXMLDoc(){
        var xmlhttp;
        if(window.XMLHttpRequest){
            xmlhttp = new XMLHttpRequest();
        }else{
            xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
        }
        xmlhttp.onreadystatechange=function(){
            if(xmlhttp.readyState==4 && xmlhttp.status ==200){
                document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","/final_work2/admin.php?s=/Home/Index/curd",true);
        xmlhttp.send();
    }
</script>

<button type="button" onclick="loadXMLDoc()">数据请求</button>
<div id="myDiv"></div>
-->

<!--
初级版本

<a href="<?php echo U('curd','table=admin_user');?>">管理员数据管理</a>
<a href="<?php echo U('curd','table=collect');?>">前台用户数据管理</a>
<a href="<?php echo U('curd','table=user');?>">前台用户登录信息管理</a>
<a href="<?php echo U('curd','table=search_man');?>">歌手数据管理</a>
<a href="<?php echo U('curd','table=search_song');?>">歌曲数据管理</a>
<a href="<?php echo U('curd','table=search_zuanji');?>">专辑数据管理</a>
<?php if(($_GET['table'] == 'admin_user')): ?><!DOCTYPE html>
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

           // $("tr.formDelete").css('display','none');


            $("tr.formInsert").css('display','none');
            $("#insert").click(function () {
                $("tr.formInsert").toggle();
            });

           //表单按钮跳转
            $("#updateSubmit").click(function () {
                //var name=document.getElementById("name").value;
                $.ajax({url:"/final_work2/admin.php?s=/Home/CURD/update",
                    data:{table:"admin_user",
                        id:document.getElementById("idUpdate").value,
                        name:document.getElementById("nameUpdate").value,
                        password:document.getElementById("passwordUpdate").value},
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
            $("button.delete").click(function () {
                var $str=$('button.delete').val();
                alert($str);
            });
            /*
            $("#deleteSubmit").click(function () {
                //var name=document.getElementById("name").value;
                $.ajax({url:"/final_work2/admin.php?s=/Home/CURD/delete",
                    data:{table:"admin_user",
                        id:},
                    type:"POST",
                    datatype:"JSON",
                    success:function(result){
                        $("#show").html(result);
                    }
                });
            });
            */
        });
        function deleteId(id) {

            $.ajax({
                url:"/final_work2/admin.php?s=/Home/CURD/delete",
                data:{id:id,
                table:'admin_user'},
                type:"POST",
                datatype:"JSON",
                success:function(result){
                    $("#show").html(result);
                }
                }
            )
        }
    </script>

</head>
<body>
<table border="1">
    <tr>
        <td>id</td>
        <td>用户名</td>
        <td>密码</td>
        <td>操作</td>
    </tr>
    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <td><?php echo ($vo["id"]); ?></td>
            <td><?php echo ($vo["name"]); ?></td>
            <td><?php echo ($vo["password"]); ?></td>
            <td>
                <button onclick="deleteId(<?php echo ($vo['id']); ?>)">删除</button>
            </td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<table>
    <tr>
        <td><button id="insert">插入</button></td>
        <td><button id="update">更新</button></td>
    </tr>
</table>
<table>
    <tr class="formUpdate"><td>本表更新</td></tr>
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


    <tr class="formInsert"><td>数据插入</td></tr>
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

  <tr class="formDelete">
      <td>为了安全起见，本系统设置为只能通过输入用户名删除用户</td>
  </tr>
  <tr class="formDelete">
      <td>用户名：<input type="text" id="nameDelete"></td>
  </tr>
  <tr class="formDelete">
      <td><button id="deleteSubmit">提交</button></td>
  </tr>


  --><?php endif; ?>

<?php if(($_GET['table'] == 'collect')): ?><!DOCTYPE html>
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

            $("tr.formInsert").css('display','none');
            $("#insert").click(function () {
                $("tr.formInsert").toggle();
            });

            //表单按钮跳转
            $("#updateSubmit").click(function () {
                //var name=document.getElementById("name").value;
                $.ajax({url:"/final_work2/admin.php?s=/Home/CURD/update",
                    data:{table:"collect",
                        id:document.getElementById("idUpdate").value,
                        name:document.getElementById("nameUpdate").value,
                        password:document.getElementById("passwordUpdate").value},
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
                    data:{table:"collect",
                        name:document.getElementById("nameInsert").value,
                        password:document.getElementById("passwordInsert").value},
                    type:"POST",
                    datatype:"JSON",
                    success:function(result){
                        $("#show").html(result);
                    }
                });
            });
            $("button.delete").click(function () {
                var $str=$('button.delete').val();
                alert($str);
            });
        });
        function deleteId(id) {

            $.ajax({
                    url:"/final_work2/admin.php?s=/Home/CURD/delete",
                    data:{id:id,
                        table:'collect'},
                    type:"POST",
                    datatype:"JSON",
                    success:function(result){
                        $("#show").html(result);
                    }
                }
            )
        }

    </script>
</head>
<body>
<table border="1">
    <tr>
        <td>id</td>
        <td>姓名</td>
        <td>专辑</td>
        <td>用户</td>
        <td>歌曲</td>
    </tr>
    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <td><?php echo ($vo["id"]); ?></td>
            <td><?php echo ($vo["name"]); ?></td>
            <td><?php echo ($vo["zuanji"]); ?></td>
            <td><?php echo ($vo["user"]); ?></td>
            <td><?php echo ($vo["song"]); ?></td>
            <td>
                <button onclick="deleteId(<?php echo ($vo['id']); ?>)">删除</button>
            </td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<table>
    <tr>
        <td><button id="insert">插入</button></td>
        <td><button id="update">更新</button></td>
    </tr>
</table>
<table>
    <tr class="formUpdate"><td>本表更新</td></tr>
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


    <tr class="formInsert"><td>数据插入</td></tr>
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
</html><?php endif; ?>
<?php if(($_GET['table'] == 'user')): ?><!DOCTYPE html>
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

            // $("tr.formDelete").css('display','none');


            $("tr.formInsert").css('display','none');
            $("#insert").click(function () {
                $("tr.formInsert").toggle();
            });

            //表单按钮跳转
            $("#updateSubmit").click(function () {
                //var name=document.getElementById("name").value;
                $.ajax({url:"/final_work2/admin.php?s=/Home/CURD/update",
                    data:{table:"user",
                        id:document.getElementById("idUpdate").value,
                        name:document.getElementById("nameUpdate").value,
                        password:document.getElementById("passwordUpdate").value},
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
                    data:{table:"user",
                        name:document.getElementById("nameInsert").value,
                        password:document.getElementById("passwordInsert").value},
                    type:"POST",
                    datatype:"JSON",
                    success:function(result){
                        $("#show").html(result);
                    }
                });
            });
            $("button.delete").click(function () {
                var $str=$('button.delete').val();
                alert($str);
            });
        });
        function deleteId(id) {

            $.ajax({
                    url:"/final_work2/admin.php?s=/Home/CURD/delete",
                    data:{id:id,
                        table:'user'},
                    type:"POST",
                    datatype:"JSON",
                    success:function(result){
                        $("#show").html(result);
                    }
                }
            )
        }

    </script>
</head>
<body>
<table border="1">
    <tr>
        <td>id</td>
        <td>姓名</td>
        <td>密码</td>
    </tr>
    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <td><?php echo ($vo["id"]); ?></td>
            <td><?php echo ($vo["name"]); ?></td>
            <td><?php echo ($vo["password"]); ?></td>
            <td>
                <button onclick="deleteId(<?php echo ($vo['id']); ?>)">删除</button>
            </td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<table>
    <tr>
        <td><button id="insert">插入</button></td>
        <td><button id="update">更新</button></td>
    </tr>
</table>
<table>
    <tr class="formUpdate"><td>本表更新</td></tr>
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


    <tr class="formInsert"><td>数据插入</td></tr>
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
</html><?php endif; ?>
<?php if(($_GET['table'] == 'search_man')): ?><!DOCTYPE html>
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

            // $("tr.formDelete").css('display','none');


            $("tr.formInsert").css('display','none');
            $("#insert").click(function () {
                $("tr.formInsert").toggle();
            });

            //表单按钮跳转
            $("#updateSubmit").click(function () {
                //var name=document.getElementById("name").value;
                $.ajax({url:"/final_work2/admin.php?s=/Home/CURD/update",
                    data:{table:"search_man",
                        id:document.getElementById("idUpdate").value,
                        name:document.getElementById("nameUpdate").value,
                        password:document.getElementById("passwordUpdate").value},
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
                    data:{table:"search_man",
                        name:document.getElementById("nameInsert").value,
                        password:document.getElementById("passwordInsert").value},
                    type:"POST",
                    datatype:"JSON",
                    success:function(result){
                        $("#show").html(result);
                    }
                });
            });
            $("button.delete").click(function () {
                var $str=$('button.delete').val();
                alert($str);
            });
        });
        function deleteId(id) {

            $.ajax({
                    url:"/final_work2/admin.php?s=/Home/CURD/delete",
                    data:{id:id,
                        table:'search_man'},
                    type:"POST",
                    datatype:"JSON",
                    success:function(result){
                        $("#show").html(result);
                    }
                }
            )
        }

    </script>
</head>
<body>
<table border="1">
<tr>
    <td>id</td>
    <td>姓名</td>
    <td>性别</td>
    <td>地区</td>
    <td>公司</td>
</tr>
<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
        <td><?php echo ($vo["id"]); ?></td>
        <td><?php echo ($vo["name"]); ?></td>
        <td><?php echo ($vo["sex"]); ?></td>
        <td><?php echo ($vo["area"]); ?></td>
        <td><?php echo ($vo["company"]); ?></td>
        <td>
            <button onclick="deleteId(<?php echo ($vo['id']); ?>)">删除</button>
        </td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<table>
    <tr>
        <td><button id="insert">插入</button></td>
        <td><button id="update">更新</button></td>
    </tr>
</table>
<table>
    <tr class="formUpdate"><td>本表更新</td></tr>
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


    <tr class="formInsert"><td>数据插入</td></tr>
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
</html><?php endif; ?>
<?php if(($_GET['table'] == 'search_song')): ?><!DOCTYPE html>
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

            // $("tr.formDelete").css('display','none');


            $("tr.formInsert").css('display','none');
            $("#insert").click(function () {
                $("tr.formInsert").toggle();
            });

            //表单按钮跳转
            $("#updateSubmit").click(function () {
                //var name=document.getElementById("name").value;
                $.ajax({url:"/final_work2/admin.php?s=/Home/CURD/update",
                    data:{table:"search_song",
                        id:document.getElementById("idUpdate").value,
                        name:document.getElementById("nameUpdate").value,
                        password:document.getElementById("passwordUpdate").value},
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
                    data:{table:"search_song",
                        name:document.getElementById("nameInsert").value,
                        password:document.getElementById("passwordInsert").value},
                    type:"POST",
                    datatype:"JSON",
                    success:function(result){
                        $("#show").html(result);
                    }
                });
            });
            $("button.delete").click(function () {
                var $str=$('button.delete').val();
                alert($str);
            });
        });
        function deleteId(id) {

            $.ajax({
                    url:"/final_work2/admin.php?s=/Home/CURD/delete",
                    data:{id:id,
                        table:'search_song'},
                    type:"POST",
                    datatype:"JSON",
                    success:function(result){
                        $("#show").html(result);
                    }
                }
            )
        }

    </script>
</head>
<body>
<table border="1">
<tr>
    <td>id</td>
    <td>歌曲</td>
    <td>专辑</td>
    <td>风格</td>
    <td>语言</td>
    <td>歌手编号</td>
    <td>点播频率</td>
    <td>歌手</td>
</tr>
<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
        <td><?php echo ($vo["id"]); ?></td>
        <td><?php echo ($vo["song"]); ?></td>
        <td><?php echo ($vo["zuanji"]); ?></td>
        <td><?php echo ($vo["style"]); ?></td>
        <td><?php echo ($vo["language"]); ?></td>
        <td><?php echo ($vo["man_id"]); ?></td>
        <td><?php echo ($vo["sequence"]); ?></td>
        <td><?php echo ($vo["singer"]); ?></td>
        <td>
            <button onclick="deleteId(<?php echo ($vo['id']); ?>)">删除</button>
        </td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<table>
    <tr>
        <td><button id="insert">插入</button></td>
        <td><button id="update">更新</button></td>
    </tr>
</table>
<table>
    <tr class="formUpdate"><td>本表更新</td></tr>
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


    <tr class="formInsert"><td>数据插入</td></tr>
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
</html><?php endif; ?>
<?php if(($_GET['table'] == 'search_zuanji')): ?><!DOCTYPE html>
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

            // $("tr.formDelete").css('display','none');


            $("tr.formInsert").css('display','none');
            $("#insert").click(function () {
                $("tr.formInsert").toggle();
            });

            //表单按钮跳转
            $("#updateSubmit").click(function () {
                //var name=document.getElementById("name").value;
                $.ajax({url:"/final_work2/admin.php?s=/Home/CURD/update",
                    data:{table:"search_zuanji",
                        id:document.getElementById("idUpdate").value,
                        name:document.getElementById("nameUpdate").value,
                        password:document.getElementById("passwordUpdate").value},
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
                    data:{table:"search_zuanji",
                        name:document.getElementById("nameInsert").value,
                        password:document.getElementById("passwordInsert").value},
                    type:"POST",
                    datatype:"JSON",
                    success:function(result){
                        $("#show").html(result);
                    }
                });
            });
            $("button.delete").click(function () {
                var $str=$('button.delete').val();
                alert($str);
            });
        });
        function deleteId(id) {

            $.ajax({
                    url:"/final_work2/admin.php?s=/Home/CURD/delete",
                    data:{id:id,
                        table:'search_zuanji'},
                    type:"POST",
                    datatype:"JSON",
                    success:function(result){
                        $("#show").html(result);
                    }
                }
            )
        }
    </script>
</head>
<body>
<table border="1">
<tr>
    <td>id</td>
    <td>日期</td>
    <td>歌手名</td>
    <td>专辑</td>
</tr>
<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
        <td><?php echo ($vo["id"]); ?></td>
        <td><?php echo ($vo["date"]); ?></td>
        <td><?php echo ($vo["man_name"]); ?></td>
        <td><?php echo ($vo["zuanji"]); ?></td>
        <td>
            <button onclick="deleteId(<?php echo ($vo['id']); ?>)">删除</button>
        </td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<table>
    <tr>
        <td><button id="insert">插入</button></td>
        <td><button id="update">更新</button></td>
    </tr>
</table>
<table>
    <tr class="formUpdate"><td>本表更新</td></tr>
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


    <tr class="formInsert"><td>数据插入</td></tr>
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
</html><?php endif; ?>
-->