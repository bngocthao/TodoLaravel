<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects_tasks extends Model
{
    use HasFactory;
    protected $table = 'projects_tasks';
    protected $primaryKey = 'id';
    protected $fillable = [
        'project_id',
        'task_id'
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function project(){
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }

    public function task(){
        return $this->hasMany(Task::class, 'task_id', 'id');
    }
}
