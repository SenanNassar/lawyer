<?php

namespace App\Http\Controllers;

use Validator;

use Redirect, Response;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function cleanup()
{    
       $table_name ='employees';
    DB::statement("SET @count = 0;");
    DB::statement("UPDATE `$table_name` SET `$table_name`.`id` = @count:= @count + 1;");
    DB::statement("ALTER TABLE `$table_name` AUTO_INCREMENT = 1;");
}




    public function index(Request $request)
    {
        $data = Employee::paginate(10);

        if ($request->ajax()) {
            return view('admin.empTable', compact('data'));
        }

        return view('admin.emp', compact('data'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required',
                'job_title' => 'required',
              ]);

        if ($validator->passes()) {

        $fileCV  = $request->file('cvs');

     
        if( $fileCV != null){
        $filenameCV =  $fileCV[0]->getClientOriginalName();
        $fileCV[0]->move(public_path('files') , $filenameCV);
        }else{
             $filenameCV = 'cv.png';
        }


        $fileIMG  = $request->file('img');
        if( $fileIMG != null){
                $filenameIMG =  $fileIMG[0]->getClientOriginalName();
                $fileIMG[0]->move(public_path('images'), $filenameIMG);
        }else{
                $filenameIMG = 'empty.jpg';
        }
    

            //echo 'ok';
         $uId = $request->emp_id;

        
                    $result =  Employee::updateOrCreate(
                         ['id' => $uId],
                         [
                             'name' => $request->name,
                             'email' => $request->email,
                             'job_title' => $request->job_title,
                             'job_desc' =>  $request->job_desc,
                             'linkedin' => $request->linkedin,
                             'cv' => '/files/'. $filenameCV,
                             'picture'=> '/images/'. $filenameIMG
                         ]

                     
                   );


              
                       
                   if(empty($request->emp_id))
                   $msg = 'تم الحفظ بنجاح';
                   else
                    $msg = 'تم التعديل بنجاح';


                //     echo $msg;
           return redirect()->route('admin.employee.index')->with('success',$msg);


   
        }


    //  if ($validator->passes()) {


        //$input = $request->all();

    //    $imageName = time() . '.' . $request->file('cvs')->extension();
    //    $request->file('cvs')->move(public_path('images'), $imageName);
       // AjaxImage::create($input);

// $r=$request->validate([

                    // 'name' => 'required',
                    // 'email' => 'required',

                    // ]);

                    // $uId = $request->cons_id;
                    // Consultative::updateOrCreate(['id' => $uId],['name' => $request->name, 'email' => $request->email, 'title' => $request->title,'body' => $request->body, 'phone_number' => $request->phone_number ]);
                    // if(empty($request->cons_id))
                    // $msg = 'تم الحفظ بنجاح';
                    // else
                    // $msg = 'تم التعديل بنجاح';
                 //    return redirect()->route('admin.consRequst.index')->with('success',$msg);


       // return response()->json(['success'=>'done']);
     // }


     // return response()->json(['error'=>$validator->errors()->all()]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $where = array('id' => $id);
        $user = Employee::where($where)->first();
        return  Response::json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $emp = Employee::where('id', $id)->delete();

        $msg = "شكرا لك ... تمت العملية بنجاح";

       $this->cleanup();

        return Response::json($emp);// redirect()->route('admin.employee.index')->with('success', $msg);
    }

   



}
   
