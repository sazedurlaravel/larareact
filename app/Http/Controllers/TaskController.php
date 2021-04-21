<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    protected $user;


    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    //     $this->user = $this->guard()->user();

    // }//end __construct()

    public function index(){
        $data = Task::all();
        return response()->json($data);
    }
    public function create(){
        
    }
    public function edit($id){
        
    }

    public function store(Request $request){
       
        Task::create($request->all());
        $msg = "Data saved";
        return response()->json($msg);

    }

    public function update(Request $request,$id){
        $data = Task::find($id);
        $data->task_name = $request->task_name;
        $data->save();
        
        return response()->json(["msg"=>'Data updated']);
    }

    public function delete($id){
        $data = Task::find($id);
        $data->delete();
        return response()->json("Data Deleted Success ");
    }
    public function filestore(){
        
        request()->validate([
            'img*' => 'required|mimes:pdf'
        ]);
       if(request()->hasFile('img')){
            $file_path = "uploads";
           $files = request()->file('img');
           foreach($files as $file){
                $file_name = uniqid().".".$file->getClientOriginalExtension();
            $file->move( $file_path, $file_name);
           }

           
       }
    }
    protected function guard()
    {
        return Auth::guard();

    }//end guard()


}
