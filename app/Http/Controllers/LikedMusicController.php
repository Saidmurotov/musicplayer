<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LikedMusic;
use App\Models\Music;

class LikedMusicController extends Controller
{
    public function like(Request $request, $musicId) # musiqaga layk bosihs
    {
        $user = auth()->user();

        if (!$user->likedMusicItems->contains($musicId)) {
            LikedMusic::create([ # malumotlar bazasiga qaysi foydalanuvchi qaysi musiqaga layk bosganini saqlaydi
                'user_id' => $user->id,
                'music_id' => $musicId,
            ]);
        }

        return back()->with('success', 'Music liked successfully!');
    }

    public function unlike(Request $request, $musicId)
    {
        $user = auth()->user();

        $likedMusic = LikedMusic::where('user_id', $user->id)
            ->where('music_id', $musicId)
            ->first();

        if ($likedMusic) {
            $likedMusic->delete(); # layk bosilgani o'chirib tashlaydi
        }

        return back()->with('success', 'Music unliked successfully!');
    }
    /**
     * Get all liked musics for the authenticated user.
     */
    public function index()
    {
        $musics = LikedMusic::with('music')
            ->where('user_id', auth()->id())
            ->get();
        // Calculate the sum of a specific property, for example, 'duration' (assuming it exists in the `music` table)
        $sum = $musics->sum(function ($likedMusic) {
            return 1; // Replace 'duration' with the property you want to sum
        });
        return view('user.liked', compact('musics', 'sum'));
    }
}
