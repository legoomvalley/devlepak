<?php

namespace App\Models;

use App\Models\Brew;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coffee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'bean',
        'type',
        'brew_type',
        'price'
    ];

    public function brews()
    {
        return $this->belongsTo(Brew::class, 'brew_type');
    }

    public function types()
    {
        return $this->belongsTo(Type::class, 'type');
    }
}
