<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaslMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'fasl_id',
        'user_id',
        'type',
    ];

    public function fasl()
    {
        return $this->belongsTo(Fasl::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
