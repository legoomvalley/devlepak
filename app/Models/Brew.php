<?php

namespace App\Models;

use App\Models\Coffee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brew extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'temperature'
    ];

    public function coffee()
    {
        return $this->hasMany(Coffee::class, 'brew_type');
    }
}
