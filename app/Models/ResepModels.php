<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResepModels extends Model
{
    use HasFactory;
    protected $table = 'resep';
    protected $primaryKey = 'resep_id';
    protected $fillable = [
        'racikan_nama',
        'obatalkes_nama',
        'signa_nama',
        'qty',
    ];
    public function obat()
    {
        return $this->belongsTo(\App\Models\MasterObatModels::class, 'obatalkes_id', 'id');
    }

    public function signa()
    {
        return $this->belongsTo(MasterSignaModels::class, 'signa_id');
    }
}
