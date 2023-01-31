<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Transfer extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name', 'notes', 'route_form', 'route_to'];

    protected $fillable = [
        "name",
        "destenation_id",
        "price_EG",
        "price_EN",
        "price_EG_go",
        "price_EG_go_back",
        "price_EN_go",
        "price_EN_go_back",
        "type",
        "notes",
        "start_date",
        "end_date",
        "route_form",
        "route_to",
        "rate",
        "car_name",
        "car_type",
        "car_model",
    ];

    public function photo()
    {
        return $this->morphOne(Photo::class, 'photoable');
    }

    public function photos()
    {
        return $this->morphMany(Photo::class, 'photoable');
    }

    public function extras()
    {
        return $this->belongsToMany(Extra::class, 'extras_transfers');
    }


    public function packages()
    {
        return $this->belongsToMany(Transfer::class, 'packages_transfers', 'transfers_id', 'packages_id');
    }

    public function destenation()
    {
        return $this->belongsTo(Destenation::class, 'destenation_id');
    }

}
