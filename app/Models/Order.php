<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function client() {
    return $this->belongsTo(User::class, 'user_id');
}

public function items() {
    return $this->hasMany(OrderItem::class);
}
}
