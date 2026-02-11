<?php
use App\Models\Usuario;
use App\Models\Post;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->string('contenido');
            $table->foreignIdFor(Usuario::class, 'id_usuario')->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Post::class, 'id_post')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentarios');

        
    }
};
