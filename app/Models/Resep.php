<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Resep extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get the rawatJalan that owns the Resep
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rawatJalan(): BelongsTo
    {
        return $this->belongsTo(RawatJalan::class);
    }

    /**
     * Get all of the detailResep for the Resep
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailResep(): HasMany
    {
        return $this->hasMany(DetailResep::class);
    }
}
