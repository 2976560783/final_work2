<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
        $this->display('login');

    }

    public function check(){
        $admin_user=M('admin_user');
        $condition['name']=I('post.name');
        $condition['password']=I('post.password');
        $flag=$admin_user->where($condition)->find();
        if($flag){
            echo '欢迎回归'.$condition['name']."<br>";
            $this->display('operate');
        }else{
            $this->error('用户名或者密码错误');
        }
    }


    public function curd(){
        //echo 'table'.$table."<br>";
        //$this->dispaly('test');
        switch($_GET['table']){
            case "admin_user":
                IndexController::read('admin_user');
                break;
            case "collect":
                IndexController::read('collect');
                break;
            case "search_man":
                IndexController::read('search_man');
                break;
            case "search_song":
                IndexController::read('search_song');
                break;
            case "search_zuanji":
                IndexController::read('search_zuanji');
                break;
            case "user":
                IndexController::read('user');
                break;

            default:

        }
        $this->display('operate');
    }

    public function test(){
        echo 'controller/test';
    }

    public function read(){
        $str=$_POST['table'];
        echo $str;
        $table= M($str);
        $data=$table->select();
        $this->assign('data',$data);
        $this->display('Table:'.$str);

    }
}