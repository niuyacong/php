<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use \think\Route;
// 静态路由
Route::rule('/','index/index/indextest');
// 带参数路由
Route::rule('course/:id','index/index/getcourse');
// 可选参数路由
Route::rule('time/:year/[:month]','index/index/gettime');
// 全动态路由(不推荐)
// Route::rule(':a/:b','index/index/dongtai');
// 完全匹配路由 末尾加$  /test1  能访问到  /test1/a/b不能访问
Route::rule('test1$','index/index/indextest');
// 允许访问的方式 get post put delete
Route::rule('/','index/index/indextest','get');
// 批量路由注册
Route::rule(['/'=>'index/index/indextest','course/:id'=>'index/index/getcourse']);

// 使用配置文件批量注册路由
return[
	'/'=>'index/index/indextest',
	'course/:id'=>'index/index/getcourse'

];

// return [
//     '__pattern__' => [
//         'name' => '\w+',
//     ],
//     '[hello]'     => [
//         ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
//         ':name' => ['index/hello', ['method' => 'post']],
//     ],

// ];
