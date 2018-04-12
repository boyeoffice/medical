<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Support\FilterPaginateOrder;

class Technique extends Model
{
	use FilterPaginateOrder;
    protected $fillable = ['estagio', 'tecnica_realizada'];
    protected $filter = ['id'];
}
