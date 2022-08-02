<?php

namespace App\Http\Controllers;

use App\Enums\ProjectStatus;
use App\Enums\TaskStatus;
use App\Models\Project;
use App\Models\ProjectTask;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        $context = [
            'projects' => $projects,
        ];
        return view('Project.list',$context);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        // Hiển thị danh sách Task để add vào dự án
        $task_list = Task::where('status',TaskStatus::On)->get();
        $context = [
            'users' => $users,
            'task_list' => $task_list
        ];
        return view("Project.create",$context);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // sau submit
        $storeP = Project::create($request->all());
        if ($storeP){
            return back()->with('success', 'Đã tạo dự án mới!');
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
        // Tìm các task của project hiện tại
        $projects = Project::find($id)->tasks;
        // Lấy id của project hiện tại
        $projectsName = Project::find($id);
        return view('Project.project_detail',compact('projects','projectsName'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::all();
        $project = Project::find($id);
        // Lấy id user của project hiện tại
        $get_id_user = $project->user_id;
        return view('Project.update', compact('project', 'users','get_id_user'));
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
        $up = Project::find($id)->update($request->all());
        if($up) {
            return back()->with('success', 'Cập nhật dự án thành công!');
        }else
            return back()->with('error', 'Cập nhật dự án thất bại!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Project::find($id)->delete();
        if($delete) {
            return back()->with('error', 'Đã xóa 1 dự án!');
        }
    }
}
