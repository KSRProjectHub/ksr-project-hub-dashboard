<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kyslik\ColumnSortable\Sortable;
use App\Models\UserDetails;
use App\Helpers\Helper;
use Validator;
use Mail;
use App\Mail\SendEmail;
use App\Mail\SendEmailToKsr;

class UserDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filterby = $request->filterby;
        $filter = $request->query('filter');
        
        $icons = [
            'pdf' => 'pdf',
            'doc' => 'word',
            'docx' => 'word',
            'xls' => 'excel',
            'xlsx' => 'excel',
            'png' => 'image',
            'jpg' => 'image',
            'jpeg' => 'image',
        ];
        
        if (!empty($filter)) {
            $userDetails = UserDetails::sortable()
                            ->where($filterby, 'like', '%'.$filter.'%')
                            ->paginate(5);
        } else {
            $userDetails = UserDetails::sortable()
                            ->paginate(5);
        }

        return view('users.projDetails')
                ->with('userDetails',$userDetails)
                ->with('filter',$filter)
                ->with('icons',$icons);
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
        $dates =  now()->format('Ymd');
        $name=bin2hex($request->fname);        
        $prefix= 'cus';


        $combinedprefix = $prefix.$date;

        $cid = Helper::IDGenerator(new UserDetails, 'cust_id', 4, $combinedprefix);

        $q = new UserDetails;

        $q->cust_id=$cid;
        $q->fname=$request->fname;
        $q->lname=$request->lname;
        $q->fullname=$request->fname . " " . $request->lname;
        $q->contactNo=$request->contactNo;
        $q->email=$request->email;
        $q->noOfMembers=$request->noOfMembers;
        $q->request_for=$request->request_for;
        $q->deadline=$request->deadline;
        $q->terms_and_conditions=$request->has('terms_and_conditions') ? '1' : '0';
        $q->description=$request->description;
        $q->institute=$request->institute;
        $q->module=$request->module;
        $q->status="Pending";

        //path for group assignment
        $path = 'docs/'.$cid.'/projectDoc';

        //path for er diagram
        $path1 = 'docs/'.$cid.'/er';

        $file = $request->file('projectDoc');
        $new_file_name = 'ga'.$cid.'.'.$file->getClientOriginalExtension();

        $file->move(public_path($path), $new_file_name);

        $file1 = $request->file('er_diagram');
        $new_file_name1 = 'er'.$cid.'.'.$file1->getClientOriginalExtension();

        $file1->move(public_path($path1), $new_file_name1);

        $q->projectDoc=$new_file_name;
        $q->er_diagram=$new_file_name1;
 
        $q->save();

        $mailData = [

            'title' => 'KSR ProjectHub',
            'body' => 'Your ID is '.$cid,
            'id' => $cid,
            'name'=> $request->fname . " " . $request->lname,
            'status'=>'Pending'

        ];

        Mail::to($request->email)->send(new SendEmail($mailData));

        $mailD = [
            'title' => 'New Project Recieved.',
            'name' => $request->fname . " " . $request->lname,
            'customer_id'=> $cid,
            'email'=> $request->email,
            'contact_no'=> $request->contactNo,
            'deadline'=> $request->deadline,
            'noofmembers'=> $request->noOfMembers,
            'request_for'=> $request->request_for,
            'institute'=> $request->institute,
            'module'=> $request->module,
            'description'=> $request->description,
        ];
        //dd("Email is sent successfully.");
        Mail::to("ksrprojecthub@gmail.com")->send(new SendEmailToKsr($mailD));
        return view('projects.userthank');

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
