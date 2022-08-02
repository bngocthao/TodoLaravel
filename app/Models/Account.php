<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $table = "accounts";
    protected $fillable = [
        'accountCode',
        'fullName',
        'address',
        'phone',
        'email',
        'gender',
        'dateJoin',
        'avatar',
        'department_id',
        'position_id',
        'user_id',
        'status',
        'password'
    ];
    public function department(){
        return $this->belongsTo(Department::class,'department_id');
    }

    public function position(){
        return $this->belongsTo(Position::class,'position_id');

    }
}
