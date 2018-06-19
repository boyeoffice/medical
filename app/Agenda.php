<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
   // protected $fillable = [
     //   'title', 'start_date', 'end_date', 'location', 'notes'
   // ];

   public function user()
   {
     return $this->belongsTo(User::class);
   }

   protected $with = 'user';
}
