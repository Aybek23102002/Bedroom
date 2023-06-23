<?php

use App\Models\Bedroom;
use App\Models\Floor;
use App\Models\Section;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Bedroom::class)->constrained();
            $table->foreignIdFor(Floor::class)->constrained();
            $table->foreignIdFor(Section::class)->nullable()->constrained();
            $table->integer('number');
            $table->integer('place_count');
            $table->boolean('status');
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
        Schema::dropIfExists('rooms');
    }
}
