<?php
/**
 * Created by PhpStorm.
 * User: wangxu
 * Date: 2018/1/2
 * Time: 18:59
 */

namespace app\index\controller;
use think\Request;
use think\Controller;

class Error extends Controller{
     public function _initialize(){
         $this->_empty();
     }
    public function _empty(){
        return  view(APP_PATH.'manage/view/public/404.htm');
    }
}