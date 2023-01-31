<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class OurParten extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'link',
    ];

    public function photo()
    {
        return $this->morphOne(Photo::class, 'photoable');
    }
}
