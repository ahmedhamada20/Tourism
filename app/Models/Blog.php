<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Blog extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name','notes'];

    protected $fillable = [
        'name',
        'notes',
    ];

    public function photo()
    {
        return $this->morphOne(Photo::class, 'photoable');
    }

}
