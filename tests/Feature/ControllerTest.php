<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\Registered;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class EventControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_show_method_fetches_and_updates_events()
    {
        Http::fake([
            'https://demo.ws.itarget.com.br/event.php' => Http::response([
                'data' => [
                    [
                        'id' => 1,
                        'name' => 'Evento de programação backend java',
                        'start_date' => '2023-12-19',
                        'end_date' => '2023-12-21',
                        'status' => false,
                    ]
                ],
            ]),
        ]);

        $this->artisan('migrate'); 

        $response = $this->get('/show');

        $response->assertStatus(200);
        $this->assertCount(1, Event::all()); 
    }

    public function test_signup_method_registers_participant_for_events()
    {
        $event = Event::factory()->create();

        $payload = [
            'name' => 'Nome do Participante',
            'cpf' => '12345678901',
            'email' => 'participant@example.com',
            'events' => [$event->id],
        ];

        $this->post('/signup', $payload);

        $this->assertCount(1, Registered::all()); 
    }
}
