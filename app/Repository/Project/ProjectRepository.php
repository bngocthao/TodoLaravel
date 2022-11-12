<?php
namespace App\Repository\Project;

use App\Models\Project;
use App\Models\Projects_users;
use App\Rules\checkDateRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProjectRepository implements ProjectInterface
{
    public function index()
    {
        return "Project Repo Test Ok";
    }

    public function create()
    {
        return "Project Repo Test Ok";
    }

    public function store(array $data)
    {
        //xử lý ảnh
        // validate ảnh
//        $validatedData = $data->validate([
//            'image' => 'required|image|mimes:jpeg,jpg,png,gif',
//        ]);
        // thêm ảnh
//        dd($data);
        if($data['image'] != ''){
            $avatar = $data['image'];
            $avatarName = 'project_'.time().rand(1,1000).'.'.$avatar->extension();
            $avatar->move(public_path('project_upload'), $avatarName);
            $data['image'] = $avatarName;
//            dd($data['image']);
        }else $data['image'] = '';
        // end xử lý ảnh

        $pj = Project::create($data);
        if(isset($data['users->user_id'])) {
            return Projects_users::create([
                'project_id' => $pj->id,
                'user_id' => $data['users->user_id']
            ]);
        }else{
            return Projects_users::create([
                'project_id' => $pj->id
            ]);
        }
    }

    public function show($id)
    {
        return "Project Repo Test Ok";
    }

    public function edit($id)
    {
        return "Project Repo Test Ok";
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

        //image saving
        if(isset($data['image'])){
            $avatar = $data['image'];
            $avatarName = 'project_'.time().rand(1,1000).'.'.$avatar->extension();
            $avatar->move(public_path('project_upload'), $avatarName);
            $data['image'] = $avatarName;
//            dd($data['image']);
        }

        // Lưu id của nhân viên và id dự án vào bảng
        Project::find($id)->update($data);
        if(isset($data['users->user_id'])) {
            return Projects_users::where('project_id', $id)->update([
                'project_id' => $id,
                'user_id' => $data['users->user_id']
            ]);
        }else{
            return Projects_users::where('project_id', $id)->update([
                'project_id' => $id
            ]);
        }

    }

    public function destroy($id)
    {
        // xóa tất cả các task trước khi xóa pj
        // lấy id của các task từ project
        // nếu project có add task, bỏ nó vào f_task
        if (DB::table('projects_tasks')->where('project_id', '=', $id)->exists()) {
            $f_task = DB::table('projects_tasks')->where('project_id', '=', $id)->get();
//            $task = $f_task[1]->task_id;
            $c = count($f_task);
            // mỗi task là 1 task trong pj đó -> xóa từng cái 1
            for($i = 0; $i < $c; $i++){
                $task = $f_task[$i]->task_id;
                $del_task = DB::table('tasks')->where('id', '=', $task)->delete();
            }
        }
        $pj_tsk_del = DB::table('projects_tasks')->where('project_id', '=', $id)->delete();
        $del = DB::table('projects_users')->where('project_id', '=', $id)->delete();
        return Project::find($id)->destroy($id);
    }

    public function checkName(Request $request)
    {
        if($request->get('nameProject'))
        {
            $nameProject =  $request->get('nameProject');
            $data = DB::table('projects')->where('nameProject',$nameProject)->count();
            if($data > 0)
            {
                echo 'not_unique';
            }else{
                echo 'unique';
            }
            return $data;
        }
    }
}