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
        Schema::create('emergencies', function (Blueprint $table) {
            $table->id();
            $table->text("description");
            $table->text('latitude')->nullable();
            $table->text('longitude')->nullable();
            $table->enum("type", ["Pemadam Kebakaran", "Ambulans", "Polisi"]);
            $table->enum("access", ["Public", "Private"]);
            $table->enum("status", ["Dilaporkan", "Diproses", "Selesai"]);
            $table->foreignId("user_id")->constrained("users");
            $table->foreignId("village_id")->constrained("villages");
            $table->foreignId("operator_id")->nullable()->constrained("users");
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
        Schema::dropIfExists('emergencies');
    }
};
