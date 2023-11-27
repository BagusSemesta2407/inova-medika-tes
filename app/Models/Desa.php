<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Desa extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get the kecamatan that owns the Desa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(Kecamatan::class);
    }

    /**
     * Get all of the dataPasien for the Desa
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dataPasien(): HasMany
    {
        return $this->hasMany(DataPasien::class);
    }
}
