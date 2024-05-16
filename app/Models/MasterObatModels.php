<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterObatModels extends Model
{
    use HasFactory;
    protected $table = 'obatalkes_m';
    protected $primaryKey = 'obatalkes_id';
    protected $fillable = [
        'obatalkes_kode',
        'obatalkes_nama',
        'stok',
    ];
    public $timestamps = false;

    // Fungsi untuk mengurangi stok
    public function reduceStock($quantity)
    {
        if ($this->stok >= $quantity) {
            $this->stok -= $quantity;
            $this->save();
            return true;
        }
        return false;
    }
}
