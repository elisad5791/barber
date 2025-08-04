<?php

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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
        });

        DB::table('services')->insertOrIgnore([
            ['title' => 'Женский парикмахер'],
            ['title' => 'Мужской парикмахер'],
            ['title' => 'Детский парикмахер'],
            ['title' => 'Маникюр'],
            ['title' => 'Педикюр'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
