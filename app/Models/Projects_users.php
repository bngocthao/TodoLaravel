<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class Projects_users extends Model
{
    use HasFactory;
    protected $table = "projects_users";
    protected $primaryKey = "id";
    protected $fillable = [
      "project_id",
      "user_id"
    ];

    public function project(){
        return $this->belongsTo(Projects_users::class, "project_id", 'id');
    }

    public function tasks(){
        return $this->belongsTo(Task::class, 'user_id','id');
    }
}
