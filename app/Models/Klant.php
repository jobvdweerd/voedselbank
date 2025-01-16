<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klant extends Model
{
    use HasFactory;

    protected $table = 'klant';

    protected $fillable = [
        'naam', 'volwassen', 'kinderen', 'babys', 'postcode', 'wensen', 'is_active'
    ];
}
