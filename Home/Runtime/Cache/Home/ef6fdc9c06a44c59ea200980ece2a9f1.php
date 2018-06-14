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
            $("#showCollectMan").click(function () {
                $.ajax({url:"/final_work2/index.php?s=/Home/Index/show",
                    data:{table:"collect_man",
                    page:"page"},
                    type:"POST",
                    datatype:"JSON",
                    success:function(result){
                        $("#showMan").html(result);
                    }
                });
                $("#showMan").toggle(500);
            });
            $("#showCollectSong").click(function () {
                $.ajax({url:"/final_work2/index.php?s=/Home/Index/show",
                    data:{table:"collect_song"},
                    type:"POST",
                    datatype:"JSON",
                    success:function(result){
                        $("#showSong").html(result);
                    }
                });
                $("#showSong").toggle(500);
            });
            $("#showCollectZuanji").click(function () {
                $.ajax({url:"/final_work2/index.php?s=/Home/Index/show",
                    data:{table:"collect_zuanji"},
                    type:"POST",
                    datatype:"JSON",
                    success:function(result){
                        $("#showZuanji").html(result);
                    }
                });
                $("#showZuanji").toggle(500);
            });
        })
    </script>
    <style>
        button{
            height: 30px;
            background: #4CAF50;
            border: none;
            color: white;
            font-size: 16px;
        }
    </style>

</head>
<body background="./Public/images/weather.png">
<table>
    <tr>
        <td><button id="showCollectMan" class="btn btn-block btn-info">查看已收藏歌手</button></td>
    </tr>
    <tr>
        <td><button id="showCollectSong">查看已收藏歌曲</button></td>
    </tr>
    <tr>
        <td><button id="showCollectZuanji">查看已收藏专辑</button></td>
    </tr>
</table>

<table>
    <tr>
        <td><div id="showMan" ></div></td>
        <td><div id="showSong"></div></td>
        <td><div id="showZuanji"></div></td>
    </tr>
</table>

<HR style="FILTER: progid:DXImageTransform.Microsoft.Shadow(color:#987cb9,direction:145,strength:15)" width="100%" color=#987cb9 SIZE=1>
<p style="font-family:arial;color:red;font-size:20px;">输入搜索框，可以输入歌手，歌曲，专辑名查询</p>
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