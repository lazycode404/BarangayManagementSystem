<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangayModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_barangay';
    protected $fillable = [
        'logo',
        'barangay',
        'municipality',
        'province',
        'phonenumber',
        'emailAddress'
    ];
}
