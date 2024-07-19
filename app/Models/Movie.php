<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'movies';
    protected $primaryKey = 'id';
    protected  $fillable = [
        'year',
        'length',
        'title',
        'subject',
        'actor',
        'actress',
        'director',
        'popularity',
        'awards',
        'image'
    ];

    protected $casts = [
        'year' => 'integer',
        'length' => 'integer',
        'title' => 'string',
        'subject' => 'string',
        'actor' => 'string',
        'actress' => 'string',
        'director' => 'string',
        'popularity' => 'integer',
        'awards' => 'boolean',
        'image' => 'string'
    ];

    private int $id;
    private int $year;
    private int $length;
    private string $title;
    private string $subject;
    private string $actor;
    private string $director;
    private string $actress;
    private string $popularity;
    private string $awards;
    private string $image;
}
