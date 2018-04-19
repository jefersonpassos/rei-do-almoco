<?php

namespace App\Http\Controllers\Voting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vote;
use App\Models\Applicant;
use App\Models\Winner;
use DB;


class VotingController extends Controller
{
    //
    
    public function index()
    {
        $applicants = Applicant::all();
        
        $winnerToday = Winner::where('created_at', 'like', date('Y-m-d')."%")->get();
        $winnersToday = array();
        
        foreach($winnerToday as $winner){
            
            array_push($winnersToday, Applicant::find($winner->applicant_id));
        }
        
        return view('voting.index', compact('applicants', 'winnersToday'));
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
