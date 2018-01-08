<?php
/**
 * Created by PhpStorm.
 * User: wangxu
 * Date: 2017/12/8
 * Time: 15:34
 */

namespace app\manage\validate;
use think\Validate;
class Index extends Validate{
    // 验证规则
    protected $rule = [
        'title' => 'require|max:30',
        'state' => 'require|number',
        'content' => 'require',


    ];

    protected $message = [
        'title.max' => '标题过长',
        'title.require' => '文章或者说说标题不能为空',
        'state.require' => '文章类型不能为空',
        'state.accepted' => '文章类型填写错误',
        'content.require' => '文章内容不能为空',

    ];
}