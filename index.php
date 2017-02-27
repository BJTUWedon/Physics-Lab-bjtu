<?php
header("Content-type: text/html; charset=utf-8"); 
//header("location:home.php");
//print_r($_SERVER["HTTP_USER_AGENT"]);
/*
if($_SERVER["HTTP_USER_AGENT"]=="Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 10.0; WOW64; Trident/7.0; .NET4.0C; .NET4.0E; .NET CLR 2.0.50727; .NET CLR 3.0.30729; .NET CLR 3.5.30729; InfoPath.2)")
echo "请不要使用360浏览器，建议下载<a href='http://rj.baidu.com/soft/detail/14744.html?ald'>Chrome浏览器</a>";
else header("location:home.php");*/
if(strpos($_SERVER["HTTP_USER_AGENT"],"NET CLR")&&strpos($_SERVER["HTTP_USER_AGENT"],"MSIE"))
	echo "请不要使用360浏览器，建议下载<a href='http://rj.baidu.com/soft/detail/14744.html?ald'>Chrome浏览器</a>";
else
	header("location:home.php");
?>
