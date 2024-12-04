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
        Schema::table('users', function (Blueprint $table) {
            $table->integer('grad');
            $table->string('phone')->unique();
            $table->string('mother_name')->nullable();
            $table->string('mother_phone')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_phone')->nullable();
            $table->string('address')->nullable();
            $table->string('location')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'grad',
                'phone',
                'mother_name',
                'mother_phone',
                'father_name',
                'father_phone',
                'address',
                'location',
                'deleted_at',
            ]);
        });
    }
};
