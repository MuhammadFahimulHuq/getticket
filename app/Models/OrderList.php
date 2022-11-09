<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderList extends Model
{
    use HasFactory;
    public function promotion()
    {
        return $this->hasMany(Promotion::class);
    }
}
