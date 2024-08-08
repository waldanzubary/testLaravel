<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;


    protected $fillable = [
        'itemName',
        'price',
        'stock',
        'status',

    ];


    public function setStatus()
    {
        if ($this->stock == 0) {
            $this->status = 'outStock';
        } else {
            $this->status = 'inStock';
        }
    }

    public function reduceStock($quantity)
    {
        if ($this->stock >= $quantity) {
            $this->stock -= $quantity;
            $this->setStatus();
            $this->save();
            return true;
        }
        return false;
    }

    public function isInStock()
    {
        return $this->stock > 0;
    }
    

}
