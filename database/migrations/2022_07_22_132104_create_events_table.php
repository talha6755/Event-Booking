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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id");
            $table->foreignId("category_id");
            $table->string("event_name");
            $table->string("event_address");
            $table->string("no_of_attendres");
            $table->integer("price");
            $table->string("start_date");
            $table->string("end_date");
            $table->string("start_time");
            $table->string("end_time");
            $table->enum("publication_status",[0,1])->default(1);
            $table->string("cover_image");
            $table->longText("description");
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
        Schema::dropIfExists('events');
    }
};
