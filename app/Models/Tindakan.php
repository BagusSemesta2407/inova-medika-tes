<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tindakan extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get all of the rawatJalan for the Tindakan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rawatJalan(): HasMany
    {
        return $this->hasMany(RawatJalan::class);
    }
}
