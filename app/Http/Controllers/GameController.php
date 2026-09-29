<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Banner;

class GameController extends Controller
{
    public function index(Request $request)
    {
    $search = $request->search;
    $category = $request->category;

    $games = Game::when($search, function ($q) use ($search) {
        $q->where('name', 'like', '%' . $search . '%');
    })
    ->when($category && $category != 'all', function ($q) use ($category) {
        $q->where('category', $category);
    })
    ->get();

    // Fetch active banners from database
    $banners = Banner::where('is_active', true)->orderBy('order')->get();

    return view('dashboard', compact('games', 'banners'));
    }

    public function show($id)
    {
        $game = Game::with('products')->findOrFail($id);
        return view('game', compact('game'));
    }   
}
