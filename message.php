<?php

// 引用一个类
// include('test.php');
include('DBconn.php');

header('Content-Type:text/plain;charset=utf-8');

// $a=new nyc(7);
// $a->c();
// 接收表单内容
$content=$_POST["content"];
$contact=$_POST["contact"];
echo checks($contact);

if(!checks($content)){
	die("留言内容不能为空");
}
function checks($cc ){
	if( $cc == ''){
		return false;
	}
	return true;
}

//设置数据库数据传输编码

$time=time();

echo $content;
echo $contact;
echo $time;

$mysql->query("INSERT INTO `message`.`msg` (`contact`, `contents`, `time`) VALUES ('{$contact}', '{$content}', '{$time}');");
// printf('insertid:%d',$mysql->insert_id)
header('location:gbook.php');

// printf('insertid:%d',$mysql->insert_id)
// $_POST post表单内容，$_GET get表单内容
// var_dump($content,$contact);
// var_dump($_POST);
?>