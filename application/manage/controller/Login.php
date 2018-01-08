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
use think\Session;
class Login  extends Controller{
    public function Login(){
        return view();
    }
    public function LoginDo(){
       $username = input('name','','htmlspecialchars');
       $password = input('password','','htmlspecialchars');
       $logon = input('logon');
       if($data = Db::name('admin')->where(['username'=>$username])->find()){
               $rand = $data['randnum'];
               $password = md5($password.$rand);
               if($password == $data['password']){
                   if($logon == 1){
                       Cookie::set('bkamdinuser',$username,3600);
                       Cookie::set('bkpassword',$password,3600);
                   }
                   session('adminuser',$username);
                   echo 3;
               }else{
                   echo 2;
               }
       }else{
           echo 1;
       }
    }
    public function TuiChu(){
        Session::delete('adminuser');
       // $this->success('退出成功','manage/Login/Login');
       //不想看到跳转页面
        $this->redirect(url('Login/Login'));
    }

}