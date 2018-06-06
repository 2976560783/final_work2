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
        $table= M($str);
        $table->save($condition);
        $data=$table->select();
        $this->assign('data',$data);
        $this->display('Table:'.$str);
    }

    public function delete(){

    }

    public function insert(){

    }

    public function test(){
        echo 'CURD/test';
    }
}