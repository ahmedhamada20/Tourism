<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AboutUs extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = [
        'name',
        'notes',
        'title_1',
        'title_2',
        'title_3',
        'title_4',
        'title_5',
        'title_6',
        'name_chooseUs',
        'notes_chooseUs',
    ];

    protected $fillable = [
        'name',
        'notes',
        'icon_1',
        'title_1',
        'icon_2',
        'title_2',
        'icon_3',
        'title_3',
        'icon_4',
        'title_4',
        'icon_5',
        'title_5',
        'icon_6',
        'title_6',
        'name_chooseUs',
        'notes_chooseUs',
        'video',
    ];

    public function photo()
    {
        return $this->morphOne(Photo::class, 'photoable');
    }
}
