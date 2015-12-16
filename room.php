<?php
header("Content-type: text/html; charset=utf8");
$url="http://www.douyutv.com/261860";
$curl=curl_init();
curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl,CURLOPT_HEADER,0);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
$data=curl_exec($curl);
curl_close($curl);
preg_match('/<script type="text\/javascript">\s*var\s*\$ROOM\s*=(.*?);\s*<\/script>/is',$data,$matall);//抓取列表
$arr=json_decode($matall[1],true);
var_dump($arr);


//var_dump($matall2);
//var_dump($matall);
var_dump($matall);
//var_dump(json_decode($data));

?>