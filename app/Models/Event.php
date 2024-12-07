<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'location',
        'goal',
        'created_by',
        'bonus_1',
        'bonus_2',
        'bonus_3',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}