<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('music', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Name of the music
            $table->string('artist'); // Name of the artist
            $table->string('file'); // Path to the music file
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to users table
            $table->boolean('admin_confirmed')->default(false); // Admin confirmation status
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('music');
    }
}
