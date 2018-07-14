<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submitted extends Model
{
    protected $table = 'submitted';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'token' ];


    public function questionnaire()
    {
        return $this->belongsTo('App\Questionnaire');
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y H:i:s');
    }
}
