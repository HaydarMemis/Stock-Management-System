<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'information',
        'type',
    ];

    public function departments(): BelongsToMany
        {
            return $this->belongsToMany(Department::class);
        }
        /**
         * The attributes that should be cast.
         *
         * @var array
         */
        protected $casts = [
            'information' => 'json',
        ];
}

