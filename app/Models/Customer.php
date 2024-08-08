<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
     use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'category_id',
        'continent',
    ];

    /**
     * Get the contacts for the customer.
     */
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }


}
