<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('achats', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->decimal('prix', 10, 2);
            $table->date('date_achat');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('achats');
    }
};