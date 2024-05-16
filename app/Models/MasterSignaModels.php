<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterSignaModels extends Model
{
    use HasFactory;
    protected $table = 'signa_m';
    protected $primaryKey = 'signa_id';
    protected $fillable = [
        'signa_kode',
        'signa_nama',
    ];
}
