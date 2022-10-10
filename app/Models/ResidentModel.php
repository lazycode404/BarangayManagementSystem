<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidentModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_residents';
    protected $fillable = [
        'image',
        'firstname',
        'lastname',
        'middlename',
        'fullname',
        'email',
        'age',
        'gender',
        'civil_status',
        'purok',
        'street',
        'phone_number',
        'occupation',
        'birth_place',
        'birth_date',
        'citizenship',
        'religion',
    ];
}
