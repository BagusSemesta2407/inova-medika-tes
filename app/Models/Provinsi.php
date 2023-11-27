<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Provinsi extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get all of the kota for the Provinsi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kota(): HasMany
    {
        return $this->hasMany(Kota::class);
    }

    /**
     * Get all of the dataPasien for the Provinsi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dataPasien(): HasMany
    {
        return $this->hasMany(DataPasien::class);
    }
}
