<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biography extends Model
{
    use HasFactory;

    protected $fillable = ['biography', 'user_id'];

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }
}
