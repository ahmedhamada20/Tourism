<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Extra extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name','notes'];

    protected $fillable = [
        'name',
        'icon',
        'notes',
        'price_person_eg',
        'price_person_en',
        'price_group_eg',
        'price_group_en',
        'number_group',
    ];


    public function Transfers()
    {
        return $this->belongsToMany(Transfer::class, 'extras_transfers');
    }

    public function trips()
    {
        return $this->belongsToMany(Trips::class, 'trips_extra');
    }


    public function packages()
    {
        return $this->belongsToMany(Package::class, 'packages_extras', 'extras_id', 'packages_id');
    }

}
