<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kecamatan extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get the kota that owns the Kecamatan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kota(): BelongsTo
    {
        return $this->belongsTo(Kota::class);
    }

    /**
     * Get all of the desa for the Kecamatan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function desa(): HasMany
    {
        return $this->hasMany(Desa::class);
    }

    /**
     * Get all of the dataPasien for the Kecamatan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dataPasien(): HasMany
    {
        return $this->hasMany(DataPasien::class);
    }
}
