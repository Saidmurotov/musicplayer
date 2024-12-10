<?php
namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $musics = Music::all();
        $sum = Music::all()->sum(function ($music) {
            return 1;
        });
        return view('user.home', compact('musics', 'sum')); // Create a Blade file for user dashboard
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            // Search by music name or artist
            $musics = Music::where('name', 'LIKE', "%$query%")
                ->orWhere('artist', 'LIKE', "%$query%")
                ->get();
        } else {
            $musics = Music::all(); // Show all music if no search query
        }

        return view('user.search', compact('musics'));
    }
}
