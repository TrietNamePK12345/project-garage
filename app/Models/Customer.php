<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer_information';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'status',
        'created_at',
        'updated_at'
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
