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
        'priority',
        'project_id'
    ];

    public function project(){
        return $this->belongsTo(Project::class,'project_id');
    }
}
