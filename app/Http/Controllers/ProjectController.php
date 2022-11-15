<?php

namespace App\Http\Controllers;
use App\Enums\ProjectStatus;
use App\Enums\TaskStatus;
use App\Models\Project;
use App\Models\Task;
use App\Rules\checkDateRule;
use App\Services\Project\ProjectServices;
use App\Models\ProjectTask;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Repository\Project\ProjectRepository;
use mysql_xdevapi\Table;
//use Intervention\Image\Facades\Image as Image;

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

    // tìm tên project trùng thông qua jquery
    function checkEmployee(){
        $nem = $_GET['nameProject'];
        if(!empty($nem)){
            $pjRes = $this->project->is_project_available($nem);
            if ($pjRes == ''){
                echo 'false';
            } else  {
                echo 'true';
            }
        }
    }

    public function checkName(Request $request){
        $this->project->checkName($request);
    }

    public function store(Request $request)
    {
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
//        $request->validate([
//            'end_at' => new checkDateRule(),
//        ]);

        $up = $this->project->update($id, $request->all());
        if(!$up) {
            return back()->with('error', 'Cập nhật dự án thất bại!');
        }else
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
