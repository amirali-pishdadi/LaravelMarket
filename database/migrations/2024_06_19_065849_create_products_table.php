<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("description");
            $table->integer("category_id");
            $table->unsignedBigInteger("creator");
            $table->decimal("price" , 12);
            $table->string("product_image");
            $table->integer("quantity");
            $table->string("brand");
            $table->integer("discount");
            $table->timestamps();

            $table->foreign("creator")->references("id")->on("users")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
