<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_airline',
        'name_phone',
        'user_number',
        'user_form',
        'user_point',
        'user_notes',
        'name_user',
        'name_email',
        'user_id',
        'trip_id',
        'package_id',
        'transfer_id',
        'adult_price',
        'child_price',
        'total',
        'adult_number',
        'child_number',
        'date_id',
        'user_date',
        'user_time',
        'adulte',
        'chiled',
        'date',
        'time',

    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function trip()
    {
        return $this->belongsTo(Trips::class, 'trip_id');
    }
    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }
    public function transfer()
    {
        return $this->belongsTo(Transfer::class, 'transfer_id');
    }
}
