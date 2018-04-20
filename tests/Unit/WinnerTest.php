<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Winner;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class WinnerTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        
        $winner = factory(Winner::class)->create();
        
        $this->assertDatabaseHas('winners', [
                'applicant_id' => $winner->applicant_id,
                'created_at' => $winner->created_at,
                'updated_at' => $winner->updated_at
            ]);
    }
}
