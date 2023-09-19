<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'street',
        'neighborhood',
        'cep',
        'state',
        'number',
    ];

    public function owner(): HasOne
    {
        return $this->hasOne(Owner::class);
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

}
