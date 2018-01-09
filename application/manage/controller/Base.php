<?php
/**
 * Created by PhpStorm.
 * User: wangxu
 * Date: 2017/12/8
 * Time: 14:04
 */
namespace app\manage\controller;
use think\Cookie;
use think\Config;
use think\Controller;
use think\Db;
class Base extends Controller{
    public function __construct()
    {
        if(Cookie::get('bkamdinuser'))
        {
            session('adminuser',Cookie::get('bkamdinuser'));

        }else if(session('adminuser') == '' ){
            $this->error('请先登录','Login/Login');
        }

    }
    public function _empty(){
        return  view(APP_PATH.'manage/view/public/404.htm');
    }

}