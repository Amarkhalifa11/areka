<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image',
        'date',
        'desc',
        'team_id',
    ];

    public function team()
    {
        return $this->hasOne(Team::class, 'id', 'team_id');
    }
}
