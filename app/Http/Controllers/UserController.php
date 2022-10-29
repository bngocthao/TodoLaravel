<?php

namespace App\Http\Controllers;

use App\Enums\ProjectStatus;
use App\Enums\TaskStatus;
use App\Models\Department;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Position;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
        // Nếu user là admin sẽ truyền vào data all user
        // Nếu user là quản lý sẽ truyền vào data của employee có chung department với quản lý
        // hoặc user k có department
        $au = Auth::user();
        $role = $au->role;
        $dep = $au->department_id;
        $users = User::all();
        $numberOfProject = $this->numberOfProject;
        $numberOfTask = $this->numberOfTask;
        $doneTask = Task::where('status',TaskStatus::Complete)->count();
        $doneProject = Project::where('status',ProjectStatus::Complete)->count();

        if($role == '0') {
            return view('User.list', compact('users','numberOfProject','numberOfTask','doneProject','doneTask'));
        }
        elseif ($role == '1'){
            $users = User::select('id')->where('department_id','=',$dep)->orwhere('department_id','=', null )->get();
            return view('User.list', compact('users','numberOfProject','numberOfTask','doneProject','doneTask'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accountCode = Str::random(8);
        $department = Department::all();
        $positions = Position::all();
        $today = date('Y-m-d');
        $context = [
            'department' =>$department,
            'accountCode' => $accountCode,
            'positions' => $positions,
            'numberOfProject' => $this->numberOfProject,
            'numberOfTask' => $this->numberOfTask,
            'doneTask' => $this->doneTask,
            'doneProject' => $this->doneProject,
            'today' => $today,
        ];
        return view('User.create',$context);
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
        if($request->has('avatar_upload')){
            $avatar = $request->avatar_upload;
            $avatarName = 'avatar'.time().rand(1,1000).'.'.$avatar->extension();
            $avatar->move(public_path('avatar_upload'), $avatarName);
            $request->merge(['avatar' => $avatarName]);

        }
        $create_account = User::create($request->all());
        // Hash password
        $create_account->password = Hash::make($request->password);
        $create_account->save();
        if($create_account){
            return back()->with('success', 'Đã thêm 1 tài khoản');
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
        $doneTask = Task::where('status',TaskStatus::Complete)->count();
        $doneProject = Project::where('status',ProjectStatus::Complete)->count();
        $users = User::find($id);
        $numberOfProject = $this->numberOfProject;
        $numberOfTask = $this->numberOfTask;
        return view('User.detail', compact('users','numberOfTask','numberOfProject','doneProject','doneTask'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Tìm user có id tương ứng để chỉnh sữa
        $users = User::find($id);

        // Nếu account chưa có mã tài khoản thì random vào
        $accountCode = Str::random(8);

        // Lấy dữ liệu
        $department = Department::all();
        $positions = Position::all();

        // Get id để so sánh
        $get_id_dp = $users->department_id;
        $get_id_ps = $users->position_id;
        $context = [
            'users' => $users,
            'department' => $department,
            'positions' => $positions,
            'get_id_dp' => $get_id_dp,
            'get_id_ps' => $get_id_ps,
            'accountCode' => $accountCode,
            'numberOfProject' => $this->numberOfProject,
            'numberOfTask' => $this->numberOfTask,
            'doneTask' => $this->doneTask,
            'doneProject' => $this->doneProject
        ];
        if(Auth::user()->role == 0) {
            return view('User.update', $context);
        }
        elseif (Auth::user()->role == 1)
            return view('User.managerUpdate', $context);
        else
            return view('User.update', $context);

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

        if($request->hasFile('avatar_upload')){
            $avatar = $request->avatar_upload;
            $avatarName = 'avatar'.time().rand(1,100).'.'.$avatar->extension();
            $avatar->move(public_path('avatar_upload'), $avatarName);
            $request->merge(['avatar' => $avatarName]);
        }

        $update = User::find($id)->update($request->all());
        if($update){
            return back()->with('success', 'Cập nhật thông tin thành công!');
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
        $delete = User::find($id)->delete();
        if($delete) {
            return back()->with('error', 'Đã xóa người dùng!');
        }else
            return back()->with('eror', 'Có lỗi xảy ra');
    }
}
