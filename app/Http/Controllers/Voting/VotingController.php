<?php

namespace App\Http\Controllers\Voting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vote;
use App\Models\Applicant;
use DB;


class VotingController extends Controller
{
    //
    
    public function index()
    {
        $applicants = Applicant::all();
        
        return view('voting.index', compact('applicants'));
    }
    
    public function vote($id){
        
        $applicant = Applicant::find($id);
        
        $response = $applicant->voted();
        
        // $response = Vote::voted([
        //         'applicant_id' => $id,
        //         'date_vote' => date_create('now')
        //     ]);
            
        if($response['success'])
            return redirect()
                        ->route('voting.home')
                        ->with('success', $response['message']);
    
        return redirect()
                        ->route('voting.home')
                        ->with('error', $response['message']);
    }
}
