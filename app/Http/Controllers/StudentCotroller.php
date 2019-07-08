<?php
namespace App\Http\Controllers;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentCotroller extends  Controller{
    public function test1(){
//        //查
//        $student = DB::select('select * from student');
//        return dd($student);
//        //增
//        $bool = DB::insert('insert into student(name,age) values(?,?)',['sean',18]);
//        return var_dump($bool);
//       //该
//        $num = DB::update('update student set age=? where name=?',[19,'sean']);
//        return var_dump($num);
        //删
//        $num = DB::delete('delete from student where age>?',[18]);
//        return $num;
    }


    // 构造器 查询
    public function  query1(){
//        $bool = DB::table('student')->insert(
//        ['name'=>'zhangsan','age'=>19]
//        );
//        return var_dump($bool);

//
//        //新增时返回id
//        $id = DB::table('student')->insertGetId(
//            ['name'=>'Lisi','age'=>29]
//        );
//        return var_dump($id);

        //批量新增
        $bool = DB::table('student')->insert(
            [
            ['name'=>'wangwu1','age'=>15],
            ['name'=>'Zhangliu1','age'=>10],
            ]
        );
        var_dump($bool);
    }

    //查询构造器新增数据
    public function query2(){

//        //更新
//        $num = DB::table('student')
//            ->where('id',3)
//            ->update(['age'=>30]);
//
//        var_dump($num);

//        //自增  无条件 全部自增
//        $num = DB::table('student')->increment('age');
//        var_dump($num);
//        //自增  无条件 全部自增3
//        $num = DB::table('student')->increment('age',3);
//        var_dump($num);

//        //自减
//        $num = DB::table('student')->decrement('age');
        //自减 有条件
        $num = DB::table('student')
            ->where('id',3)
            ->decrement('age');

    }

    //查询构造器删除数据
    public function  query3(){
        $num = DB::table('student')
            ->where('id','>=',3)
            ->delete();

        var_dump($num);
    }



    //查询构造器查询数据
    public function  query4(){
//        $bool = DB::table('student')
//            ->insert(
//                [
//                ['id'=>1006,'name'=>'name1','age'=>18],
//                ['id'=>1002,'name'=>'name2','age'=>19],
//                ['id'=>1003,'name'=>'name3','age'=>11],
//                ['id'=>1004,'name'=>'name4','age'=>13],
//                ['id'=>1005,'name'=>'name5','age'=>15]
//                ]
//            );
//
//        var_dump($bool);

//        $student = DB::table('student')->get();
//        dd($student);

//        $student = DB::table('student')
//            ->orderby('id','desc')
//            ->first();
//        dd($student);

//        $student = DB::table('student')
//            ->orderby('id','>=',1002)
//            ->get();
//        dd($student);
//        //多条件
//        $student = DB::table('student')
//            ->whereRaw('id >= ? and age > ?',[1001,16])
//            ->get();
//        dd($student);

//        //pluck 只返回特定字段
//        $names = DB::table('student')
//            ->pluck('name');
//         dd($names);

//        //指定查找多个字段
//        $names = DB::table('student')
//            ->select('id','name')
//            ->get();
//        dd($names);

//        //查询大量数据  分批查询 每次查两条
//        echo '<pre>';
//        DB::table('student')->chunk(2,function($students){
//                var_dump($students);
//                if(false){
//                    return false;
//                }
//
//        });

    }
//    public function  query5(){
////        $num = DB::table('student')->count();
//
//        $num = DB::table('student')->max('age');//avg()
//        var_dump($num);
//    }



    public function  orm1(){
//        //all()
//        $student = Student::all();
//        dd($student);
//        //find()
//        $student = Student::find(1001);
//        dd($student);
//        //findOrFail()
//        $student = Student::findOrFail(1001);
//        dd($student);


//        $student = Student::get();
//        dd($student);


//        $student = Student::where('id','>',1003)
//        ->orderBy('age','desc')
//        ->first();
//        dd($student);


        //chunk
//        echo '<pre>';
//        Student::chunk(2,function($s){
//            dd($s);
//        });

        //聚合
//        $num = Student::count();
        $students = Student::where('id','>',1003)->max('age');
        var_dump($students);
    }

