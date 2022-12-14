<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    protected $guarded = ['id'];

    public function village_admin() {
        return $this->hasOne(Village::class, 'admin_id');
    }

    public function complaint() {
        return $this->hasMany(Complaint::class);
    }

    public function emergency() {
        return $this->hasMany(Emergency::class, 'user_id');
    }

    public function emergency_operator() {
        return $this->hasMany(Emergency::class, 'operator_id');
    }

    public function emergency_response() {
        return $this->hasMany(EmergencyResponse::class);
    }

    public function village_user() {
        return $this->hasOne(VillageUser::class);
    }

    public function village_operator() {
        return $this->hasMany(VillageOperator::class);
    }

    public function emergency_public_response() {
        return $this->hasMany(EmergencyPublicResponse::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
