<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $table = "positions";
    protected $primaryKey = 'id';
    protected $fillable = [
        'postionCode',
        'positionName',
        'positionDes',
        'positionStatus',
    ];

    public function accounts(){
        return $this->hasMany(Account::class,'position_id','id');
    }
}

