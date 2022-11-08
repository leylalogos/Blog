<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function create(Request $request)
    {
        Subscription::create(
            [
                'name' => $request->name,
                'email' => $request->email
            ]
        );
        return response()->json(['message' => 'your subscription has been created'], 201);

    }
}