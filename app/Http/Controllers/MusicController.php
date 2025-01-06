<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Music;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class MusicController extends Controller
{
    // List all music for the logged-in user
    public function index() # musiqalar sahifasi
    {
        $music = Music::where('user_id', Auth::id())->get(); # foydalanuvchi yuklagan musiqalarini saralash
        return view('music.index', compact('music'));
    }

    // Store new music
    public function store(Request $request) #musiqani saqlash funksiyasi
    {
        $request->validate([ # kiritilgan malumotlarni tekshirish
            'name' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'file' => 'required|file|mimes:mp3,wav,aac'
        ]);

        // Store the uploaded file
        $filePath = $request->file('file')->store('music', 'public'); # musiqani saqlash uchun manzil yaratish va saqlash
        // Create the music record
        Music::create([ #musiqani malumotlar bazasiga qo'shish
            'name' => $request->name,
            'artist' => $request->artist,
            'file' => $filePath,
            'user_id' => Auth::id(),
            'admin_confirmed' => false, // Default to not confirmed
        ]);

        return redirect()->route('home')->with('success', 'Music added successfully!');
    }

    // Delete music
    public function destroy($id) # musiqani ochirish funksiyasi
    {
        $music = Music::findOrFail($id); # musiqani topish

        // Check if the logged-in user owns the music
        if ($music->user_id !== Auth::id()) { # tekshiradi musiqani kim yuklagan
            abort(403, 'Unauthorized action.');
        }

        // Delete the file from storage
        Storage::disk('public')->delete($music->file); # xotiradan ochirish

        // Delete the music record
        $music->delete(); # malumotlar bazasidan o'chirish

        return redirect()->route('home')->with('success', 'Music deleted successfully!');
    }
}
