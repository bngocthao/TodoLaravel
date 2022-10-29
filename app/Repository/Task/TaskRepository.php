<?php
namespace App\Repository\Task;

use App\Models\Projects_tasks;
use App\Models\Task;
use App\Services\Task\TaskServices;

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

    public function update($id, array $data)
    {
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