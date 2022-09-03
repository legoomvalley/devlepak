<?php

namespace App\Models;

use App\Models\Coffee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function coffees()
    {
        return $this->hasMany(Coffee::class, 'type');
    }
}
