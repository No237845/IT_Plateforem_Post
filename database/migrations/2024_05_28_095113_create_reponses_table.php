<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reponses', function (Blueprint $table) {
            $table->id();
            $table->string('contenu');
            $table->unsignedBigInteger('profil_id');
            $table->unsignedBigInteger('discussion_id');
            $table->foreign('profil_id')->references('id')->on('profils')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign('discussion_id')->references('id')->on('discussions')->onUpdate('restrict')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reponses');
    }
};
