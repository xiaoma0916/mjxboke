<?php
/**
 * Created by PhpStorm.
 * User: wangxu
 * Date: 2017/12/8
 * Time: 14:06
 */

namespace app\manage\controller;
use think\Db;
use think\Session;
use think\Cookie;
class Index extends Base{
     public function index()
     {
         if (session('amdinuser') == '') {
             $this->error('请先登录','Login/Login');
         }
             $this->left();
             $this->right();
             return view();

     }
    public function left()
    {
        return view();
    }
    public function right()
    {
        return view();
    }
    public function head()
    {
        return view();
    }
   public function addarticle(){

       return view();
   }
    public function article_addpost(){
        $post = input('post.');
        $validate = validate('Index');
        if($validate->check($post))
        {
            $data['state'] = intval($post['state']);
            $data['title'] = $post['title'];
            $data['content'] = $post['content'];
            $data['addtime'] = date('Y-m-d H:i:s',time());
            if(Db::name('article')->strict(true)->insert($data)){
                $this->success("添加成功。",Url('article_list'));
            }else{
                $this->error('添加失败');
            }
        }else{
            $this->error($validate->getError());
        }

    }
    public function  article_list(){
       $result =  Db::name('article')->select();
       $this->assign('result',$result);
       return view();
    }
    public function article_edit(){
        $id = intval(input('id'));
        $data = Db::name('article')->where('id',$id)->find();
        $data['content'] = html_entity_decode($data['content']) ;
        $this->assign('data',$data);
        return view();
    }
    public function article_editpost()
    {
         $id = intval(input('id'));
         $validate = validate('Index');
         $post = $_POST;
         if($validate->check($post))
         {
            $data['state'] = intval($post['state']);
            $data['title'] = $post['title'];
            $data['content'] = $post['content'];
            if(Db::name('article')->strict(true)->where('id',$id)->update($data)){
                $this->success("更新成功。",Url('article_list'));
            }else{
                $this->error('更新失败');
            }
         }else{
            $this->error($validate->getError());
         }

    }
	
	
}