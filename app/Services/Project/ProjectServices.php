<?php
namespace App\Services\Project;
use App\Enums\ProjectStatus;
use App\Enums\TaskStatus;
use App\Models\Project;
use App\Models\Projects_users;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ProjectServices {

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
        $numberOfProject = $this->countProject();
        $numberOfTask = $this->countTask();
        $users = User::all();
        $projects = Project::all();
        $doneTask = Task::where('status',TaskStatus::Complete)->count();
        $doneProject = Project::where('status',ProjectStatus::Complete)->count();
        $context = [
            'projects' => $projects,
            'numberOfProject' => $numberOfProject,
            'numberOfTask' => $numberOfTask,
            'doneTask' => $doneTask,
            'doneProject' => $doneProject,
            'users' => $users
        ];
        return $context;
    }

    public function getViewCreate()
    {
        $users = User::all();
        $today = date('Y-m-d');
        $numberOfProject = $this->countProject();
        $numberOfTask = $this->countTask();
        $doneTask = Task::where('status',TaskStatus::Complete)->count();
        $doneProject = Project::where('status',ProjectStatus::Complete)->count();
        // Hiển thị danh sách Task để add vào dự án
        $task_list = Task::where('status',TaskStatus::On)->get();
        // Hiển thị người dùng là nhân viên đang k tham gia dự án
        $empU = User::select('id')->where('role', 2)->get();
        $empU = DB::table('users')
            ->select('users.id', 'users.name', 'users.role', 'projects_users.project_id')
            ->leftJoin('projects_users', 'users.id', '=', 'projects_users.user_id')
            ->get();
        $context = [
            'users' => $users,
            'task_list' => $task_list,
            'numberOfProject' => $numberOfProject,
            'numberOfTask' => $numberOfTask,
            'doneTask' => $doneTask,
            'doneProject' => $doneProject,
            'today' => $today,
            'empU' => $empU,
        ];
        return $context;
    }

    public function getViewEdit($id)
    {
        $today = date('Y-m-d');
        // Show danh sách user
        $users = User::all();
        // Tìm project có id tương ứng
        $project = Project::find($id);
        // Lấy id user của project hiện tại
        $get_id_user = $project->user_id;
        // Lấy dữ liệu bảng projects_users
        $pUsers = Projects_users::all();
        // Lấy người dùng có vai trò là nhân viên nhưng không tham gia vào dự án nào
        // Bảng user($users) có vai trò = 2, bảng project_user($pUsers) lấy hết
        // sau đó join 2 bảng lại, lấy tất cả user có vai trò là 2 nhưng chưa tham gia vào pj nào
        $empU = User::select('id')->where('role', 2)->get();
        $empU = DB::table('users')
            ->select('users.id', 'users.name', 'users.role', 'projects_users.project_id')
            ->leftJoin('projects_users', 'users.id', '=', 'projects_users.user_id')
            ->get();


        // Đếm số lượng report
        $numberOfProject = $this->countProject();
        $numberOfTask = $this->countTask();
        $doneTask = Task::where('status',TaskStatus::Complete)->count();
        $doneProject = Project::where('status',ProjectStatus::Complete)->count();
        $context = [
            'project' => $project,
            'get_id_user' => $get_id_user,
            'users' => $users,
            'numberOfProject' =>$numberOfProject,
            'numberOfTask' => $numberOfTask,
            'doneTask' => $doneTask,
            'doneProject' => $doneProject,
            'pUsers' => $pUsers,
            'today' => $today,
            'empU' => $empU,
        ];
        return $context;
    }

    public function getViewShow($id)
    {
         // Tìm các task của project hiện tại
        $projects = Project::find($id)->tasks;
        // Lấy id của project hiện tại
        $projectsName = Project::find($id);
        // Đếm số lượng report
        $numberOfProject = $this->countProject();
        $numberOfTask = $this->countTask();
        $doneTask = Task::where('status',TaskStatus::Complete)->count();
        $doneProject = Project::where('status',ProjectStatus::Complete)->count();
        $context = [
            'projects' => $projects,
            'projectsName' => $projectsName,
            'numberOfProject' =>$numberOfProject,
            'numberOfTask' => $numberOfTask,
            'doneTask' => $doneTask,
            'doneProject' => $doneProject
        ];
        return $context;
    }

}