<?php
function hmtlentities_code($arr){
   return  html_entity_decode($arr,ENT_QUOTES ,'UTF-8');
}

function  jiami($num){
    $id = base64_encode('mjxbk,'.$num);
    return $id;
}
function jiemi($str)
{
    $id =base64_decode($str);
    return $id;

}
function clearHtml($content)
{
    $content = preg_replace("/<a[^>]*>/i", "", $content);
    @$content = preg_replace("/<\/a>/i", "", $content);
    $content = preg_replace("/<div[^>]*>/i", "", $content);
    @$content = preg_replace("/<\/div>/i", "", $content);
    $content = preg_replace("/<!--[^>]*-->/i", "", $content);//注释内容
    $content = preg_replace("/style=.+?['|\"]/i", '', $content);//去除样式
    $content = preg_replace("/class=.+?['|\"]/i", '', $content);//去除样式
    $content = preg_replace("/id=.+?['|\"]/i", '', $content);//去除样式
    $content = preg_replace("/lang=.+?['|\"]/i", '', $content);//去除样式
    $content = preg_replace("/width=.+?['|\"]/i", '', $content);//去除样式
    $content = preg_replace("/height=.+?['|\"]/i", '', $content);//去除样式
    $content = preg_replace("/border=.+?['|\"]/i", '', $content);//去除样式
    $content = preg_replace("/face=.+?['|\"]/i", '', $content);//去除样式
    $content = preg_replace("/face=.+?['|\"]/", '', $content);//去除样式 只允许小写 正则匹配没有带 i 参数
    return $content;
}
function cutstr_html($string,$length=0,$ellipsis='…'){
    $string=strip_tags($string);
    $string=preg_replace('/\n/is','',$string);
    $string=preg_replace('/ |　/is','',$string);
    $string=preg_replace('/&nbsp;/is','',$string);
    preg_match_all("/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/",$string,$string);        if(is_array($string)&&!empty($string[0])){
        if(is_numeric($length)&&$length){
            $string=join('',array_slice($string[0],0,$length)).$ellipsis;
        }else{
            $string=implode('',$string[0]);
        }
    }else{
        $string='';        }
    return $string;
}
function substring($string){
    $string =  mb_substr($string,0,100);
   return  $string . "....";
}
//手机短信接口
function  Phone_verification($moblie=15832003493,$code){
   $url = "http://api.sms.cn/sms/";
   $uid = "xiaoma0916";
   $pwd = "fba4419fecdfc987515fa6d256b8fd45";
   $ac = "send";
   $content = json_encode(array('code'=>$code));
   $template = 416523;
   $data = ['ac'=>$ac,'uid'=>$uid,'pwd'=>$pwd,'mobile'=>$moblie,'content'=>$content,'template'=>$template];
   //初始cUrl回话
   $ch = curl_init();
   //设置请求的选项，包括具体的url
    curl_setopt($ch, CURLOPT_URL,$url);  //需要请求的url
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);  //将curl_exec()获取的信息以字符串返回而不是直接输出
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
    curl_setopt($ch,CURLOPT_HEADER,0);    //启用时会将头文件的信息作为数据流输出。
    curl_setopt($ch,CURLINFO_HEADER_OUT,TRUE);  //TRUE 时追踪句柄的请求字符串。
    curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
    curl_setopt($ch,CURLOPT_POST,1);
    curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($data));
    //获得结果
    $json_data = curl_exec($ch);
    //释放curl
    curl_close($ch);

    $data = json_to_array($json_data);
    if($data['stat'] === 100){
        return  "短信发送成功 ";
    }else{
        return $data['message'];
    }

}
//
function generate_code($length = 6){
    /* pow(x,y) 返回x的y次方
     * mt_rand(0, pow(10, $length) - 1)  0 到 10的六次方-1 的随机数
     * str_+pad(如果mt_rand的值不够6位的话就拿0填充到六位，从左侧填写)
     * */
    return str_pad(mt_rand(0, pow(10, $length) - 1), $length, '0', STR_PAD_LEFT);
}
function json_to_array($p)
{
    if( mb_detect_encoding($p,array('ASCII','UTF-8','GB2312','GBK')) != 'UTF-8' )
    {
        $p = iconv('GBK','UTF-8',$p);
    }
    return json_decode($p, true);
}
//手机号归属地接口
function phone_ascription($phone = 15832003493){
    $url = "http://tcc.taobao.com/cc/json/mobile_tel_segment.htm";
    $data = ['tel'=>$phone];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);  //需要请求的url
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);  //将curl_exec()获取的信息以字符串返回而不是直接输出
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
    curl_setopt($ch,CURLOPT_HEADER,0);    //启用时会将头文件的信息作为数据流输出。
    curl_setopt($ch,CURLINFO_HEADER_OUT,TRUE);  //TRUE 时追踪句柄的请求字符串。
    curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
    curl_setopt($ch,CURLOPT_POST,1);
    curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($data));
    // 执行HTTP请求
    $res = curl_exec($ch);   //取回结果
    //释放句柄
    curl_close($ch);
    $res = trim(explode('=',$res)[1]);   //得到返回值
    $res = iconv('gbk','utf-8', $res);   //将gbk转化为utf8
    $res = str_replace("'",'"', $res);    //给数组中的单引号替换成双引号
    $res = preg_replace('/(\w+):/is', '"$1":', $res);  //给json格式的键加上双引号
    $res = json_decode($res, true);
    return $res['province'];







}




