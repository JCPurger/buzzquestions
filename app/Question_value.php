<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question_value extends Model
{
    protected $table = 'question_value';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['content'];

    public function question()
    {
        return $this->belongsTo('App\Question');
    }

    public function answers()
    {
        return $this->belongsToMany('App\Question','answer','question_value_id','question_id');
    }
}
