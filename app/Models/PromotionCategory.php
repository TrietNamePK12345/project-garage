<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromotionCategory extends Model
{
    use HasFactory;
    protected $table = 'promotion_categories';

    protected $fillable = [
        'id',
        'category_id',
        'promotion_id'
    ];
}
