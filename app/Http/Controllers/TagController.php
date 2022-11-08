<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        return Tag::all();
    }
    public function create(Request $request)
    {
        Tag::create(['name' => $request->name]);
        return response()->json(['message' => 'your tag has been created'], 201);
    }
    public function edit()
    {
    }
}