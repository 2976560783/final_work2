<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');

        $this->display('login');
    }

    public function check()
    {
        $user = M('user');
        $condition['password'] = I('post.password');
        $condition['name'] = I('post.name');
        $flag = $user->where($condition)->find();
        if ($flag) {
            $collect=M('collect');
            $result = $collect->where("user='%s'",I('post.name'))->select();
            session('name', I('post.name'));
            if($result){
                $this->assign('data',$result);
                $this->display('show');
            }else{
                echo '未登录,无用户收藏信息';
                $this->assign('data',$result);
                $this->display('show');
            }

        } else {
            $this->error('用户名或者密码错误');
        }
    }

    public function search(){
        $search_man=M('search_man');
        $search_song=M('search_song');
        $search_zuanji=M('search_zuanji');
        // 读取数据

        $search=I('post.search');
        /*
        $select_value=I('select_value');
        echo $select_value;
        */
        //echo $search;
        //$search_man_sql="name=".$search;
        //$id=1;   测试发现可行
        //name='%s'   ''注意啊
        //where->select()查询无结果？？？
        $search_man_data = $search_man->where("name='%s'",$search)->select();
        if($search_man_data) {
            $this->assign('data',$search_man_data);// 模板变量赋值
            $this->display('SearchData:search_man');
        }

        $search_song_data = $search_song->where("song='%s'",$search)->select();
        if($search_song_data){
            $this->assign('data',$search_song_data);
            $this->display('SearchData:search_song');
        }

        $search_zuanji_data=$search_zuanji->where("zuanji='%s'",$search)->select();
        if($search_zuanji_data){
            $this->assign('data',$search_zuanji_data);
            $this->display('SearchData:search_zuanji');
        }
    }

    public function add(){
        $user=M('user');
        if($user->create()){
            $user->add();
            echo '注册成功';
            $this->display('login');
        }else{
            echo '注册失败，请再次尝试';
            $this->display('regist');
        }
    }

    public function collect(){

        $table=M("collect");
        $key=I('key');
        if(session('name')){
            $data['user']=session('name');
            $data[$key]=I('value');
            $table->data($data)->add();
            console.log('收藏成功');
            //window.location.href ="{U('Index/show')}";

            $this->error('收藏成功');
            //$this->display('show');
        }else{
            echo '未登录，不能收藏';
            //$this->display('show');
            $this->error('收藏失败');
        }


    }
    public function show(){
        $this->display();
    }
    public function test(){
        echo 'index/test';

    }
}