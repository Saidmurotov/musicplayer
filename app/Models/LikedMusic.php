<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikedMusic extends Model
{
    use HasFactory;
    protected $table = 'liked_musics'; // Ensure the table name matches the migration
    protected $fillable = [
        'user_id',
        'music_id',
    ];

    /**
     * Get the user who liked the music.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the music that was liked.
     */
    public function music()
    {
        return $this->belongsTo(Music::class);
    }
}
