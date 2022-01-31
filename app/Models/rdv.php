<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\client;
use App\Models\User;

class rdv extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'prospect_id',
        'rdvDT',
    ];
    protected $casts = [
        'rdvDT' => 'datetime',
    ];
    public function client()
    {
        return $this->belongsTo(client::class);
    }
    public function prospect()
    {
        return $this->belongsTo(User::class, 'prospect_id');
    }
}
