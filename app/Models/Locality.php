<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Locality.php
class Locality extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'delivery_fee'];
}

