<?php

/**
 * 使用get方式请求指定页面
 * @param  [type] $url [description]
 * @return [type]      [description]
 */
function curl_get_https($url){
    $curl = curl_init(); 
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); 
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false); 
    $tmpInfo = curl_exec($curl);
    curl_close($curl);
    return $tmpInfo;
}

/**
 * 取本文中间
 */
function getSubstr($str,$leftStr,$rightStr){
    $left = strpos($str, $leftStr);
    $right = strpos($str, $rightStr,$left);
    if($left <= 0 or $right < $left) return '';
    return substr($str, $left + strlen($leftStr), $right-$left-strlen($leftStr));
}
