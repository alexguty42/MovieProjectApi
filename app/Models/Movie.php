<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'year', 'director', 'genre', 'duration', 'rating', 'price'];

    public function toArray()
    {
        return [
            'title' => $this->title,
            'year' => $this->year,
            'director' => $this->director,
            'genre' => $this->genre,
            'duration' => $this->duration,
            'rating' => $this->rating,
            'price' => $this->price,
        ];
    }
}

