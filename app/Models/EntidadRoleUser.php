<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntidadRoleUser extends Model
{
    //
    protected $table = 'role_user';

    protected $fillable = ['role_id','user_id'];

    protected $guarded =['id'];
}
