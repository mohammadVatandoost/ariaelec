<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemoryConfigurationPromsForFPGAsTable extends Migration
{
    public $cols = [];
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->cols = unserialize(\App\Helper::find(69)->helper);
        Schema::create('memory__configuration__proms_for__fpgas', function (Blueprint $table) {
            $table->increments('id');
            for($i=0;$i<count($this->cols);$i++){
                $table->string($this->cols[$i])->nullable();
            }
            $table->unsignedInteger('common_id')->default(69);
            $table->unsignedInteger('product_id')->nullable()->default(38);
            $table->foreign('common_id',str_random(5).'_'.'common_id')->references('id')->on('commons')->onDelete('cascade');
            $table->foreign('product_id',str_random(5).'_'.'product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('memory__configuration__proms_for__fpgas');
    }
}
