<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'photo',
        'email',
        'phone',
        'gender',
        'birthdate'
    ];

    public function setNameAttribute($value) 
    {
        $this->attributes['name'] = trim(ucwords($value));
    }

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = trim(strtolower($value));
    }
}
