<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStdinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
       Schema::create('stdinfos', function (Blueprint $table) {
        $table->increments('stdid')->unique();;
        $table->string('stdname');
        $table->string('stdbatch');
        $table->string('stdemail');
        $table->string('stdfaculty');
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
        //
        Schema::drop('stdinfos');
    }
}
