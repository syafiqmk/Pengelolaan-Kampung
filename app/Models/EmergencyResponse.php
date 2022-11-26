<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyResponse extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function emergency() {
        return $this->belongsTo(Emergency::class, 'emergency_id');
    }

    public function operator() {
        return $this->belongsTo(User::class, 'operator_id');
    }
}
