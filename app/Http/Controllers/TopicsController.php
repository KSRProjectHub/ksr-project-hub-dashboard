<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Kyslik\Column\Sortable\Sortable;

class TopicsController extends Controller
{
    //View all topics
    public function viewTopics(){
        $topics = Topic::join('users', 'users.id', '=', 'topics.user_id')
                        ->join('user_types', 'user_types.id', '=', 'users.role_id')
                        //->select('users.*', 'topics.*')
                        ->select(DB::raw(('CONCAT_WS(" ",`fname`, `lname`) AS full_name')), 'topics.*', 'user_types.userType')
                        ->sortable()
                        ->paginate(5);
        return view('projects.topic.topics', compact('topics'));
    }

    //Add new topic
    public function add(Request $r){
        $r->validate ([
            'topic'=>['required']
        ]);

        $topic = new Topic();

        $topic->topic = $r->topic;
        $topic->user_id= Auth::user()->id;

        $topic->save();

        return redirect('u/topics')->with('add_topic', $r->topic. ' added successfully!');
    }

    //view by id
    public function getTopic($id){
        $topics = Topic::find('id', $id);

        return view('projects.modals.topics.update', compact('topics'));
    }

    //Update
    public function update(Request $req){

        $topic = Topic::find($req->id);
        $topic->topic = $req->topic;

        $topic->save();

        return redirect('u/topics')->with('update_topic', $req->topic. ' updated successfully!');
    }

    //Delete
    public function destroy($topic_id){
        //$topic->delete();
        //dd(Topic::destroy($id));
        //DB::delete('delete from topics where id = ?',[$id]);

        $topic=Topic::where('id', $topic_id);
        $topic->delete();
        
        return redirect()->route('get.topics')->with('delete_topic', 'Record Deleted..!');
    }

    public function indexFiltering(Request $request){

        $filter = $request->query('filter');

        if (!empty($filter)) {
            $topics = Topic::join('users', 'users.id', '=', 'topics.user_id')
                            ->join('user_types', 'user_types.id', '=', 'users.role_id')
                            ->select(DB::raw(('CONCAT_WS(" ",`fname`, `lname`) AS fullname')),'users.profileimage', 'topics.*', 'user_types.userType')
                            ->sortable()
                            ->where('topic', 'like', '%'.$filter.'%')
                            ->paginate(5);
        } else {
            $topics = Topic::join('users', 'users.id', '=', 'topics.user_id')
                            ->join('user_types', 'user_types.id', '=', 'users.role_id')
                            ->select(DB::raw(('CONCAT_WS(" ",`fname`, `lname`) AS fullname')),'users.profileimage', 'topics.*', 'user_types.userType')
                            ->sortable()
                            ->paginate(5);
        }

        return view('projects.topic.topics')->with('topics', $topics)->with('filter', $filter);
    }
}
