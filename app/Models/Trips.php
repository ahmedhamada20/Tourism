<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Trips extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name', 'notes'];

    protected $fillable = [
        'name',
        'notes',
        'destination_id',
        'transfer_id',
        'price_adult_EG',
        'price_child_EG',
        'price_adult_EN',
        'price_child_EN',
        'trips_type_id',
        'rate',
    ];
    public function TripsType()
    {
        return$this->belongsTo(TripsType::class,'trips_type_id');
    }

    public function included()
    {
        return$this->hasMany(Included::class,'trip_id');
    }
    public function excluded()
    {
        return$this->hasMany(Excluded::class,'trip_id');
    }

    public function additional()
    {
        return$this->hasMany(Additional::class,'trip_id');
    }

    public function MoreDtails()
    {
        return$this->hasMany(MoreDetails::class,'trip_id');
    }

    public function destination()
    {
        return $this->belongsTo(Destenation::class, 'destination_id');
    }

    public function transfer()
    {
        return $this->belongsTo(Transfer::class, 'transfer_id');
    }


    public function photos()
    {
        return $this->morphMany(Photo::class, 'photoable');
    }

    public function photo()
    {
        return $this->morphOne(Photo::class, 'photoable');
    }

    public function extras()
    {
        return $this->belongsToMany(Extra::class, 'trips_extra');
    }

    public function dates()
    {
        return $this->belongsToMany(Dates::class, 'trips_dates');
    }

    public function days()
    {
        return $this->belongsToMany(Day::class, 'trips_days','trips_id','day_id');
    }

    public function packages()
    {
        return $this->belongsToMany(Trips::class, 'packages_trips', 'trips_id', 'packages_id');
    }

}
