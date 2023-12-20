<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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

        return $payload;
    }
}
