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
    Schema::create('post_tag', function (Blueprint $table) {
        $table->primary(['post_id', 'tag_id']); // A post can only have a tag once

        $table->foreignId('post_id')->constrained()->cascadeOnDelete();
        $table->foreignId('tag_id')->constrained()->cascadeOnDelete();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_tag');
    }
};
