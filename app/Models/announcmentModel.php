<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\EquipmetModel;

class announcmentModel extends Model
{
    protected $table = 'announcments';
    protected $fillable = [
        "city",
        "price",
        "disponibility",
        "user_id"
    ];
    public function owner(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function equipmets(){
        return $this->belongsToMany(EquipmetModel::class, 'announcement_equipment', 'announcement_id',  'equipment_id');
    }
}
