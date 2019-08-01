<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class questions extends Model
{
    //
    protected $fillable = [
        'content',
        'questionnaires_id'

    ];

    // public function questionnaires()
    // {
    //   return $this->belongsTo('App\questionnaires');
    // }

    public function questionnaire() {
        return $this->belongsTo('App\questionnaires');
      }

      public function options() {
          return $this->hasMany('App\option');
        }

        public function answer() {
            return $this->has('App\answer');
          }
}
