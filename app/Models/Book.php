<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id',
    ];

    public $sortable = ['title',
        'description',
    ];

    public function getDescriptionAttribute($value)
    {
        return substr($value, 0, 120);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
