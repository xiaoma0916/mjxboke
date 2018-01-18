<?php
namespace app\index\controller;
use app\index\model\Article;
class Index extends Base
{
    public function index()
    {
         $data = Article::all(function($query){
                $query->limit(5)->order('id', 'asc');
            });
//          foreach($data as $key=>$value){
//              $data[$key]['content'] = substr($value['content'],0,200);
//          }
        $this->assign('data',$data);
        return view();
    }

}
