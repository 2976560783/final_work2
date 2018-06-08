<?php
namespace Home\Controller;
use Think\Controller;
class CURDController extends Controller {
    public function update(){
        //echo $_POST['name'];
        $str=$_POST['table'];
        if($str=='admin_user'){
            $condition['id']=I('post.id');
            $condition['name']=$_POST['name'];
            $condition['password']=$_POST['password'];
        }
        if($str=='collect'){
            $condition['id']=I('post.id');
            $condition['man']=$_POST['man'];
            $condition['zuanji']=$_POST['zuanji'];
            $condition['song']=$_POST['song'];
            $condition['user']=$_POST['user'];
        }
        if($str=='user'){
            $condition['id']=I('post.id');
            $condition['name']=$_POST['name'];
            $condition['password']=$_POST['password'];
        }
        if($str=='search_man'){
            $condition['id']=I('post.id');
            $condition['name']=$_POST['name'];
            $condition['sex']=$_POST['sex'];
            $condition['area']=$_POST['area'];
            $condition['company']=$_POST['company'];
        }
        if($str=='search_song'){
            $condition['id']=I('post.id');
            $condition['song']=$_POST['song'];
            $condition['zuanji']=$_POST['zuanji'];
            $condition['style']=$_POST['style'];
            $condition['language']=$_POST['language'];
            $condition['man_id']=$_POST['man_id'];
            $condition['sequence']=$_POST['sequence'];
            $condition['singer']=$_POST['singer'];
        }
        if($str=='search_zuanji'){
            $condition['id']=I('post.id');
            $condition['song']=$_POST['song'];
            $condition['zuanji']=$_POST['zuanji'];
            $condition['man_name']=$_POST['man_name'];
        }
        $table= M($str);
        $table->save($condition);
        $data=$table->select();
        $this->assign('data',$data);
        $this->display('Table:'.$str);
    }

    public function delete(){
        $str=I('post.table');
        //$id=$_POST['id'];
        $id=I('post.id');
        $table=M($str);
        $table->where('id='.$id)->delete();
        $data=$table->select();
        $this->assign('data',$data);
        $this->display('Table:'.$str);

    }

    public function insert(){

        $str=$_POST['table'];
        if($str=='admin_user'){
            $condition['name']=$_POST['name'];
            $condition['password']=$_POST['password'];
        }
        if($str=='collect'){

            $condition['man']=$_POST['man'];
            $condition['zuanji']=$_POST['zuanji'];
            $condition['song']=$_POST['song'];
            $condition['user']=$_POST['user'];
        }
        if($str=='user'){

            $condition['name']=$_POST['name'];
            $condition['password']=$_POST['password'];
        }
        if($str=='search_man'){

            $condition['name']=$_POST['name'];
            $condition['sex']=$_POST['sex'];
            $condition['area']=$_POST['area'];
            $condition['company']=$_POST['company'];
        }
        if($str=='search_song'){

            $condition['song']=$_POST['song'];
            $condition['zuanji']=$_POST['zuanji'];
            $condition['style']=$_POST['style'];
            $condition['language']=$_POST['language'];
            $condition['man_id']=$_POST['man_id'];
            $condition['sequence']=$_POST['sequence'];
            $condition['singer']=$_POST['singer'];
        }
        if($str=='search_zuanji'){
            $condition['date']=$_POST['date'];
            $condition['zuanji']=$_POST['zuanji'];
            $condition['man_name']=$_POST['man_name'];
        }
        $table= M($str);
        $table->add($condition);
        $data=$table->select();
        $this->assign('data',$data);
        $this->display('Table:'.$str);
    }

    public function test(){
        echo 'CURD/test';
    }
}