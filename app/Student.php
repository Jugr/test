<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model{

    //指定表名
    protected $table = 'student';

    //指定id
    protected $primaryKey = 'id';

    //打开关闭时间戳
    public $timestamps = true;


    //允许批量赋值的字段
    protected $fillable = ['name','age'];
    //禁止赋值的字段
    protected $guarded = [];

    protected function getDateFormat()
    {
        return time();
    }

    //重载  显示长数据时间
    protected function asDateTime($value)
    {
        return $value;
    }
    public function fromDateTime($value)
    {
        return empty($value) ? $value : $this->getDateFormat();
    }

}