<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = 'educations';

    /*protected $fillable = [
           'school',
           'user_id',
           'degree',
           'fieldofstudy',
           'start_date',
           'end_date',
           'grade',
           'activities_and_socities',
           'description'];*/


    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }
}
