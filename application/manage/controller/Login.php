<?php
/**
 * Created by PhpStorm.
 * User: wangxu
 * Date: 2017/12/28
 * Time: 18:25
 */

namespace app\manage\controller;
use think\Db;
use think\Controller;
use think\Jump;
use think\Cookie;
class Login  extends Controller{
    public function Login(){
        return view();
    }
    public function LoginDo(){
       $username = input('name','','htmlspecialchars');
       $password = input('password','','htmlspecialchars');
       if($data = Db::name('admin')->where(['username'=>$username])->find()){
               $rand = $data['randnum'];
               $password = md5($password.$rand);
               if($password == $data['password']){
                   Cookie::set('bkamdinuser',$username);
                   Cookie::set('bkpassword',$password);
                   session('amdinuser',$username);
                   echo 3;
               }else{
                   echo 2;
               }
       }else{
           echo 1;
       }
    }
    public function TuiChu(){
        session('amdinuser','');
       // $this->success('退出成功','manage/Login/Login');
       //不想看到跳转页面
        $this->redirect(url('Login/Login'));
    }

}