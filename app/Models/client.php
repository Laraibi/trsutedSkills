<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\codif;
use App\Models\rdv;
use App\Models\rappel;
class client extends Model
{
    use HasFactory;
    protected $fillable=[
        'companyName',
        'activity',
        'adress',
        'city',
        'tel1',
        'tel2',
        'fax',
        'email',
        'website',
    ];
    public function codifs()
    {
        return $this->hasMany(codif::class);
    }
    public function rdvs()
    {
        return $this->hasMany(rdv::class);
    }
    public function rappels()
    {
        return $this->hasMany(rappel::class);
    }
}
