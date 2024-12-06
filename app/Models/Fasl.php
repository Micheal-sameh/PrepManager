<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasl extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'grad',
        'created_by',
    ];

    public function creat()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function members()
    {
        return $this->hasMany(User::class);
    }
}
