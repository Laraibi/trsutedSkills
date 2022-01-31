<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\client;
use App\Models\User;
use App\Models\prestation;

class codif extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'prospect_id',
        'prestation_id',
        'prestation_id_2',
        'joining',
        'attempts',
        'size',
        'capital',
        'responseCutomer',
        'customerContactName',
        'customerContactPoste',
        'customerContactTel',
        'porpale',
    ];
    public function client()
    {
        return $this->belongsTo(client::class);
    }
    public function prospect()
    {
        return $this->belongsTo(User::class, "prospect_id");
    }
    public function prestation()
    {
        return $this->belongsTo(prestation::class);
    }
    public function prestation_2()
    {
        return $this->belongsTo(prestation::class, 'prestation_id_2');
    }

    public function getPrestationsAttribute()
    {
        $pres1 = $this->prestation;
        $pres2 = $this->prestation;
        return collect($pres1, $pres2);
    }
}
