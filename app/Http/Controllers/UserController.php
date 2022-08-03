<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Position;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('User.list', compact('users'));
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
        $context = [
            'department' =>$department,
            'accountCode' => $accountCode,
            'positions' => $positions
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
        }
        $request->merge(['avatar' => $avatarName]);
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
            'accountCode' => $accountCode
        ];
        return view('User.update',$context);
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
        //
    }
}
