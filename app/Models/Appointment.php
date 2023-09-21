<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Appointment extends Model
{
    use HasFactory;

    protected $hidden = [];

    protected $fillable = [
        'name',
        'user_id',
        'animal_id',
        'treatment_id',
        'start_date',
        'end_time',
        'cost'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function animal(): BelongsTo
    {
        return $this->belongsTo(Animal::class);
    }

    public function appointment(): HasOne
    {
        return $this->hasOne(Appointment::class);
    }

}
