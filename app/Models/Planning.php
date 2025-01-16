<?php
// app/Models/Planning.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{
    use HasFactory;

    protected $table = 'planning';

    protected $fillable = [
        'datum', 'hour', 'beschikbaar', 'functie', 'status', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
