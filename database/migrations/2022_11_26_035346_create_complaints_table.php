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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->text("description");
            $table->text('latitude')->nullable();
            $table->text('longitude')->nullable();
            $table->foreignId("category_id")->constrained("complaint_categories");
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
        Schema::dropIfExists('complaints');
    }
};
