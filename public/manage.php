<?php
// 应用入口文件

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.4.0','<'))  die('require PHP > 5.4.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
//define('APP_DEBUG',true);

// 定义应用目录
define('APP_PATH', __DIR__ . '/../application/');

//绑定后台入口文件, 反后台url中可以把分组 manage给省略掉
define('BIND_MODULE','manage');

// 加载框架引导文件
require __DIR__ . '/../thinkphp/start.php';

?>