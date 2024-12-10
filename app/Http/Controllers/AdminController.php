<?php
namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $musics = Music::all();
        $sum = Music::all()->sum(function ($music) {
            return 1;
        });
        return view('admin.home', compact('musics', 'sum')); // Create a Blade file for user dashboard
    }
}
