<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static create(array $array)
 * @method static paginate()
 * @property mixed $name
 * @property mixed $username
 * @property mixed $email
 * @property mixed $phone
 * @property mixed $website
 * @property mixed $address
 * @property mixed $company
 */
class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'username',
        'email',
        'phone',
        'website'
    ];


    public function address(): HasOne
    {
        return $this->hasOne(CustomerAddress::class);
    }


    public function company(): HasOne
    {
        return $this->hasOne(CustomerCompany::class);
    }




}
