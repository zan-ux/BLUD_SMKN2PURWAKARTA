<?php
// app/Http/Controllers/GuideController.php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class GuideController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        return view('public.guide', compact('profile'));
    }
}