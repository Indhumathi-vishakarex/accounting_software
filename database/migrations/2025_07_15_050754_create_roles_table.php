<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id(); // This will auto-increment
            $table->string('rolename')->unique();
            $table->boolean('can_view')->default(0);
            $table->boolean('can_create')->default(0);
            $table->boolean('can_edit')->default(0);
            $table->boolean('can_delete')->default(0);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE roles AUTO_INCREMENT = 1000;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
