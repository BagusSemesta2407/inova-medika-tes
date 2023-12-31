<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Obat extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get all of the detailResep for the Obat
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailResep(): HasMany
    {
        return $this->hasMany(DetailResep::class);
    }
}
