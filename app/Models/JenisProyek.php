<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisProyek extends Model
{
    use HasFactory;

    protected $table = "jenis_proyek";

    protected $guarded = [];

    public function proyek(){

        return $this->hasMany(Proyek::class , 'jenis_proyek_id');
    }
}
