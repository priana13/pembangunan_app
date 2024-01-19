<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengawasan extends Model
{
    use HasFactory;

    protected $table = "pengawasan";

    protected $guarded = [];

    public function proyek(){

        return $this->belongsTo(Proyek::class, 'proyek_id');
    }

    public function user(){

        return $this->belongsTo(User::class, 'user_id');
    }

    public function item_pengawasan(){

        return $this->hasMany(ItemPengawasan::class, 'pengawasan_id');
    }

}
