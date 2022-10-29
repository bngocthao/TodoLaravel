<?php

namespace App\Http\Controllers;
use App\Enums\ProjectStatus;
use App\Enums\TaskStatus;
use App\Models\Project;
use App\Models\Task;
use App\Services\Project\ProjectServices;
use App\Models\ProjectTask;
use Illuminate\Http\Request;
use App\Repository\Project\ProjectRepository;


class ProjectController extends Controller
{

    protected $project;
    public function __construct(ProjectRepository $project)
    {
        $this->project = $project;
    }

    public function index()
    {
        $getViewIndex = (new ProjectServices)->getViewIndex();
        return view('Project.list',$getViewIndex);
    }

    public function create()
    {
        $getViewCreate = (new ProjectServices)->getViewCreate();
        return view("Project.create",$getViewCreate);
    }

    public function store(Request $request)
    {
        // sau submit
        $storeP = $this->project->store($request->all());
        if ($storeP){
            return back()->with('success', 'Đã tạo dự án mới!');
        }
    }

    public function show($id)
    {
        $getViewShow = (new ProjectServices)->getViewShow($id);
//        dd($getViewShow);
        return view('Project.project_detail',$getViewShow);
    }

    public function edit($id)
    {
        $getViewEdit = (new ProjectServices)->getViewEdit($id);
        return view('Project.update', $getViewEdit );
    }

    public function update($id, Request $request)
    {
        $up = $this->project->update($id, $request->all());
//        if(!$up) {
//            return back()->with('error', 'Cập nhật dự án thất bại!');
//        }else
            return back()->with('success', 'Cập nhật dự án thành công!');
    }

    public function destroy($id)
    {
        $delete = $this->project->destroy($id);
        if($delete) {
            return back()->with('error', 'Đã xóa 1 dự án!');
        }
    }
}
