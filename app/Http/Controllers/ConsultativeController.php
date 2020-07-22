<?php

namespace App\Http\Controllers;

use App\Consultative;
use Illuminate\Http\Request;
use DataTables;
use Redirect, Response;


class ConsultativeController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
                $data = Consultative::latest()->get();

               return  DataTables::of($data)
                 ->addIndexColumn()
                 ->addColumn('action', function($row){
                    //{!--  <a class="btn btn-success" id="edit-cons" data-toggle="modal" data-id='.$row->id.'>تعديل </a>--}
                 $action = '<div style="margin:auto">
                 <a class="btn btn-info text-white" id="show-cons" data-toggle="modal" data-id='.$row->id.'> <i class="fas fa-expand-arrows-alt"></i></a>
                 <meta name="csrf-token" content="{{ csrf_token() }}">
                 <a id="delete-cons" data-id='.$row->id.' class="btn btn-danger delete-cons text-white"> <i class="far fa-trash-alt"></i></a></div>';

                return $action;

            })
             ->rawColumns(['action'])
             ->make(true);
            }

            return view('show');
    }

public function store(Request $request)
            {

            $r=$request->validate([

            'name' => 'required',
            'email' => 'required',

            ]);

            $uId = $request->cons_id;
            Consultative::updateOrCreate(['id' => $uId],['name' => $request->name, 'email' => $request->email, 'title' => $request->title,'body' => $request->body, 'phone_number' => $request->phone_number ]);
            if(empty($request->cons_id))
            $msg = 'تم الحفظ بنجاح';
            else
            $msg = 'تم التعديل بنجاح';
            return redirect()->route('admin.consRequst.index')->with('success',$msg);
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


    /**
     * Display the specified resource.
     *
     * @param  \App\Consultative  $consultative
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $where = array('id' => $id);
        $user = Consultative::where($where)->first();
        return Response::json($user);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consultative  $consultative
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $user = Consultative::where($where)->first();
        return Response::json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consultative  $consultative
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consultative $consultative)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consultative  $consultative
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $user = Consultative::where('id',$id)->delete();
        return Response::json($user);
    }
}
