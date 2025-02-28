<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\EquipmetModel;

class announcmentModel extends Model
{
    protected $table = 'announcment';
    protected $fillable = [
        'title',
        "city",
        "price",
        "disponibility",
        "user_id"
    ];
    public function owner(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function equipments()
    {
        return $this->belongsToMany(EquipmetModel::class, 'announcment_equipment', 'annoucment_id', 'equipment_id');
    }
}
