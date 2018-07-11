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
}
