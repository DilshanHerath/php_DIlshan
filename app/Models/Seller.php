<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{

    protected $fillable=[
        'id',
        'full_name',
        'email',
        'telephone',
        'joined_date',
        'current_routes',
        'comments',
    ];
}
