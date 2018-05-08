<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	public $timestamps = false;
	protected $with = ['to', 'from'];
    public function to()
    {
    	return $this->belongsTo('App\User', 'to_user_id');
    }
    public function from()
    {
    	return $this->belongsTo('App\User', 'from_user_id');
    }
}
