<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emergency extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function operator() {
        return $this->belongsTo(User::class, 'operator_id');
    }

    public function village() {
        return $this->belongsTo(Village::class, 'village_id');
    }
}
