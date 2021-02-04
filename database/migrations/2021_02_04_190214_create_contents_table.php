<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('content');
            $table->text('description');
            $table->text('link')->nullable();
            $table->string('image')->nullable();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('keyword_id')->constrained();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->boolean('from_admin')->default(false);
            $table->softDeletes();
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
        Schema::dropIfExists('contents');
    }
}
