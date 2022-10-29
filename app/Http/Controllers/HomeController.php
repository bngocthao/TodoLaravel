<?php

namespace App\Http\Controllers;

use App\Enums\TaskStatus;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Enums\ProjectStatus;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $project = Project::all();
        $numberOfProject = count($project);
        $task = Task::all();
        $numberOfTask = count($task);
        $doneTask = Task::where('status',TaskStatus::Complete)->count();
        $doneProject = Project::where('status',ProjectStatus::Complete)->count();
        //truyền dữ liệu người dùng qua rasa
        function GetUserInfo()
        {
            $id = Auth::user()->id;
            $array = [
                'id' => $id,
            ];

            return json_encode($array);
        }
//        echo '<pre>';
//        print_r(GetUserInfo());
//        echo '</pre>';

//        $file_name = 'D:/Learn/HK1_N5/pycon37rasa2/db/'.date('Y-m-d'. '.json');
        $file_name = 'D:/Learn/HK1_N5/pycon37rasa2/db/'.'user_info'.'.json';


        if (file_put_contents($file_name, GetUserInfo()))
        {
            return view('home', compact('numberOfProject','numberOfTask','doneTask','doneProject'));
        }
        else
            echo 'sth wrong happen';
        // end truyền dl

    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
