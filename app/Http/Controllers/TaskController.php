<?php

namespace App\Http\Controllers;

use App\Models\ProjectTask;
use App\Repository\Task\TaskRepository;
use App\Rules\checkDateRule;
use App\Rules\checkTaskDateRule;
use Illuminate\Http\Request;
use App\Services\Task\TaskServices;

class TaskController extends Controller
{

    protected $task;
    public function __construct(TaskRepository $task){
        $this->task = $task;
    }

    public function index()
    {
        $getViewIndex = (new TaskServices())->getViewIndex();
        return view('Task.list',$getViewIndex);
    }

    public function create()
    {
        $getViewCreate = (new TaskServices())->getViewCreate();
        return view('Task.create',$getViewCreate);
    }

    public function store(Request $request)
    {
        // ràng buộc ngày
        $request -> validate([
            'end_at' => new checkTaskDateRule(),
        ]);
        // Xử lý dữ liệu
        $create_task = $this->task->store($request->all()); // Repo
        if($create_task){
            return back()->with('success', 'Tạo công việc thành công!');
        }else{
            return back()->with('error', 'Thêm mới thất bại!');
        }
    }

    public function show($id)
    {
        $getViewShow = (new TaskServices())->getViewShow($id);
        return view('Task.task_detail',$getViewShow);
    }


    public function edit($id)
    {
        $getViewEdit = (new TaskServices())->getViewEdit($id);
        return view("Task.update",$getViewEdit);
    }

    public function changeStatus(Request $request){
        $this->task->changeStatus($request);
    }

    public function update($id, Request $request)
    {

        $update = $this->task->update($id,$request->all());
        if($update){
            return back()->with('success', 'Đã cập nhật công việc!');
        }else
            return back()->with('error', 'Cập nhật công việc thất bại!');
    }

    public function destroy($id)
    {
        $delete = $this->task->destroy($id);
        if($delete){
            return back()->with('error', 'Đã xóa 1 công việc!');
        }
    }
}
