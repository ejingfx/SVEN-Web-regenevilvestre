<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('frequency');
            $table->date('start_date');
            $table->json('days'); // Store as JSON
            $table->json('times'); // Store as JSON
            $table->text('notes')->nullable();
            $table->timestamps(); // Adds created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('schedules');
    }
};
