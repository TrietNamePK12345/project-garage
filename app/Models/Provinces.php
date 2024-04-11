<?php

namespace App\Models;

use Filament\Forms\Components\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Branches;


class Provinces extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
    ];



}
