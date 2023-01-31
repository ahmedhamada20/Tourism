<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Setting extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name', 'notes', 'description'];

    protected $fillable = [
        'logo',
        'image_transfer',
        'image_home',
        'name',
        'phone',
        'email',
        'notes',
        'address',
        'facebook',
        'twitter',
        'instagram',
        'YouTube',
        'seo',
        'meta_dic',
        'url',
        'description',
        'Fax',
    ];

    public function photo()
    {
        return $this->morphOne(Photo::class, 'photoable');
    }
}
