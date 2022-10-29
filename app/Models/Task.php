<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = "tasks";
    protected $primaryKey = 'id';
    protected $fillable = [
        'taskName',
        'description',
        'start_at',
        'end_at',
        'status',
        'priority'
    ];

    // Sao khi thêm hasOneThrough thì k xài hàm này đc nữa ??
    public function project(){
        return $this->belongsTo(Projects_tasks::class,'task_id');
    }

    public function project_info(){
        return $this->hasOneThrough(
            Project::class,
            Projects_tasks::class,
            'task_id',
            'id',
            'id',
            'project_id'
        );
    }


}

