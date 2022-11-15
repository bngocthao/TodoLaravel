<?php
namespace App\Repository\Task;

use App\Models\Projects_tasks;
use App\Models\Task;
use App\Services\Task\TaskServices;
use Carbon\Carbon;
use http\Env\Request;

class TaskRepository implements TaskInterface
{
    public function index()
    {
        return "Task Repo Test";
    }

    public function create()
    {
        return "Task Repo Test";
    }

    public function store(array $data)
    {
        $tsk = Task::create($data);
        return Projects_tasks::create([
            'project_id' => $data['project->project_id'],
            'task_id' => $tsk->id
        ]);
    }

    public function show($id)
    {
        return (new TaskServices())->getViewShow($id);
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function changeStatus(Request $request){
        if($request->get('id')){
            return Task::where('id', $request->id)->update([
                'status' => $request->status
            ]);
        }else{
            dd('khom đc r');
        };
    }

    public function update($id, array $data)
    {
        //date validation
        $et = Carbon::parse($data['end_at']);
        $st = Carbon::parse($data['start_at']);
        if ($st->gt($et)) {
            // if end_at > start_at (gt is greater than, gte is greater than or equal, etc)
            return back()->with('error', 'Ngày kết thúc không được nhỏ hơn ngày bắt đầu');
        }
        //update bảng phụ trước, rồi tới bảng chính
        Projects_tasks::where('task_id', $id)->update([
            'project_id' => $data['project_id'],
            'task_id' => $id
        ]);
        return Task::find($id)->update($data);
    }

    public function destroy($id)
    {
        return Task::find($id)->destroy($id);
    }
}