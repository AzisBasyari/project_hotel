<?php

namespace App\Models;

use App\Models\Kamar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservasi extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    /**
     * Get the kamar that owns the Reservasi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }
}
