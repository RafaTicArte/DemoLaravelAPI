<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Prepara el campo para almacenar formato JSON
    // https://laravel.com/docs/8.x/eloquent-mutators#array-and-json-casting
    protected $casts = [
        'extra' => 'array'
    ];

    protected $fillable = [
        'title',
        'description',
        'extra',
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
