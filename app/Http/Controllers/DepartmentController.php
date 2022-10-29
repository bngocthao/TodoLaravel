<?php

namespace App\Http\Controllers;

use App\Enums\ProjectStatus;
use App\Enums\TaskStatus;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Project;
use App\Models\Task;

class DepartmentController extends Controller
{

    protected $numberOfProject;
    protected $numberOfTask;
    protected $doneTask;
    protected $doneProject;
    public function __construct(){
        $this->numberOfProject= Project::count();
        $this->numberOfTask = Task::count();
        $this->doneTask = Task::where('status',TaskStatus::Complete)->count();
        $this->doneProject = Project::where('status',ProjectStatus::Complete)->count();
    }

    public function index()
    {
        $department = Department::all();
        $context = [
            'department' => $department,
            'numberOfProject' => $this->numberOfProject,
            'numberOfTask' => $this->numberOfTask,
            'doneTask' => $this->doneTask,
            'doneProject' => $this->doneProject
        ];
        return view('Department.index',$context);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Tạo mã phòng ban tự động
        $codeRandom = Str::random(8);
        $context = [
            'codeRandom' => $codeRandom,
            'numberOfProject' => $this->numberOfProject,
            'numberOfTask' => $this->numberOfTask,
            'doneTask' => $this->doneTask,
            'doneProject' => $this->doneProject
        ];
        return view('Department.create',$context);
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
        if($request->hasFile('departmentDes')) {
            $originName = $request->file('departmentDes')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('departmentDes')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('upload')->move(public_path('departmentDescription'), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('public/images/'.$fileName);
            $msg = 'Hình đã được lưu';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }

        $create_department = Department::create($request->all());
        if($create_department){
            return back()->with('success', 'Đã thêm mới phòng ban!');
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
        $departments = Department::find($id);

        $users = User::all();
        $context = [
            'departments' => $departments,
            'users' => $users,
            'numberOfProject' => $this->numberOfProject,
            'numberOfTask' => $this->numberOfTask,
            'doneTask' => $this->doneTask,
            'doneProject' => $this->doneProject
        ];
        return view('Department.update',$context);
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

        $update_department = Department::find($id)->update($request->all());
        if($update_department){
            return back()->with('success', 'Cập nhật phòng ban thành công!');
        }else{
            return back()->with('error', 'Cập nhật thất bại!');
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
        $delete_department = Department::find($id)->delete();
        if($delete_department){
            return back()->with('success', 'Xóa phòng ban thành công!');
        }else{
            return back()->with('error', 'Xảy ra lỗi!');
        }
    }
}
