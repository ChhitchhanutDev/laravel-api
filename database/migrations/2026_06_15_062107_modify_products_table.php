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
        Schema::table('products', function (Blueprint $table) {

            // Remove old column
            $table->dropColumn('desc');

            // Add new columns
            $table->string('image')->nullable();
            $table->integer('stock')
                ->default(0);
            $table->boolean('is_active')
                ->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {

            // Restore removed column
            $table->string('desc');

            // Remove added columns
            $table->dropColumn([
                'image',
                'stock',
                'is_active'
            ]);
        });
    }
};
