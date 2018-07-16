<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'question';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'wording', 'questionnaire_id'
    ];

    public function values()
    {
        return $this->hasMany('App\Question_value', 'question_id');
    }

    public function answers()
    {
        return $this->belongsToMany('App\Question_value', 'answer', 'question_id', 'question_value_id');
    }
}
