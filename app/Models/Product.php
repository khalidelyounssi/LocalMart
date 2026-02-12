<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{

    use HasFactory;

protected $fillable = [
        'title',
        'description',
        'price',
        'stock',
        'image',
        'user_id',
        'category_id',
        'is_active'
    ];

public function category()
{
    return $this->belongsTo(Category::class);
}

public function seller()
{
    return $this->belongsTo(User::class, 'user_id');
}
public function wishlists()
{
    return $this->hasMany(Wishlist::class);
}
public function isLikedBy(User $user)
{
    return $this->wishlists()->where('user_id', $user->id)->exists();
}
public function reports()
{
    return $this->morphMany(\App\Models\Report::class, 'reportable');
}

public function user()
{
    return $this->belongsTo(\App\Models\User::class);
}

public function reviews()
{
    return $this->hasMany(Review::class);
}

public function comments()
{
    return $this->hasMany(Comment::class);
}

}
