<?php

namespace App\Models;

use App\Models\Reservasi;
use App\Models\FasilitasKamar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kamar extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    /**
     * Get all of the fasilitasKamar for the Kamar
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fasilitasKamar()
    {
        return $this->hasMany(FasilitasKamar::class);
    }

    /**
     * Get all of the reservasi for the Kamar
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reservasi()
    {
        return $this->hasMany(Reservasi::class);
    }
}
