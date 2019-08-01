<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class questionnaires extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'title',
      'description',
  ];

  public function questions() {
  return $this->hasMany('App\questions');
  }

  // public function answers() {
  //   return $this->hasMany('App\answer');
  // }

  public function user() {
    return $this->belongsTo('App\User');
  }



}
