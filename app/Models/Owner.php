<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Owner extends Model
{
    use HasFactory;

    protected $hidden = [];

    protected $fillable = [
        'name',
        'email',
        'profile_picture',
        'cpf',
        'birth_date',
        'phone_number',
        'address_id',
    ];

    public function animal(): HasMany
    {
        return $this->hasMany(Animal::class);
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

}
