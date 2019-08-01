<?php
header('Content-Type:text/plain;charset=utf-8');
$addr="localhost";
$port="3306";
$user="root";
$pwd="root";

$mysql=new mysqli($addr,$user,$pwd,"message");
// var_dump($mysql);

if($mysql->connect_errno){
	echo "数据库链接失败";
}
$mysql->query("SET NAMES UTF8");

//把结果放到数组中
$rows=[];
// $data=$mysql->query("select * from msg");
// var_dump($data->fetch_array(MYSQLI_ASSOC));
$data=$mysql->query("select * from msg");
while( $row=$data->fetch_array(MYSQLI_ASSOC)) {
	$rows[]=$row;
}
var_dump($rows);
// $mysql->query("INSERT INTO `message`.`msg` (`contact`, `contents`, `addtime`) VALUES ('1', 'nyc', '123');");
// printf('insertid:%d',$mysql->insert_id)
// $data=$mysql->query("select * from msg limit 1");
// var_dump($data)
?>