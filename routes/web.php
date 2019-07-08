<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//基础路由
Route::get('basic1',function (){
    return 'hello world';
});

//多请求路由  指定响应方式
Route::match(['get','post'],'multi',function (){
    return 'multi';
});
//多请求路由  所有响应方式
Route::any('any',function (){
    return 'any';
});

//路由参数
Route::get('user/{id}',function ($id){
    return 'User-Id'.$id;
});
//Route::get('username/{name?}',function ($name='ss'){
//    return 'User-Nmae'.$name;
//});
//加入正则
Route::get('user/{name?}',function ($name='ss'){
    return 'User-Nmae'.$name;
})->where('name','[A-Za-z]+');
Route::get('user/{name?}/{id}',function ($name='ss',$id){
    return 'User-Nmae-'.$name.'User-Id-'.$id;
})->where(['name'=>'[A-Za-z]+','id'=>'[0-9]+']);

//路由别名
Route::get('user1/center',['as'=>'center',function(){
    return route('center');
}]);
////群组路由
//Route::group(['prefix'=>['member']],funtion(){
//    Route::get('user1/center',['as'=>'center',function(){
//        return route('center');
//    }]);
//    Route::any('any',function (){
//        return 'any';
//    });
//
//});

//路由中输出视图
Route::get('/view', function () {
    return view('welcome');
});


//Cotroller
//Route::get('member/info','MemberCotroller@info');
//Controller别名
Route::any('member/info',['uses'=>'MemberCotroller@info',
                           'as'=>'meminfo'
]);

//参数绑定
Route::get('member/{id}','MemberCotroller@info')->where('id','[0-9]+');



//使用
//普通sql查询
Route::get('test1', ['uses'=>'StudentCotroller@test1']);

//查询构造器查询
Route::get('query1', ['uses'=>'StudentCotroller@query1']);
Route::get('query2', ['uses'=>'StudentCotroller@query2']);
Route::get('query3', ['uses'=>'StudentCotroller@query3']);
Route::get('query4', ['uses'=>'StudentCotroller@query4']);
Route::get('query5', ['uses'=>'StudentCotroller@query5']);

//orm查询
Route::get('orm1', ['uses'=>'StudentCotroller@orm1']);
Route::get('orm2', ['uses'=>'StudentCotroller@orm2']);
Route::get('orm3', ['uses'=>'StudentCotroller@orm3']);
Route::get('orm4', ['uses'=>'StudentCotroller@orm4']);

//blade模板
//Route::get('section1', ['uses'=>'StudentCotroller@section1']);


Route::get('request1', ['uses'=>'StudentCotroller@request1']);

//session
Route::group(['middleware'=>['web']],function (){
    Route::any('session1', ['uses'=>'StudentCotroller@session1']);
    Route::any('session2', [
        'as' =>'ss2',
        'uses'=>'StudentCotroller@session2'

    ]);
});


//response
Route::any('response', ['uses'=>'StudentCotroller@response']);


//middleware
//宣传页面
Route::any('activity0', ['uses'=>'StudentCotroller@activity0']);

//kernel写完之后  中间件指向kernel所写activity 活动页面
Route::group(['middleware'=>['activity']],function(){
    Route::any('activity1', ['uses'=>'StudentCotroller@activity1']);
    Route::any('activity2', ['uses'=>'StudentCotroller@activity2']);
});

