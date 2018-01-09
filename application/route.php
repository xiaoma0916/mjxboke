<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    '' => 'index/index', // 首页访问路由
    'xue'        =>  'me/index', // 静态地址路由
    'view/[:id]$' => 'me/leran',//静态地址和动态地址结合
    'add' => '@manage/index/addarticle' , //后台首页添加文章
    'yan' => 'me/message',  //后台首页添加文章
<<<<<<< HEAD
	'manage'=>'@manage/index/index',//后台首页
=======
>>>>>>> 2f64286bbe6170fd83b54098749650f05f480e56
    'ajax' =>'me/AjaxPhone',

];
