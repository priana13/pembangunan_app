<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $table = "survey";

    protected $guarded = [];

    public function proyek(){

        return $this->belongsTo(Proyek::class, 'proyek_id');
    }

    public function user(){

        return $this->belongsTo(User::class, 'user_id');
    }

    public function survey_item(){

        return $this->hasMany(SurveyItem::class, 'survey_id');
    }

}
