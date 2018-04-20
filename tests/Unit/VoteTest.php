<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\Vote;

class VoteTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testDatabase()
    {
        $vote = factory(Vote::class)->create();
        
        $this->assertDatabaseHas('votes', [
                'applicant_id' => $vote->applicant_id,
                'id' => $vote->id,
                'total_votes' => $vote->total_votes,
                'created_at' => $vote->created_at,
                'updated_at' => $vote->updated_at
            ]);
    }
}
