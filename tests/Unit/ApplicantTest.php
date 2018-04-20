<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Applicant;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ApplicantTest extends TestCase
{
    
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testDatabase()
    {
        
        $applicant = factory(Applicant::class)->create();
        
        $this->assertDatabaseHas('applicants', [
                'id' => $applicant->id,
                'name' => $applicant->name,
                'email' => $applicant->email,
            ]);
    }
}
