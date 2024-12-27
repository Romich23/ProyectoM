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
        Schema::table('reportes', function (Blueprint $table) {
            $table->unsignedBigInteger('seguimiento_id')->default(1);
            $table->foreign('seguimiento_id')->references('id')->on('reportes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reportes', function (Blueprint $table) {
            $table->dropForeign('reportes_seguimiento_id_foreign');
            $table->dropColumn('seguimiento_id');
        });
    }
};
