<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'image',
        'opinian',
        'team_id',
    ];

    public function team()
    {
        return $this->hasOne(Team::class, 'id', 'team_id');
    }
}
