<?php

namespace Tests\Feature;

use App\Models\IncidentUpdate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IncidentUpdateTest extends TestCase
{
    private $incidentUpdate;

    public function setUp(): void
    {
        parent::setUp();

        $this->incidentUpdate = factory(IncidentUpdate::class)->create();
    }

    /** @test */
    public function has_incident()
    {
        $this->assertTrue($this->incidentUpdate->incident !== null);
        $this->assertTrue(class_basename($this->incidentUpdate->incident) == 'Incident');
    }

    /** @test */
    public function has_user()
    {
        $this->assertTrue($this->incidentUpdate->user !== null);
        $this->assertTrue(class_basename($this->incidentUpdate->user) == 'User');
    }

    /** @test */
    public function has_name()
    {
        $this->assertIsString($this->incidentUpdate->name);
    }

    /** @test */
    public function has_status()
    {
        $this->assertIsInt($this->incidentUpdate->status);
        $this->assertTrue(
            in_array($this->incidentUpdate->status, array_keys(config('laravel-status-page.incident-statuses')))
        );
    }

    /** @test */
    public function has_message()
    {
        $this->assertIsString($this->incidentUpdate->message);
    }

}
