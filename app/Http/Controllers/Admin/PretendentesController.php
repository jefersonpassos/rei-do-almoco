<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Http\Requests\ApplicantValidationFormRequest;
use App\Models\Vote;

class PretendentesController extends Controller
{
    //
    public function index()
    {
        $applicants = Applicant::all();
        
        return view('admin.pretendentes.index', compact('applicants'));
    }
    
    public function register()
    {
        
        return view('admin.pretendentes.register');
    }
    
    public function registered(ApplicantValidationFormRequest $request, Applicant $applicant)
    {
        $response = $applicant->register([
                        'name' => $request->name,
                        'email' => $request->email,
                        'image' => $request->image
                    ]);
        
        if($response['success'])
            return redirect()
                        ->route('admin.applicant')
                        ->with('success', $response['message']);
                        
        
        return redirect()
                    ->back()
                    ->with('error', $response['message']);
        
    }
    
    public function delete($id)
    {
        $response = Applicant::deleted($id);
        
        if($response['success'])
            return redirect()
                    ->route('admin.applicant')
                    ->with('success', $response['message']);
                    
        return redirect()
                    ->back()
                    ->with('error', $response['message']);
    }
}
