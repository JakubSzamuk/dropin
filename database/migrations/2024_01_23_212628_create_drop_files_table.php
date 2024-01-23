<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('drop_files', function (Blueprint $table) {
            $table->id();
            $table->string('file_title');
            $table->string('file_content');
            $table->string('file_password')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('drop_files');
    }
};
