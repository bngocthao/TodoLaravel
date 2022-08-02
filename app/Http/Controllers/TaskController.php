<?php

namespace App\Http\Controllers;

use App\Enums\ProjectStatus;
use App\Enums\TaskStatus;
use App\Models\Project;
use App\Models\ProjectTask;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Load dữ liệu task ra view
        $task_list = Task::where('status',TaskStatus::On)->get();
        $context = [
            'task_list' => $task_list,
        ];
        return view('Task.list',$context);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Hiễn thị form thêm công việc
        // Load dữ liệu Project để chọn task thuộc project nào
        $project_list = Project::where('status',ProjectStatus::On)->get();
        $context = [
            'project_list' => $project_list,
        ];
        return view('Task.create',$context);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Xử lý dữ liệu
        $create_task = Task::create($request->all());
        $project_list = Project::where('status',ProjectStatus::On)->get();
        if($create_task){
            return back()->with('success', 'Tạo công việc thành công!');
        }else{
            return back()->with('error', 'Thêm mới thất bại!');
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
        $tasks = Task::find($id);
        // Lấy id project hiện tại, đem so sánh với project_id trong bảng Tasks
        $get_id_project = $tasks->project_id;
        // Đổ dữ liệu bảng Project ra view update
        $project_list = Project::where('status',ProjectStatus::On)->get();
        return view('Task.update',compact('tasks','get_id_project','project_list'));
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
        $update = Task::find($id)->update($request->all());
        if($update){
            return back()->with('success', 'Đã cập nhật công việc!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Task::find($id)->delete();
        if($delete){
            return back()->with('error', 'Đã xóa 1 công việc!');
        }
    }
}
