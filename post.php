<?php
	$url = "http://www.douyutv.com/stool/show_status/7118523";
	$post_data=array(""=>'');
	$ch=curl_init();
	curl_setopt($ch,CURLOPT_URL, $url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_POST,1);
	curl_setopt($ch,CURLOPT_POSTFIELDS,$post_data);
	$output=curl_exec($ch);
	curl_close($ch);
	print_r($output);
?>