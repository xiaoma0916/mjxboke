<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/17
 * Time: 10:03
 */
namespace app\index\model;
use think\Model;

class Article extends Model{
   protected $name = "article";

   public function scopeTitle($query){
      $query->field('title,id')->limit(5);
   }
   protected function getAddtimeAttr($addtime){
        return date('Y-m-d',$addtime);
   }
//   protected function getContentAttr($content){
//    return  substring(cutstr_html(clearHtml($content)));
//   }
   protected function getStateAttr($state){
       switch($state){
           case 1:
           return "正能量";
           break;
           case 2:
           return "学无止境";
           break;
       }
   }

}