    public function orm2(){
        //使用模型新增数据
//        $student = new Student();
//        $student->name = 'sean1';
//        $student->age = 10;
//        $bool = $student->save();
//        dd($bool);


//        $student = Student::find(1008);
////        echo $student->created_at;
//        //自定义时间格式
//        echo date('Y-m-d H:i:s',$student->created_at);


        //使用模型的Create方法新增数据
//        $student = Student::create(
//            ['name'=>'imooc','age' =>18]
//        );
//        dd($student);


//        //firstOrCreate()
//        $student =  Student::firstOrCreate(
//            ['name'=>'imooc']
//        );
//        dd($student);


        //firstOtNew() + save() = firstOrCreate()
        $student =  Student::firstOrNew(
            ['name'=>'imooc']
        );
        $student->save();
        dd($student);

    }

    public function orm3(){
        //通过模型更新数据
        $student =  Student::find(1008);
        $student->name = 'ki';
        $student->save();


        $num = Student::where('id','>','1008')->update(
          ['age'=>41]
        );
        var_dump($num);

    }

    public function orm4(){
//        //通过模型删除
//        $student = Student::find(1007);
//        $bool = $student->delete();
//        var_dump($bool);

//        //通过主键删除
//        $bool = Student::destroy([1008,1009]);
//        var_dump($bool);

        //通过条件删除
        $num = Student::where('id','>','1009')->delete();
        var_dump($num);

    }

    public function section1(){
        return view('student.section1');
//        return view('layout');
    }

    public function request1(Request $request){

        //1.取值
        //打印传过来的参数或默认值
//        echo $request->input('sex','未知');


        //判断是否有参数传进来
//        if($request->has('name')){
//            echo $request->input('name');
//        }else{
//            echo '无参数';
//        }

//        //获取所有参数
//        $res = $request->all();
//        dd($res);

        //2.判断请求类型
//        echo $request->method();
//
//        if($request->isMethod('Get')){
//            echo 'yse';
//        }else{
//            echo 'No';
//        }
//
//        $res = $request->ajax();
//        var_dump($res);


        //路由是否是student下的请求
//        $res = $request->is('student/*');
//        var_dump($res);
//
//        echo $request->url();

    }


    public function session1(Request $request){
//        //法一1.HTTP  request session()
//        $request->session()->put('key1','value1');

//        //法二2.session()
//        session()->put('key2','value2');


//        //法三3.Session类
//        //存放
//        \Session::put('key3','value3');
//        //获取
//        echo \Session::get('key3','defaut');

//        //以数组形式存储数据
//        \Session::put(['key4'=>'value4']);

        //把数据存放在Session数组中
//        \Session::push('student','sean');
//        \Session::push('student','bob');

        //        echo $request->session()->get('key3');
//        $request =  \Session::get('student','default');
//        var_dump($request);

        //取出后删除
        $res = \Session::pull('student','default');
        //取出所有值
        $res = \Session::all();

//        //判断session某个key是否存在
//        if(\Session::has('key1')){
//            $res =\Session::all();
//            dd($res);
//        }else{
//            echo '..';
//        }

    }

    public function session2(Request $request){

//        $res = \Session::all();
//        var_dump($res);
//
//        //删除某个指定key
//        \Session::forget('key1');
//
//        $res = \Session::all();
//        dd($res);
//
//
//        //清空所有Session数据
//        \Session::flush();
//
//        //暂存数据 用一次后删除
//        \Session::flash('key_flash','value_flash');


        return \Session::get('message','暂无信息');
//        return 'session2';

    }



    public function  response(){
//        //相应json
//        $data = [
//            'errorCode' =>0,
//            'errMsg' =>'success',
//            'data'=>'sean',
//        ];
////        var_dump($data);
//        return response()->json($data);



//        //重定向
//        写法一： 'session2'是路由里的
//        return redirect('session2')->with('message','快闪数据');
        //写法二    action()
//        return redirect()->action('StudentCotroller@session2')->with('message','快闪数据');
//        //写法三    route()
//        return redirect()->route('ss2')
//                       ->with('message','快闪数据');


//        //返回上一级目录
//        return redirect()->back();

    }

    //中间件

    //活动宣传页面
   public function activity0(){
    return '活动快要开始';
   }
   public function activity1(){
        return '活动正在进行中，谢谢参与1';
   }
    public function activity2(){
        return '活动正在进行中，谢谢参与2';
    }

}