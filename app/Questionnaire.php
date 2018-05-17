<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    protected $table = 'questionnaire';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category','complete',
    ];


    public function questions()
    {
        return $this->hasMany('App\Question','questionnaire_id','id');
    }
}
