<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function create(Request $request)
    {
        Tag::create(['name' => $request->name]);
    }
    public function edit()
    {
    }
}