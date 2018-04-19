<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Vote;
use App\Models\Winner;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CreateWinner extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'winner:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Winners';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        
        $max_votes = DB::table('votes')->max('total_votes');
        
        if($max_votes > 0 ){
            
            $winners = DB::table('votes')->whereRaw('total_votes = ? ', [$max_votes])->get();
            
            foreach($winners as $winner){
                Log::info("Winner applicant id ".$winner->applicant_id);
                Winner::create([
                    'applicant_id' => $winner->applicant_id
                ]);
            }
        }
        
        DB::table('votes')->update(['total_votes' => 0]);
        
    }
}
