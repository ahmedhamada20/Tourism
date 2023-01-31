<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dates extends Model
{
    use HasFactory;

    protected $fillable = [
        'dates',
        'times',
    ];

    public function trips()
    {
        return $this->belongsToMany(Trips::class, 'trips_dates');
    }


    public function packages()
    {
        return $this->belongsToMany(Dates::class, 'packages_dates','dates_id','packages_id');
    }

}
