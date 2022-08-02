<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = "departments";
    protected $fillable = [
        'departmentCode',
        'departmentName',
        'departmentDes',
        'slotAccount',
        'manager_id'
    ];

    public function accounts(){
        return $this->hasMany(Account::class,'department_id','id');
    }
}
