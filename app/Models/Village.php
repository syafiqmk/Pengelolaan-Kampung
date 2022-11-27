<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function announcement() {
        return $this->hasMany(Announcement::class);
    }

    public function information() {
        return $this->hasMany(Information::class);
    }

    public function user() {
        return $this->hasMany(User::class);
    }

    public function complaint() {
        return $this->hasMany(Complaint::class);
    }

    public function emergency() {
        return $this->hasMany(Emergency::class);
    }

    public function village_opertor() {
        return $this->hasMany(VillageOperator::class);
    }

    public function admin() {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function village_user() {
        return $this->hasMany(VillageUser::class);
    }
}
