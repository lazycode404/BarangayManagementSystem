<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficialsModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_officials';
    protected $fillable = [
        'image',
        'firstname',
        'lastname',
        'middlename',
        'position',
        'age',
        'gender',
        'civil_status',
        'birth_date',
        'birth_place',
        'phone_number',
        'email',
        'purok',
        'term_from',
        'term_to',
        'address',
        'status',
        'username',
        'password'
    ];
}
