<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointsTable extends Migration
{
    public function up()
    {
        Schema::create('points', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('amount_spent', 15, 2);
            $table->string('reason');
            $table->integer('points');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
