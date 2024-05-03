<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerGeo extends Model
{
    use HasFactory;

    protected $fillable=[
        'customer_address_id',
        'lat',
        'lng'
    ];
}
