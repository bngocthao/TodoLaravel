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

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
//    protected static function newFactory()
//    {
//        return new PositionFactory();
//    }
    public function users(){
        return $this->hasMany(User::class,'position_id','id');
    }
}

