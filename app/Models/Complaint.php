<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function village() {
        return $this->belongsTo(Village::class, 'village_id');
    }

    public function category() {
        return $this->belongsTo(ComplaintCategory::class, 'category_id');
    }
}
