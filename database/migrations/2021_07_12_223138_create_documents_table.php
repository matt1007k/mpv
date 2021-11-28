<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('email', 150);
            $table->string('full_name', 200);
            $table->enum('doc_type', ['dni', 'ruc'])->default('dni');
            $table->string('doc_number', 10);
            $table->string('cell_phone', 9);
            $table->string('address', 200);
            $table->string('origin_place', 200);
            $table->string('subject', 250);
            $table->string('file');
            $table->foreignId('user_id')->nullable();
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
        Schema::dropIfExists('documents');
    }
}
