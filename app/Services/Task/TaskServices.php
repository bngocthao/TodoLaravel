<?php

namespace App\Services\Task;

use App\Enums\ProjectStatus;
use App\Models\Project;
use App\Models\Task;
use App\Enums\TaskStatus;
use App\Models\User;
use Illuminate\Support\Carbon;
use App\Models\Projects_tasks;

class TaskServices
{

    // Get all data model -> ::all(); $departments = Model::all(); n_model

    public function getModelPermanent()
    {
        $project_list = Project::where('status',ProjectStatus::On)->get();

        $doneTask = Task::where('status',TaskStatus::Complete)->count();
        $doneProject = Project::where('status',ProjectStatus::Complete)->count();

        $numberOfProject = $this->countProject();
        $numberOfTask = $this->countTask();
        $context = [
            'project_list'=> $project_list,
            'doneTask'=> $doneTask,
            'doneProject'=> $doneProject,
            'numberOfProject'=> $numberOfProject,
            'numberOfTask'=> $numberOfTask,
        ];
        return $context;
    }

    public function countProject()
    {
        return Project::count();
    }

    public function countTask()
    {
        return Task::count();
    }

    public function getViewIndex()
    {
        $projects = Project::all();
        $task_list = Task::where('status',TaskStatus::On)->get();

        $doneTask = Task::where('status',TaskStatus::Complete)->count();
        $doneProject = Project::where('status',ProjectStatus::Complete)->count();

        $numberOfProject = $this->countProject();
        $numberOfTask = $this->countTask();

        $context = [
            'projects' => $projects,
            'numberOfProject' => $numberOfProject,
            'numberOfTask' => $numberOfTask,
            'task_list' => $task_list,
            'doneTask' => $doneTask,
            'doneProject' => $doneProject,
        ];
        return $context;
    }
    public function getViewCreate()
    {
        // Hiễn thị form thêm công việc
        // Load dữ liệu Project để chọn task thuộc project nào
        $project_list = Project::where('status',ProjectStatus::On)->get();

        $doneTask = Task::where('status',TaskStatus::Complete)->count();
        $doneProject = Project::where('status',ProjectStatus::Complete)->count();

        $numberOfProject = $this->countProject();
        $numberOfTask = $this->countTask();

        $users = User::all();
        $context = [
            'project_list' => $project_list,
            'numberOfProject' => $numberOfProject,
            'numberOfTask' => $numberOfTask,
            'doneTask' =>$doneTask,
            'doneProject' => $doneProject,
            'users' => $users
        ];
        return $context;
    }
    public function getViewShow($id)
    {
        $doneTask = Task::where('status',TaskStatus::Complete)->count();
        $doneProject = Project::where('status',ProjectStatus::Complete)->count();
        $task = Task::find($id);
        $numberOfProject = Project::count();
        $numberOfTask = Task::count();
        $users = User::all();
//        $project_task = Projects_tasks::where('task_id', $id)->get();
//        $users = Task::join('projects', 'project.id', '=', 'tasks.project_id')
//            ->join('users', 'users.id', '=', 'posts.id')
//            ->get(['users.*', 'posts.descrption']);
        $timeRemain = 0;
        if ($task->end_at) {
//            $timeRemain = Carbon::now()->diffInDays(Carbon::parse($task->end_at));
            $timeRemain = \Carbon\Carbon::parse(now())->diffInDays($task->end_at, false);
//            Carbon\Carbon::parse($shipment->due_date)->diffInDays(now(), false)
        } else {
            $timeRemain = 0;
        }
        if ($timeRemain < 0){
            $timeRemain = "Trễ hạn";
        }
        $getModelPer = $this->getModelPermanent();
        $context = [
            'doneTask' => $doneTask,
            'doneProject' => $doneProject,
            'task' => $task,
            'numberOfProject' => $numberOfProject,
            'numberOfTask' => $numberOfTask,
            'users' => $users,
            'timeRemain' => $timeRemain,
//            'project_task' => $project_task
        ];
        return $context;
    }

    public function getViewEdit($id)
    {
        $tasks = Task::find($id);
        // Lấy id project hiện tại, đem so sánh với project_id trong bảng Tasks
        $get_id_project = $tasks->project_id;
        // Đổ dữ liệu bảng Project ra view update

        $context = [
            'tasks' => $tasks,
            'get_id_project' => $get_id_project,
        ];
        $data = $this->getModelPermanent();
        $mergeContext = array_merge($context,$data);
        return $mergeContext;
    }
}