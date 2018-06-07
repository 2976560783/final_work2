<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>前台</title>
    <script src="http://upcdn.b0.upaiyun.com/libs/jquery/jquery-2.0.2.min.js"></script>
    <script>
        function searchData() {
            $.ajax({
                    url:"/final_work2/index.php?s=/Home/Index/search",
                    data:{search:document.getElementById("data").value},
                    type:"POST",
                    datatype:"JSON",
                    success:function(result){
                        $("#showSearch").html(result);
                    }
                }
            );
        }
    </script>
    <script>
        $(document).ready(function () {
            $("#showCollect").click(function () {
                $.ajax({url:"/final_work2/index.php?s=/Home/Index/show",
                    data:{table:"collect"},
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
<button id="showCollect">查看已收藏</button>
<div id="show"></div>
<HR style="FILTER: progid:DXImageTransform.Microsoft.Shadow(color:#987cb9,direction:145,strength:15)" width="100%" color=#987cb9 SIZE=1>
<p>输入搜索框，可以输入歌手，歌曲，专辑名查询</p>
<input type="text" id="data" onkeyup="searchData()"/>
<div id="showSearch"></div>
<!--
<form action="/final_work2/index.php?s=/Home/Index/search" method="post">
    <input type="text" name="search">
    <input type="submit" value="搜索">
</form>

-->

</body>
</html>