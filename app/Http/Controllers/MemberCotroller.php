<?php
namespace App\Http\Controllers;
use App\Member;

class MemberCotroller extends  Controller{

    public  function info($id){
//        return 'member-info'.$id;
//        return route('meminfo');
//        return view('member/info');
        return Member::getMember();
    }
}
