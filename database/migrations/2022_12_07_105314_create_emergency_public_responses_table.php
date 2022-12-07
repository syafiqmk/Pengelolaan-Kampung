<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emergency_public_responses', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['Pemadam Kebakaran', 'Ambulans', 'Polisi']);
            $table->text('description');
            $table->text('latitude');
            $table->text('longitude');
            $table->foreignId('operator_id')->constrained('users');
            $table->foreignId('village_id')->constrained('villages');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emergency_public_responses');
    }
};
