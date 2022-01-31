<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\codif;
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
}
