<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    public $timestamps = false;
    protected $fillable = ['user_1', 'user_2'];
    protected $with = ['messages', 'user', 'to', 'from', 'last'];
    public function messages()
    {
    	return $this->hasMany(Message::class)->orderBy('updated_at', 'asc');
    }
    public function last()
    {
        return $this->hasMany(Message::class)->orderBy('updated_at', 'desc');
    }
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    public function to()
    {
    	return $this->belongsTo('App\User', 'user_2');
    }
    public function from()
    {
        return $this->belongsTo('App\User', 'user_1');
    }
}
