<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'artist',
        'file',
        'user_id',
        'admin_confirmed',
    ];

    /**
     * The user who uploaded the music.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
