<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    use HasFactory;

    protected $table = "proyek";

    protected $guarded = [];

    public function jenis_proyek(){

        return $this->belongsTo(JenisProyek::class, 'jenis_proyek_id');
    }

    public function pengawasan(){

        return $this->hasMany(Pengawasan::class, 'proyek_id');
    }

}
