<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rules\Exists;

class EventController extends Controller
{
    public function show(){
        $url = "https://demo.ws.itarget.com.br/event.php";

        try {
            $response = Http::timeout(20)->get($url);

            if ($response->successful()) {
                $data = $response->json();
                $events = $data['data'];

                foreach ($events as $event) {
                    Event::updateOrCreate(['name' => $event['name']], $event);
                }
                return $events;
            } else {
                return response()->json(['error' => 'Erro na solicitação'], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro na solicitação: ' . $e->getMessage()], 500);
        }
    }
    public function singup(Request $request){
        $payload = $request->all();


            foreach ($payload['events'] as $event_id) {
                $data = [
                    'name' => $payload['name'],
                    'cpf' => $payload['cpf'],
                    'email' => $payload['email'],
                    'event_id' => $event_id
                ];
                Registered::updateOrCreate(['cpf' => $$payload ['cpf']], $data);

       

        //

        return $payload;
    }
}
