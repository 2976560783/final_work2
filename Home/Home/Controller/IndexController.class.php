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
            session('name',$condition['name']);
            $this->display('main');

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

    public function collect()
    {


        if (session('name')) {
            $tableTo=I('post.tableTo');
            $tableFrom=I('post.tableFrom');
            $id=I('post.id');
            $username= session('name');
            $tableFrom=M($tableFrom);
            $resultFrom=$tableFrom->where('id='.$id)->find();
            unset($resultFrom['id']);
            $resultFrom['user']=session('name');
            $tableTo=M($tableTo);
            $tableTo->data($resultFrom)->add();
            $condition['user']=session('name');
            $result = $tableTo->where($condition)->select();
           // echo session('name');
            //print_r($result);
            //echo $tableTo;

            $this->assign('data',$result);
            $this->display('Collect:'.I('post.tableTo'));
            //$this->display('show');


        }else{
            echo '未登录，不能收藏';
            //$this->display('show');
            $this->error('收藏失败');

        }
        }
    function getpage($count, $pagesize = 10) {
        import('ORG.Util.Page');
        $p = new \Think\Page($count, $pagesize);
        $p->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
        $p->setConfig('prev', '上一页');
        $p->setConfig('next', '下一页');
        $p->setConfig('last', '末页');
        $p->setConfig('first', '首页');
        $p->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
        $p->lastSuffix = false;//最后一页不显示为总页数
        return $p;
    }

    public function show(){
        //echo 'Index/show';
        //import('ORG.Util.Page');
        import('ORG.Util.Page');

        $name=session('name');
        //echo 'name'.$name;
        $table=I('post.table');
        $collect=M($table);
        /*
        $count=$collect->where("user='%s'",$name)->count();

        $Page=new \Think\Page($count,2);

        $Page->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $Page->setConfig('last', '末页');
        $Page->setConfig('first', '首页');
        $Page->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
        $Page->lastSuffix = false;//最后一页不显示为总页数

        $show=$Page->show();
        $data=$collect->where("user='%s'",$name)->limit($Page->firstRow.','.$Page->listRows)->select();
        */
        $data=$collect->where("user='%s'",$name)->select();
        //$this->assign('page',$show);
        $this->assign('data',$data);

        $this->display('Collect:'.$table);

    }

    //用户收藏的记录的删除
    public function delete(){
        $id=I('post.id');
        $table=I('post.table');
        $collect=M($table);
        $collect->where('id='.$id)->delete();
        $condition['user']=session('name');
        $result=$collect->where($condition)->select();
        $this->assign('data',$result);

        $this->display('Collect:'.$table);
    }
    public function test(){
        echo 'index/test';

    }
    public function collectResult()
    {

    }
}