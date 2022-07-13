<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\Topic;
use App\Models\User;
use App\Models\Terms;
use Illuminate\Support\Facades\Schema;
use Kyslik\Column\Sortable\Sortable;
use Image;

class TermsAndConditionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = $request->query('filter');

        if (!empty($filter)) {
            $terms = Terms::join('users', 'users.id', '=', 'terms.user_id')
                            ->join('user_types', 'user_types.id', '=', 'users.role_id')
                            ->select(DB::raw(('CONCAT_WS(" ",`fname`, `lname`) AS fullname')), 'terms.*', 'users.profileimage', 'user_types.userType')
                            ->sortable()
                            ->where('terms.title', 'like', '%'.$filter.'%')
                            ->paginate(5);
        } else {
            $terms = Terms::join('users', 'users.id', '=', 'terms.user_id')
                            ->join('user_types', 'user_types.id', '=', 'users.role_id')
                            ->select(DB::raw(('CONCAT_WS(" ",`fname`, `lname`) AS fullname')), 'terms.*', 'users.profileimage',  'user_types.userType')
                            ->sortable()
                            ->paginate(5);
        }
        
        return view('termsandconds.terms')->with('terms', $terms)->with('filter', $filter);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('termsandconds.addterms');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $terms = Terms::create([
            'editor' => $request->editor,
            'title' => $request->title,
            'version' => $request->version,
            'user_id' => Auth::user()->id,
            'updated_by' => Auth::user()->id
        ]);

        if(!$terms){
            return back()->with('err', 'Couldnot save the terms');
        }

        return redirect()->to('termsandconds.terms')->with('suc', 'Save the terms successfully..!!');
        
    }

    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();
      
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
      
            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();
      
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
      
            //Upload File
            $request->file('upload')->storeAs('public/uploads', $filenametostore);
            $request->file('upload')->storeAs('public/uploads/thumbnail', $filenametostore);
     
            //Resize image here
            $thumbnailpath = public_path('storage/uploads/thumbnail/'.$filenametostore);
            $img = Image::make($thumbnailpath)->resize(500, 150, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbnailpath);
     
            echo json_encode([
                'default' => asset('storage/uploads/'.$filenametostore),
                '500' => asset('storage/uploads/thumbnail/'.$filenametostore)
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $term = Terms::find($id);

        return view('termsandconds.viewterm')->with('term', $term);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $term = Terms::find($id);
        return view('termsandconds.editterm')->with('term', $term);
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
        $terms = Terms::where('id', $request->id)->update([
            'editor' => $request->editor,
            'title' => $request->title,
            'updated_by' => Auth::user()->id
        ]);

        if(!$terms){
            return back()->with('err', 'Couldnot update the terms');
        }
        //$updateterm = Terms::find($id);

        return redirect('admin/userterms')->with('suc', 'Terms updated succesfully..!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $term = Terms::find($id);
        $term->delete();

        return redirect('admin/userterms')->with('err', 'Terms deleted succesfully..!!');
    }
}
