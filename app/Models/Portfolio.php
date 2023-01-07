<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Portfolio extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['user_id'];

    public function registerMediaCollections(): void
    {

        $this->addMediaCollection('images')
            ->singleFile();
        $this->addMediaCollection('downloads')
            ->singleFile();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function biographies()
    {
        return $this->hasMany(Biography::class);
    }
    public function educations()
    {
        return $this->hasMany(Education::class);
    }
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
    public function skills()
    {
        return $this->hasMany(Skill::class);
    }
    public function Addressess()
    {
        return $this->hasMany(Address::class);
    }
}
