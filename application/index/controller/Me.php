<?php
/**
 * Created by PhpStorm.
 * User: wangxu
 * Date: 2017/12/11
 * Time: 15:54
 */

namespace app\index\controller;
use think\Db;
use app\index\model\Article;
use think\Request;
class Me extends  Base{
     public function message(){
         $count = Db::name('message')->count();
         $data = Db::name('message')->paginate(4,$count,[
             'path'=>url('/index/me/message/','',false)."page/[PAGE].html"
         ]);
         $page = $data->render();
         $this->assign('page',$page);
         $this->assign('data',$data);
         return view();
     }
    public function message_add(){
        if(empty($_SESSION['user_name']))
        {
            $this->error('请先登录','Login/login');
        }else{

        }


    }
    public function leran()
    {
        $Mid = input('id');
        $idarray =explode(',',jiemi($Mid));
        $id = $idarray[1];
        $datas = Article::get($id);
        $this->assign('datas',$datas);
        $data = Article::scope('Title')->select();
        $this->assign('data',$data);
        return view();
    }
    public function index(){
        $count = Db::name('article')->where('state',1)->count();
        $data = Db::name('article')->where('state',1)->paginate(3,$count,[
            //'path'=>url('/index/me/index/','',false)."page/[PAGE].html"
             'path'=>"javascript:AjaxPage([PAGE])"
        ]);
        $page = $data->render();
        $this->assign('page',$page);
        $this->assign('data',$data);
        return view();
    }
    public function AjaxPhone(){
         $Phone = input('phone','','htmlspecialchars');
         //$Phone = 15832003493;
         $code = generate_code();
         session('code'.$Phone,$code);
         $data = Phone_verification($Phone,$code);
         echo $data;
    }
    public function Login(){
        $Code = input('post.code');
        $Phone = input('phone','','htmlspecialchars');
        if(session('code'.$Phone) == $Code){
            //先调用归属地接口
           // $name =  phone_ascription();
            //执行插入数据库操作 调用归属地接口


        }else{
            echo 2;
        }
    }

}