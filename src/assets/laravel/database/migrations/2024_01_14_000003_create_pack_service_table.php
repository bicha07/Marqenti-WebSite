<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackServiceTable extends Migration
{
    public function up()
    {
        Schema::create('pack_service', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pack_id');
            $table->unsignedBigInteger('service_id');
            $table->timestamps();

            $table->foreign('pack_id')->references('id')->on('packs')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');

            // Optionally add a unique constraint to avoid duplicate pairings
            $table->unique(['pack_id', 'service_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('pack_service');
    }
}
