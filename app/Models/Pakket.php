<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pakket extends Model
{
    protected $table = 'pakket';

    protected $fillable = [
        'naam',
    ];
    public function klanten()
    {
        return $this->hasMany(Klant::class);
    }
}
