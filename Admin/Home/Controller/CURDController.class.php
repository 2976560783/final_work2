<?php
namespace Home\Controller;
use Think\Controller;
class CURDController extends Controller {
    public function update(){
        //echo $_POST['name'];
        $str=$_POST['table'];
        if($str=='admin_user'){
            $condition['id']=$_POST['id'];
            $condition['name']=$_POST['name'];
            $condition['password']=$_POST['password'];
        }
        if($str=='collect'){
            $condition['id']=$_POST['id'];
            $condition['name']=$_POST['name'];
            $condition['zuanji']=$_POST['zuanji'];
            $condition['song']=$_POST['song'];
            $condition['user']=$_POST['user'];
        }
        if($str=='user'){
            $condition['id']=$_POST['id'];
            $condition['name']=$_POST['name'];
            $condition['password']=$_POST['password'];
        }
        if($str=='search_man'){
            $condition['id']=$_POST['id'];
            $condition['name']=$_POST['name'];
            $condition['sex']=$_POST['sex'];
            $condition['area']=$_POST['area'];
            $condition['company']=$_POST['company'];
        }
        if($str=='search_song'){
            $condition['id']=$_POST['id'];
            $condition['song']=$_POST['song'];
            $condition['zuanji']=$_POST['zuanji'];
            $condition['style']=$_POST['style'];
            $condition['language']=$_POST['language'];
            $condition['man_id']=$_POST['man_id'];
            $condition['sequence']=$_POST['sequence'];
            $condition['singer']=$_POST['singer'];
        }
        if($str=='search_zuanji'){
            $condition['id']=$_POST['id'];
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
        $str=$_POST['table'];
        if($str=='admin_user'){
            $id=$_POST['id'];
        }

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

            $condition['name']=$_POST['name'];
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

            $condition['song']=$_POST['song'];
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