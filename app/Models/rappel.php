<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\client;
use App\Models\codif;
use App\Models\User;

class rappel extends Model
{
    use HasFactory;
    protected $fillable = ['client_id', 'prospect_id', 'codif_id', 'rappelDT'];
    protected $casts = [
        'rappelDT' => 'datetime',
    ];
    public function client()
    {
        return $this->belongsTo(client::class);
    }
    public function prospect()
    {
        return $this->belongsTo(User::class, 'prospect_id');
    }
    public function codif()
    {
        return $this->belongsTo(codif::class);
    }
}
