<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    //
    public $timestamps = false;
    
    public function totalVotesApplicant($applicantId)
    {
        $total = $this->where('id_applicant', '=', $applicantId)->count();
        return $total;
    }
}
