<?php

namespace App\Http\Controllers;

use App\Enums\AccountStatus;
use App\Enums\TaskStatus;
use App\Models\Account;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::where('status',AccountStatus::Activate)->get();
        $dp = Department::all();
        $context = [
            'accounts' => $accounts,
            'dp' => $dp
        ];
        return view('Account.index',$context);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department = Department::all();
        $positions = Position::where('positionStatus',TaskStatus::On)->get();
        $accountCode = Str::random(10);
        $context = [
            'department' => $department,
            'positions' => $positions,
            'accountCode' => $accountCode
        ];
        return view('Account.create',$context);
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
        $create_account = Account::create($request->all());
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
        // Nếu deparment_id trong bảng accounts == id trong bảng department thì selecte
        $accounts = Account::find($id); // id account = 1
        $get_id_dp = $accounts->department_id;

        // get data department
        $department = Department::all();
        // Get data positions
        $positions = Position::all();
        $get_id_ps = $accounts->position_id;
        $context = [
            'accounts' => $accounts,
            'get_id_dp' => $get_id_dp,
            'department' => $department,
            'positions' => $positions,
            'get_id_ps' => $get_id_ps
        ];
        return view('Account.update',$context);
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

        $update = Account::find($id)->update($request->all());
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
