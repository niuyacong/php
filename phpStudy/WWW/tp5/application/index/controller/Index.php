<?php
namespace app\index\controller;

// 调用后台控制器方法，名称也为Index需要重命名
use  \app\admin\controller\Index as AdminIndex;
use \app\index\controller\User;
use think\Db;
use \think\config as Config;
use \think\Env as env;
class Index
{
    public function index()
    {
    	$data=DB::table('msg')->select();
        return view();
    }

    public function indextest(){
    	return "方法";
    }
    //调用其他控制器方法
    public function test(){
    	//方法一 

    	$model1=new \app\index\controller\User;
    	echo $model1->index();

    	echo "<hr/>";
    	//方法二 使用use
    	$model2=new User;
    	echo $model2->index();

    	echo "<hr/>";
    	//方法三
    	$model3=controller('User');
    	echo $model3->index();

    	echo "<hr/>";

    	//方法四
    	echo action('User/index');

    	echo "<hr/>";
    	//调用后台控制器方法

    	$ht1=new \app\admin\controller\Index;
    	echo $ht1->index();

    	echo "<hr/>";

    	$ht2=new AdminIndex;
    	echo $ht2->index();

    	echo "<hr/>";

    	$ht3=controller("admin/Index");
    	echo $ht3->index();


    	echo "<hr/>";
    	//调用自己控制器中的方法
    	echo $this->indextest();

    	echo "<hr/>";
    	echo self::indextest();

    	echo "<hr/>";
    	echo Index::indextest();

    	echo "<hr/>";
    	echo action('indextest');
    }
// 获取config中的值，
    // 1、惯例配置\thinkphp\convention.php
    // 2、应用配置 \application\config.php
    // 3、扩展配置  \application\database.php \application\extra\用户自定义配置
    public function getConfig(){
    	echo "getconfig";
    	echo "<hr/>";
    	// 方法一 通过系统函数读取配置
    	echo config("name");
    	echo "<hr/>";

    	// 方法二 通过系统类读取配置
    	echo \think\config::get("age");
    	echo "<hr/>";
    	//使用命名空间
    	echo Config::get("habbit");
    	echo "<hr/>";
    	// 不存在返回null
    	var_dump(Config::get("acd"));
    	echo "<hr/>";
    	// 获取\application\config.php中的内容
    	echo Config::get("test");
    	echo "<hr/>";
    	// 获取扩展配置\application\database.php
    	echo config("database.type");
    	echo "<hr/>";
    	// 获取\application\extra\用户自定义配置
    	var_dump(config("user"));
    	echo "<hr/>";
    	echo config("user.name");
    	echo "<hr/>";
    }
    //应用场景  不同场景不同配置
    public function getChangJing(){
    	// 第一步  更新场景名称 \application\config.php app_status为home
    	// 第二步  在文件夹中新建场景对应文件 \application\  home.php
    	//第三步   写入配置，读取属性值
    	echo config("database.username");
    }
    // 前后台模块配置
    public function moduleConfig(){
    	//第一步  在对应目录新建config.php  \application\index前台目录
        //第二步  写入属性，读出属性
        echo config("name"); 
    }
    // 动态配置
    public function dongtaiConfig(){
    	echo config("name");
    	echo "<hr/>";
    	// 1、通过系统方法
    	config("name","hahhaha");
    	echo config("name");
    	echo "<hr/>";
    	// 2、通过系统类
    	\think\config::set("name","rty");
    	echo config("name");
    	echo "<hr/>";
    	// 命令空间
    	Config::set("name","user");
    	echo config("name");
    }

    // 配置文件之间的优先级问题 
    // 动态配置>模块配置>场景配置>扩展配置>应用配置>惯例配置

    // 环境变量  在根目录下\WWW\tp5 新建.env文件
    // envparam=good  设置
    public function getEnv(){
    	echo \think\Env::get("envparam");
    	// 使用命名空间
    	echo "<hr/>";
    	echo env::get("envparam");
    	// 想在其他地方使用环境变量，引用命名空间就可以了
    }

    public function getCourse(){
    	echo input("id");
    }
    public function gettime(){
    	echo input("year")," ",input("month");
    }
    public function dongtai(){
    	echo input("a")." ".input("b");
    }
}
