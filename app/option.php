<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class option extends Model
{
    //
    protected $fillable = [
        'content',
        'questions_id',
        'questionnaire_id',

    ];

    public function questions() {
    return $this->belongsTo('App\questions');
    }
}
