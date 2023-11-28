<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

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

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['image_url'];

    /**
     * Save image.
     *
     * @param  $request
     * @return string
     */
    public static function saveImage($request)
    {
        $filename = null;

        if ($request->image) {
            $file = $request->image;

            $ext = $file->getClientOriginalExtension();
            $filename = date('YmdHis') . uniqid() . '.' . $ext;
            $file->storeAs('public/image/buktipembayaran/resep', $filename);
        }

        return $filename;
    }

    /**
     * Get the image.
     *
     * @return string
     */
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/public/image/buktipembayaran/resep/' . $this->image);
        }

        return null;
    }

    /**
     * Delete image.
     *
     * @param  $id
     * @return void
     */
    public static function deleteImage($id)
    {
        $resep = Resep::firstWhere('id', $id);
        if ($resep->image != null) {
            $path = 'public/image/buktipembayaran/resep' . $resep->image;
            if (Storage::exists($path)) {
                Storage::delete('public/image/buktipembayaran/resep' . $resep->image);
            }
        }
    }
}
