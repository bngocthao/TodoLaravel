<?php

namespace App\Http\Controllers;

use App\Enums\ProjectStatus;
use App\Enums\TaskStatus;
use App\Models\Position;
use App\Models\Project;
use App\Models\Task;
use App\Repository\Task\TaskRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PositionController extends Controller
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
        $positions = Position::where('positionStatus',TaskStatus::On)->get();
        $context = [
            'positions' => $positions,
            'numberOfProject' => $this->numberOfProject,
            'numberOfTask' => $this->numberOfTask,
            'doneTask' => $this->doneTask,
            'doneProject' => $this->doneProject
        ];
        return view('Position.index',$context);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $randomCode = Str::random(8);
        $context = [
            'randomCode' => $randomCode,
            'numberOfProject' => $this->numberOfProject,
            'numberOfTask' => $this->numberOfTask,
            'doneTask' => $this->doneTask,
            'doneProject' => $this->doneProject
        ];
        return view('Position.create',$context);
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
        $create_position = Position::create($request->all());
        if($create_position){
            return back()->with('success', 'Đã thêm mới vị trí!');
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
        $positions = Position::find($id);
        $context = [
            'positions' => $positions,
            'numberOfProject' => $this->numberOfProject,
            'numberOfTask' => $this->numberOfTask,
            'doneTask' => $this->doneTask,
            'doneProject' => $this->doneProject
        ];
        return view('Position.update',$context);
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
        $update = Position::find($id)->update($request->all());
        if($update){
            return back()->with('success', 'Cập nhật chức vụ thành công!');
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
        $delete = Position::find($id)->delete();
        if($delete){
            return back()->with('error', 'Đã xóa một chức vụ!');
        }
    }
}
