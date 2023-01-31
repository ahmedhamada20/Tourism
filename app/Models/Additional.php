<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Additional extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name'];

    protected $fillable = [
        'name',
        'trip_id',
        'packages_id',
    ];

    public function trip()
    {
        return $this->belongsTo(Trips::class,'trip_id');
    }

    public function packages()
    {
        return $this->belongsTo(packages::class,'packages_id');
    }
}
