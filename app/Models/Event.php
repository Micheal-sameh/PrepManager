<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'event_category_id',
        'description',
        'location',
        'goal',
        'created_by',
        'points_1',
        'points_2',
        'points_3',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function eventCategory()
    {
        return $this->belongsTo(EventCategory::class, 'event_category_id');
    }
}
