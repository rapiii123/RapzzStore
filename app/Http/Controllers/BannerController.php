<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Game;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('order')->get();
        $games = Game::all();
        return view('admin.banners', compact('banners', 'games'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'required|string|max:100',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:5120',
            'game_id' => 'nullable|exists:games,id',
            'link' => 'nullable|url',
            'is_active' => 'nullable|boolean'
        ]);

        // Upload image
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('banners', 'public');
            
            Banner::create([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $path,
                'game_id' => $request->game_id,
                'link' => $request->link,
                'is_active' => $request->has('is_active') ? true : false,
                'order' => Banner::max('order') + 1 ?? 1
            ]);

            return redirect()->route('admin.banners.index')->with('success', 'Banner berhasil diupload!');
        }

        return back()->with('error', 'Gagal mengupload banner.');
    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        $games = Game::all();
        return view('admin.banner-edit', compact('banner', 'games'));
    }

    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);
        
        $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'required|string|max:100',
            'game_id' => 'nullable|exists:games,id',
            'link' => 'nullable|url',
            'is_active' => 'nullable|boolean'
        ]);

        $banner->update([
            'title' => $request->title,
            'description' => $request->description,
            'game_id' => $request->game_id,
            'link' => $request->link,
            'is_active' => $request->has('is_active') ? true : false,
        ]);

        return redirect()->route('admin.banners.index')->with('success', 'Banner berhasil diperbarui!');
    }

    public function toggle($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->update(['is_active' => !$banner->is_active]);

        return redirect()->route('admin.banners.index')->with('success', 'Status banner berhasil diubah!');
    }

    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        
        // Delete image file
        if ($banner->image && file_exists(storage_path('app/public/' . $banner->image))) {
            unlink(storage_path('app/public/' . $banner->image));
        }

        $banner->delete();

        return redirect()->route('admin.banners.index')->with('success', 'Banner berhasil dihapus!');
    }
}
