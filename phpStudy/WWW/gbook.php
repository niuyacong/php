<?php

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
$data=$mysql->query("select * from msg");
while( $row=$data->fetch_array(MYSQLI_ASSOC)) {
	$rows[]=$row;
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>留言板</title>
</head>
<body>
<!-- 提交留言 -->
<div>
	<form action="message.php" method="post">
	<textarea cols="50" rows="5" name="content" placeholder="请输入留言内容"></textarea><br/>
	<input type="text" name="contact" />
	<input type="submit" name="submit" value="提交">
	</div>
</form>
	<!-- 留言列表 -->
	<?php
	foreach ($rows as $value) {
		# code...
	
	?>
	<div>
		<span><?php echo $value["contact"] ?></span>
		<span><?php echo time('Y-m-d H-i-s',$value["time"]) ?></span>
		<span><?php echo $value["contents"] ?></span>
	</div>
	<?php
	}
	?>
</body>
</html>