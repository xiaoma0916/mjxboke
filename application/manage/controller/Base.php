<?php
/**
 * Created by PhpStorm.
 * User: wangxu
 * Date: 2017/12/8
 * Time: 14:04
 */
namespace app\manage\controller;
<<<<<<< HEAD
=======
use think\Cookie;
use think\Config;
>>>>>>> 2f64286bbe6170fd83b54098749650f05f480e56
use think\Controller;
use think\Db;
class Base extends Controller{
    public function __construct()
    {
<<<<<<< HEAD


    }
=======
      //  echo Cookie::get('bkamdinuser');die;
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

>>>>>>> 2f64286bbe6170fd83b54098749650f05f480e56
}