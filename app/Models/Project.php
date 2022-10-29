<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = "projects";
    protected $primaryKey = 'id';
    protected $fillable = [
        'nameProject',
        'description',
//        'user_id',
        'start_at',
        'end_at',
        'status'
    ];

    public function users(){
        return $this->belongsTo(Projects_users::class,'user_id','id');
    }

    public function tasks(){
        return $this->hasMany(Projects_tasks::class,'project_id','id');
    }

    public function project_info(){
        return $this->hasManyThrough( Projects_tasks::class, Task::class);
    }
}
