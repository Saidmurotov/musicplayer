<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Music;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class MusicController extends Controller
{
    // List all music for the logged-in user
    public function index()
    {
        $music = Music::where('user_id', Auth::id())->get();
        return view('music.index', compact('music'));
    }

    // Store new music
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'file' => 'required|file|mimes:mp3,wav,aac|max:2048'
        ]);

        // Store the uploaded file
        $filePath = $request->file('file')->store('music', 'public');
        // Create the music record
        Music::create([
            'name' => $request->name,
            'artist' => $request->artist,
            'file' => $filePath,
            'user_id' => Auth::id(),
            'admin_confirmed' => false, // Default to not confirmed
        ]);

        return redirect()->route('home')->with('success', 'Music added successfully!');
    }

    // Delete music
    public function destroy($id)
    {
        $music = Music::findOrFail($id);

        // Check if the logged-in user owns the music
        if ($music->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Delete the file from storage
        Storage::disk('public')->delete($music->file);

        // Delete the music record
        $music->delete();

        return redirect()->route('home')->with('success', 'Music deleted successfully!');
    }
}
