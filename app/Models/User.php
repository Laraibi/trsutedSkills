<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\rdv;
use App\Models\rappel;
use App\Models\codif;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'tokens'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $appends = ['lastConnection'];

    public function getLastConnectionAttribute()
    {
        // return $this->tokens()->count() ;
        if ($this->tokens()->count() > 0) {
            return Carbon::parse($this->tokens->toArray()[0]['last_used_at'])->format('Y-m-d H:m');
        } else {
            return false;
        }
    }
    public function codifs()
    {
        return $this->hasMany(codif::class, "prospect_id", "id");
    }
    public function rdvs()
    {
        return $this->hasMany(rdv::class, "prospect_id", "id");
    }
    public function rappels()
    {
        return $this->hasMany(rappel::class, "prospect_id", "id");
    }
}
