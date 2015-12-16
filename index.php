<?php
//echo phpinfo();exit;
header("Content-type: text/html; charset=utf8");
//$ss=file_get_contents('http://www.douyutv.com/156277');
//$aa=preg_match_all('/(.*?)\<param name=\"flashvars\"(.*?)\>(.*?)/i',$ss,$match);

//var_dump($match);exit;
$post='http://www.douyutv.com/'
$url="http://www.douyutv.com/directory/game/How";
$curl=curl_init();
curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl,CURLOPT_HEADER,0);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
$data=curl_exec($curl);
curl_close($curl);
preg_match('/pageCount:parseInt\("(\d+)"\)/',$data,$page);//获取页数
preg_match('/<div class="items items01 clearfix" id="item_data"><ul>(.*?)<\/ul>/is',$data,$matall);//获取首页抓取区域
preg_match_all('/<li><a href="\/(.*?)" class="list" title="(.*?)">(.*?)data-original="(.*?)"(.*?)<span class="view">(.*?)<\/span><span class="nnt">(.*?)<\/span>/is',$matall[1],$matall2);//抓取列表
$arr=array();
for($i=0;$i<count($matall2[0]);$i++){
	$arr[$i]=array($matall2[1][$i],$matall2[2][$i],$matall2[4][$i],$matall2[6][$i],$matall2[7][$i]);//链接，标题，缩略图，人数，主播名称
}


$pagenum=intval($page[1]);
if($pagenum>1){
	for($j=1;$j<$pagenum;$j++){
		$loopurl=$url.'?page='.($j+1);
		$curl=curl_init();
		curl_setopt($curl,CURLOPT_URL,$loopurl);
		curl_setopt($curl,CURLOPT_HEADER,0);
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
		$data=curl_exec($curl);
		curl_close($curl);
		preg_match('/<div class="items items01 clearfix" id="item_data"><ul>(.*?)<\/ul>/is',$data,$matall);//获取首页抓取区域
		preg_match_all('/<li><a href="\/(.*?)" class="list" title="(.*?)">(.*?)data-original="(.*?)"(.*?)<span class="view">(.*?)<\/span><span class="nnt">(.*?)<\/span>/is',$matall[1],$matall2);//抓取列表
		for($i=0;$i<count($matall2[0]);$i++){
			array_push($arr,array($matall2[1][$i],$matall2[2][$i],$matall2[4][$i],$matall2[6][$i],$matall2[7][$i]));//链接，标题，缩略图，人数，主播名称
		}
	}
}


var_dump(count($arr));
//var_dump($matall2);
//var_dump($matall);
//print_r($data);
//var_dump(json_decode($data));

?>