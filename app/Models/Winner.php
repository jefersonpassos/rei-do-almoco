<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Applicant;

class Winner extends Model
{
    //
    protected $fillable = ['date_vote', 'applicant_id', 'total_votes'];
}
