<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthCode extends Model
{
    use HasFactory;

    protected $table = 'auth_codes'; // Use the correct table name

    protected $fillable = [
        'authcode',
    ];
}
