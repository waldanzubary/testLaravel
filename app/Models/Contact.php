<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'name',
        'email',
        'phone',
    ];

    /**
     * Get the customer that owns the contact.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
