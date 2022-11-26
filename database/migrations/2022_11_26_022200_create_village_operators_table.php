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
        Schema::create('village_operators', function (Blueprint $table) {
            $table->id();
            $table->foreignId("operator_id")->constrained("users");
            $table->foreignId("village_id")->constrained("villages");
            $table->enum("type", ["Pemadam Kebakaran", "Ambulans", "Polisi"]);
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
        Schema::dropIfExists('village_operators');
    }
};
