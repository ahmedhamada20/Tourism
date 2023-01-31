<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'trip_id',
        'package_id',
        'transfer_id',
        'date_id',
        'nationalty',
        'adult_price',
        'child_price',
            'total',
        'adult_number',
        'child_number',
        'status',
    ];

    public function date()
    {
        return $this->belongsTo(Dates::class, 'date_id');
    }

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
