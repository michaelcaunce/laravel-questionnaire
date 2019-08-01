<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class answer extends Model
{
    //
    protected $fillable = [
        'question_id',
        'option_id',

    ];


    public function questionnaire() {
        return $this->belongsTo('App\questions');
      }
}
