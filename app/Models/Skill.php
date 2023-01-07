<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{

    use HasFactory;

    protected $fillable = ['skill', 'user_id'];

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }
}
