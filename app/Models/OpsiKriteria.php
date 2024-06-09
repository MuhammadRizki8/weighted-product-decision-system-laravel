<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpsiKriteria extends Model
{
    use HasFactory;

    protected $table = 'opsi_kriterias'; // Pastikan nama tabel sesuai
    protected $fillable = ['opsi', 'nilai', 'id_kriteria'];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'id_kriteria');
    }
}
