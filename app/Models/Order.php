<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model

{
    use HasFactory;


    protected $fillable = ['status', 'total_amount', 'user_id'];
    public function client() {
    return $this->belongsTo(User::class, 'user_id');
}

public function items() {
    return $this->hasMany(OrderItem::class);
}
public function user()
{
    return $this->belongsTo(User::class);
}

public function OrderItem()
{
    return $this->hasMany(OrderItem::class); 
}
}
