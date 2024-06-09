<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $fillable = ['kode_kriteria', 'nama_kriteria', 'bobot', 'tipe'];


    public function opsiKriterias()
    {
        return $this->hasMany(OpsiKriteria::class, 'id_kriteria');
    }
}