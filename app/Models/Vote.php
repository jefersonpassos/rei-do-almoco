<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;

class Vote extends Model
{
    //
    protected $fillable = ['date_vote', 'applicant_id', 'total_votes'];
    
    public function vote()
    {
        
        // mudar para "or" depois dos testes
        if( !( (int)date('H') >= 10 || (int)date('H') <= 12 ) )
            return [
                'success' => false,
                'message' => Lang::get('messages.vote.timeout')
            ];
            
        $this->total_votes +=1;
        
        $save = $this->save();
        
        if($save)
            return [
              'success' => true,
              'message' => Lang::get('messages.vote.create.success')
            ];
        
        return [
            'success' => false,
            'message' => Lnag::get('messages.vote.create.error')
        ];
    }
}
