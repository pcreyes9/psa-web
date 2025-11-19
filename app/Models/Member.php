<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    protected $table = 'members';
    protected $primaryKey = 'member_id_no'; // or whatever your PK is
    protected $fillable = [
        'mem_email_address',
        'password',
        'mem_first_name',
        'mem_last_name',
    ];

    // Tell Laravel not to use bcrypt automatically
    public function getAuthPassword()
    {
        return $this->password;
    }
}
