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

    public function scopeSearch($query, array $search){
        if(isset($search['search']) ? $search['search'] : false){
            return $query->where('nama', 'like', '%' . $search['search'] . '%')
                ->orWhere('check_in', 'like', '%' . $search['search'] . '%')
                ->orWhere('check_out', 'like', '%' . $search['search'] . '%')
                ->orWhere('email', 'like', '%' . $search['search'] . '%')
                ->orWhereHas('kamar', function($query) use ($search){
                    $query->where('nama_kamar', 'like', '%' . $search['search'] . '%');
                });
        }
    }
}
