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
            $table->text("location");
            $table->enum("type", ["Bencana Alam", "Pemadam Kebakaran", "Ambulans", "Polisi"]);
            $table->enum("status", ["Dilaporkan", "Proses", "Selesai"]);
            $table->foreignId("user_id")->constrained("users");
            $table->foreignId("village_id")->constrained("villages");
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
