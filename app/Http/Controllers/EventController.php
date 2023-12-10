<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EventController extends Controller
{
    public function show(){
        $url = "https://demo.ws.itarget.com.br/event.php";

        try {
            $response = Http::timeout(20)->get($url);

            if ($response->successful()) {
                return $response->json(); // Ou $response->body() para obter o corpo da resposta como texto
            } else {
                return response()->json(['error' => 'Erro na solicitação'], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro na solicitação: ' . $e->getMessage()], 500);
        }
    }
}
