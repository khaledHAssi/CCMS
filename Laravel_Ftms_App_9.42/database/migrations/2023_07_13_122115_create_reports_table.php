<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {

            //         Report ID (unique identifier)
            //         User_ID _(*)
            //         Name _(*)
            //         Email _(*)
            //         Description _(*)
            //         Type enum('companyManager','doctor','contact') _(*)
            //         Link _(company&doctor)
            //         hour_price  _(doctor)
            //         image _(company&doctor)
            //         Content(can be a text field or a file attachment) _(company&doctor)
            //         status null
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('image')->nullable();
            $table->text('description');
            $table->enum('type', ['companyManager', 'doctor', 'contact'])->default('contact');
            $table->integer('hour_price')->nullable();
            $table->string('link')->nullable();
            $table->string('content')->nullable();
            $table->boolean('status')->nullable();
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
        Schema::dropIfExists('reports');
    }
};
