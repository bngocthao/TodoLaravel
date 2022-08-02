<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department = Department::all();
        $context = [
            'department' => $department,
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
            'codeRandom' => $codeRandom
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
        $context = [
            'departments' => $departments
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
