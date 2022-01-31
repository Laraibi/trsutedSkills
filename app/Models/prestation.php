<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prestation extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function codif1()
    {
        return $this->hasMany(codif::class);
    }
    public function codif2()
    {
        return $this->hasMany(codif::class, "prestation_id_2");
    }
    public function codifs()
    {
        return $this->codif1()->merge($this->codif2());
    }
    public function getcodifsAttribute()
    {
        $codif1 = $this->codif1;
        $codif2 = $this->codif2;

        return $codif1->merge($codif2);
    }
}
