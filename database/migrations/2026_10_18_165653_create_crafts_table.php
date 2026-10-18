
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('crafts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('artisan');
            $table->string('category');
            $table->string('material');
            $table->text('description');
            $table->decimal('price', 12, 2);
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('crafts');
    }
};
