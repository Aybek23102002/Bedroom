<?php

use App\Models\Bedroom;
use App\Models\Floor;
use App\Models\Room;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname');
            $table->string('facultet');
            $table->string('group');
            $table->string('phone');
            $table->foreignIdFor(Bedroom::class)->constrained();
            $table->foreignIdFor(Floor::class)->constrained();
            $table->foreignIdFor(Room::class)->constrained();
            $table->date('given_time');
            $table->date('return_time');
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
        Schema::dropIfExists('histories');
    }
}
