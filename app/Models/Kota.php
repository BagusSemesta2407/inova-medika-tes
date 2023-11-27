<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kota extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get the provinsi that owns the Kota
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function provinsi(): BelongsTo
    {
        return $this->belongsTo(Provinsi::class);
    }

    /**
     * Get all of the kecamatan for the Kota
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kecamatan(): HasMany
    {
        return $this->hasMany(Kecamatan::class);
    }

    /**
     * Get all of the dataPasien for the Kota
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dataPasien(): HasMany
    {
        return $this->hasMany(DataPasien::class);
    }
}
