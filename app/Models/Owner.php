<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Owner extends Model
{
    use HasFactory;

    protected $hidden = [];

    public function animal(): HasMany
    {
        return $this->hasMany(Animal::class);
    }

    public function address(): HasOne
    {
        return $this->hasOne(Address::class);
    }

}
