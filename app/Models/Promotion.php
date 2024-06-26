<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $table = 'promotions';

    protected $fillable = [
        'id',
        'name',
        'description',
        'start_date',
        'end_date',
        'type',
        'discount_type',
        'discount_value	'
    ];
}
