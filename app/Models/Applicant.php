<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Vote;
use App\Models\Winner;
use Illuminate\Support\Facades\Lang;

class Applicant extends Model
{
    
    protected $fillable = ['name', 'email', 'photo_url'];
    //
    public function applicants()
    {
        return Applicant::all();
    }
    
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
    
    public function victories()
    {
        return $this->hasMany(Winner::class);
    }
    
    public function register(Array $data) : Array 
    {
        
        $applicant  = Applicant::create([
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'photo_url' => $data['image']
                    ]);
        
        if($applicant)
            return [
              'success' => true,
              'message' => Lang::get('messages.user.create.success')
            ];
        
        return [
            'success' => false,
            'message' => Lnag::get('messages.user.create.error')
        ];
    }
    
    public static function deleted($id)
    {
        $applicant = Applicant::find($id);
        $delete = $applicant->delete();
        
        if($delete)
            return [
                'success' => true,
                'message' => Lang::get('messages.user.delete.success')
            ];
            
        return [
            'success' => false,
            'message' => Lang::get('messages.user.delete.error')
        ];
    }
}
