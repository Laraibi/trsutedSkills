<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
