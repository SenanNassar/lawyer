<?php

namespace App\Http\Controllers;
use App\Employee;
use App\SiteInfo;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //


    public function index(){
        $emps = Employee::all();
        $info = SiteInfo::where(['id' => 1])->first();  
    
        return view('index', ['emps'=>$emps, 'info'=>$info]);
    }
}
