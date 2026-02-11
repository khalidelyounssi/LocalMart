<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Review;

class Report extends Model
{
    use HasFactory;

    // ضروري تزيد هاد الحقول باش تقدر تعمرهم (Mass Assignment)
    protected $fillable = [
        'user_id',
        'reportable_id',
        'reportable_type',
        'reason',
        'status',
    ];

    public function reportable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
