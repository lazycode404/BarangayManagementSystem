<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlotterModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_blotter';
    protected $fillable = [
        'complainant',
        'complain_statement',
        'respondent',
        'person_involved',
        'location_incident',
        'incident_type',
        'dateTime_reported',
        'dateTime_incident',
        'status',
        'remarks',
        'action_take',
    ];

}
