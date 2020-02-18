<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('start', 5);
            $table->string('end', 5);
            $table->unsignedTinyInteger('price');
            $table->timestamps();
        });

        $items = [
            ["GRU", "BRC", 10],
            ["GRU", "SCL", 18],
            ["GRU", "ORL", 56],
            ["GRU", "CDG", 75],
            ["SCL", "ORL", 20],
            ["BRC", "SCL", 5],
            ["ORL", "CDG", 5],
        ];

        foreach ($items as $item){
            DB::table('routes')->insert(array("start" => $item[0], "end"=> $item[1], "price"=> $item[2], "created_at" => \Carbon\Carbon::now(), "updated_at" => \Carbon\Carbon::now()));
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routes');
    }
}
