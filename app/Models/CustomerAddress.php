<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CustomerAddress extends Model
{
    use HasFactory;

    protected $fillable=[
        'customer_id',
        'street',
        'suite',
        'city',
        'zipcode'
    ];


    public function geo(): HasOne
    {
        return $this->hasOne(CustomerGeo::class);
    }


}
