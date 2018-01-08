<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/6
 * Time: 19:16
 */

namespace app\manage\controller;


class Excel  extends Base{

      public function Add(){
         return view();
      }

      public function AddPost(){
          dump($_FILES);
      }


}
