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
                        man_name:document.getElementById("man_nameUpdate").value,
                        date:document.getElementById("dateUpdate").value,
                        zuanji:document.getElementById("zuanjiUpdate").value},
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
                        man_name:document.getElementById("man_nameInsert").value,
                        date:document.getElementById("dateInsert").value,
                        zuanji:document.getElementById("zuanjiInsert").value},
                    type:"POST",
                    datatype:"JSON",
                    success:function(result){
                        $("#show").html(result);
                    }
                });
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
            日期：<input type="date" id="dateUpdate">
        </td>
    </tr>
    <tr class="formUpdate">
        <td >
            歌手：<input type="text" id="man_nameUpdate">
        </td>
    </tr>
    <tr class="formUpdate">
        <td >
            专辑：<input type="text" id="zuanjiUpdate">
        </td>
    </tr>
    <tr class="formUpdate">
        <td><button id="updateSubmit">提交</button></td>
    </tr>


    <tr class="formInsert"><td>数据插入</td></tr>
    <tr class="formInsert">
        <td >
            日期：<input type="date" id="dateInsert">
        </td>
    </tr>
    <tr class="formInsert">
        <td >
            歌手：<input type="text" id="man_nameInsert">
        </td>
    </tr>
    <tr class="formInsert">
        <td >
            专辑：<input type="text" id="zuanjiInsert">
        </td>
    </tr>
    <tr class="formInsert">
        <td><button id="insertSubmit">提交</button></td>
    </tr>
</table>
</body>
</html>