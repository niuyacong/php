<?php
//单行注释
# 单行注释
/*
多行注释
*/

# 1、变量以$开头，后面跟字母
$first='nyc';
echo $first;
header('Content-Type:text/plain;charset=utf-8');
echo "这是我的第一个php程序";
echo '<br/>';
// echo 后面的单引号和双引号都是字符串
// 区别在于，双引号可以解析里面的变量
// 例子
echo 'string$first';
echo "string$first";
// 关于数组  数组中的键必须唯一，值可以为任意类型
$sz=[1,2,3];
$sz1=array(4,5,6 );

// 自定义数组
$sz2=array('a' =>1 , 'c' =>2 );
//数组的相关操作
//增
$sz2['d']=3;
//删
unset($sz['c']);
//查
echo $sz2['a'];
//改
$sz2['d']=4;

// var_dump会输出变量类型及数值
var_dump($sz,$sz1,$sz2);

// . 链接两个变量
$test=123;
$test1=789;
echo  $test1 . $test;


// 类
/**
 *  
 */
echo "--------------------------------------------";
class nyc
{
	public $a=1;
	// 类实例化 初始化方法
	public function __construct($aa){
		// 给类的属性赋值
		$this->a=$aa;
	}
	function a()
	{
		// 在类的方法中，调用同级的方法
		$this->c();
		//echo "0";
	}
	function c()
	{
		echo $this->a;
	}
}
// 实例化类
// $a=new nyc(5);
// 调用类的方法和属性
// echo $a->a;
// echo $a->c();
?>