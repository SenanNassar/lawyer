<?php

namespace App\Http\Controllers;
use App\Employee;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //


    public function index(){
        $emps = Employee::all();
    
        return view('index', ['emps'=>$emps]);
    }
}
