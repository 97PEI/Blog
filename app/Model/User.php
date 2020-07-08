<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';
    protected $primaryKay = 'user_id';
    public $timestamps = false;
    protected $fillable = ['user_name', 'user_pass', 'email', 'phone'];
    protected $guarded = [];
}
