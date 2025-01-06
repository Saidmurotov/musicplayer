<?php
namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() # oddiy foydalanuvchilarning asosiy sahifasi
    {
        $musics = Music::all(); # barcha musiqalarni yuklaydi
        $sum = Music::all()->sum(function ($music) {
            return 1;
        }); # musiqalarni sonini hisoblaydi
        return view('user.home', compact('musics', 'sum')); // Create a Blade file for user dashboard
    }
    public function search(Request $request) # qidirish funksiyasi
    {
        $query = $request->input('query'); # query yani kalit so'zniyuklab oladi

//        qidirish jarayoni
        if ($query) {
            // Search by music name or artist
            $musics = Music::where('name', 'LIKE', "%$query%") # bu yerda % belgisi % boshida va oxirida boshqa belgilar bolishi mumkinligini bildiradi
                ->orWhere('artist', 'LIKE', "%$query%")
                ->get();
        } else {
            $musics = Music::all(); // Show all music if no search query
        }

        return view('user.search', compact('musics'));
    }
}
