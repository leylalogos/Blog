<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Passport\Client;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $client = Client::where('password_client', 1)->firstOrFail();
        
        $response = Http::asForm()->post(
            //route('passport.token'),
            'http://localhost:8001/oauth/token',
            [
                'grant_type' => 'password',
                'client_id' => $client->id,
                'client_secret' => $client->secret,
                'username' => $request->username,
                'password' => $request->password,
            ]
        );
        return $response->json();
    }
}