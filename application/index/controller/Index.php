<?php
namespace app\index\controller;
use think\Db;
class Index extends Base
{
    public function index()
    {
          $data = Db::name('article')->limit(5)->select();
          foreach($data as $key=>$value){
              $data[$key]['content'] = substr($value['content'],0,200);
          }
//        dump($data);die;
        $this->assign('data',$data);
        return view();
    }

}
