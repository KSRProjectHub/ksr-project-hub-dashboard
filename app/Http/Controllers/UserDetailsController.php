<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kyslik\ColumnSortable\Sortable;
use App\Models\UserDetails;
use App\Helpers\Helper;
use Validator;

class UserDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userDetails = UserDetails::sortable()->get();

        return view('users.projDetails')
                ->with('userDetails',$userDetails);
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
        //validate fields
       /* $this->validate($request,[
            'fname'=>['required', 'string', 'max:255'],
            'lname'=>['required', 'string', 'max:255'],
            'contactNo'=>['required', 'unique:user_details'],
            'email'=>['required', 'unique:user_details'],
            'noOfMmbers'=>'required',
            'deadline'=>'required',
            'terms_and_condition'=>'required',
            'description'=>'required',
            'institute'=>'required',
            'module'=>'required',
            'projectDoc'=>'required',
        ]);*/

        $date =  now()->format('ymd');
        $prefix= 'cus';

        $combinedprefix = $prefix.$date;

        $cid = Helper::IDGenerator(new UserDetails, 'cust_id', 4, $combinedprefix);

        $q = new UserDetails;

        $q->cust_id=$cid;
        $q->fname=$request->fname;
        $q->lname=$request->lname;
        $q->contactNo=$request->contactNo;
        $q->email=$request->email;
        $q->noOfMembers=$request->noOfMembers;
        $q->deadline=$request->deadline;
        $q->terms_and_conditions=$request->has('terms_and_conditions') ? '1' : '0';
        $q->description=$request->description;
        $q->institute=$request->institute;
        $q->module=$request->module;

        $path = 'projectDoc/'.$cid;
        $file = $request->file('projectDoc');
        $new_file_name = 'ga'.$cid.'.'.$file->getClientOriginalExtension();

        $q->projectDoc=$request->projectDoc->move(public_path($path), $new_file_name);
 
        $q->save();

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
