<?php

use App\Models\Category;
use App\Models\Envelope;
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
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();

            $table->string('store');
            $table->integer('amount');
            $table->text('description')->default('');
            $table->string('file')->nullable();
            $table->foreignIdFor(Category::class);
            $table->boolean('archived')->default(false);
            $table->foreignIdFor(Envelope::class)->constrained()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipts');
    }
};
