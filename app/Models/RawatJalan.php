<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class RawatJalan extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get the poli that owns the RawatJalan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function poli(): BelongsTo
    {
        return $this->belongsTo(Poli::class);
    }

    /**
     * Get the dataPasien that owns the RawatJalan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dataPasien(): BelongsTo
    {
        return $this->belongsTo(DataPasien::class);
    }

    /**
     * Get the tindakan that owns the RawatJalan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tindakan(): BelongsTo
    {
        return $this->belongsTo(Tindakan::class);
    }

    /**
     * Get all of the resep for the RawatJalan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function resep(): HasMany
    {
        return $this->hasMany(Resep::class);
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
            $file->storeAs('public/image/buktipembayaran/poli', $filename);
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
            return asset('storage/public/image/buktipembayaran/poli' . $this->image);
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
        $rawatJalan = RawatJalan::firstWhere('id', $id);
        if ($rawatJalan->image != null) {
            $path = 'public/image/buktipembayaran/poli' . $rawatJalan->image;
            if (Storage::exists($path)) {
                Storage::delete('public/image/buktipembayaran/poli' . $rawatJalan->image);
            }
        }
    }
}
