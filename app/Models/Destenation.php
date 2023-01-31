<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Destenation extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $table = "destenations";

    public $translatable = ['name','note'];

    protected $fillable = [
        'name',
        'note',
    ];

    public function photo()
    {
        return $this->morphOne(Photo::class, 'photoable');
    }
    public function trips()
    {
        return $this->hasMany(Trips::class, 'destination_id');
    }
}
