<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branches extends Model
{
    use HasFactory;

    protected $table = 'branches';

    protected $fillable = [
        'name',
        'address',
        'phone_number',
        'status',
        'orders',
        'province_id'
    ];

    public function province()
    {
        return $this->belongsTo(Provinces::class);
    }


}