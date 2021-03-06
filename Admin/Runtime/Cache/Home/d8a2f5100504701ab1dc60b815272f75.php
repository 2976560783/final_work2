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
                    data:{table:"search_song",
                        id:document.getElementById("idUpdate").value,
                        song:document.getElementById("songUpdate").value,
                        zuanji:document.getElementById("zuanjiUpdate").value,
                        style:document.getElementById("styleUpdate").value,
                        language:document.getElementById("languageUpdate").value,
                        man_id:document.getElementById("man_idUpdate").value,
                        sequence:document.getElementById("sequenceUpdate").value,
                        singer:document.getElementById("singerUpdate").value
                    },
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
                        song:document.getElementById("songInsert").value,
                        zuanji:document.getElementById("zuanjiInsert").value,
                        style:document.getElementById("styleInsert").value,
                        language:document.getElementById("languageInsert").value,
                        man_id:document.getElementById("man_idInsert").value,
                        sequence:document.getElementById("sequenceInsert").value,
                        singer:document.getElementById("singerInsert").value},
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

        #customers th
        {
            font-size:1.1em;
            text-align:left;
            padding-top:5px;
            padding-bottom:4px;
            background-color:#FF00FF;
            color:#00FFFF;
        }

        #customers tr.alt td
        {
            color:#000000;
            background-color:#FF00FF;
        }
    </style>
</head>
<body>
<table border="1" id="customers">
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
            歌曲名：<input type="text" id="songUpdate">
        </td>
    </tr>
    <tr class="formUpdate">
        <td >
            专辑：<input type="text" id="zuanjiUpdate">
        </td>
    </tr>
    <tr class="formUpdate">
        <td >
            风格：<input type="text" id="styleUpdate">
        </td>
    </tr>
    <tr class="formUpdate">
        <td >
            语言：<input type="text" id="languageUpdate">
        </td>
    </tr>
    <tr class="formUpdate">
        <td >
            歌手编号：<input type="text" id="man_idUpdate">
        </td>
    </tr>
    <tr class="formUpdate">
        <td >
            点播频率：<input type="text" id="sequenceUpdate">
        </td>
    </tr>
    <tr class="formUpdate">
        <td >
            歌手：<input type="text" id="singerUpdate">
        </td>
    </tr>
    <tr class="formUpdate">
        <td><button id="updateSubmit">提交</button></td>
    </tr>


    <tr class="formInsert"><td>数据插入</td></tr>
    <tr class="formInsert">
        <td >
            歌曲名：<input type="text" id="songInsert">
        </td>
    </tr>
    <tr class="formInsert">
        <td >
            专辑：<input type="text" id="zuanjiInsert">
        </td>
    </tr>
    <tr class="formInsert">
        <td >
            风格：<input type="text" id="styleInsert">
        </td>
    </tr>
    <tr class="formInsert">
        <td >
            语言：<input type="text" id="languageInsert">
        </td>
    </tr>
    <tr class="formInsert">
        <td >
            歌手编号：<input type="text" id="man_idInsert">
        </td>
    </tr>
    <tr class="formInsert">
        <td >
            点播频率：<input type="text" id="sequenceInsert">
        </td>
    </tr>
    <tr class="formInsert">
        <td >
            歌手：<input type="text" id="singerInsert">
        </td>
    </tr>
    <tr class="formInsert">
        <td><button id="insertSubmit">提交</button></td>
    </tr>
</table>
</body>
</html>