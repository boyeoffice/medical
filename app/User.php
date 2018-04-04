<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Support\FilterPaginateOrder;

class User extends Authenticatable
{
    use Notifiable, FilterPaginateOrder;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'username', 'email', 'is_admin', 'status', 'user_type', 'password', 'created_at'
    ];
 // whitelist of filter-able columns
    protected $filter = ['id', 'username', 'name', 'email', 'user_type', 'created_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'api_token',
    ];
}
