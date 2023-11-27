<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailResep extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get the resep that owns the DetailResep
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function resep(): BelongsTo
    {
        return $this->belongsTo(Resep::class);
    }

    /**
     * Get the obat that owns the DetailResep
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function obat(): BelongsTo
    {
        return $this->belongsTo(Obat::class);
    }
}
