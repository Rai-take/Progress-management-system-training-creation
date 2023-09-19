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
        Schema::table('posts', function (Blueprint $table) {
            // $table->renameColumn('start-date', 'start_date');
            // $table->renameColumn('due-date','due_date');
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // $table->renameColumn('start_date', 'start-date');
            // $table->renameColumn('due_date','due-date');
            //
        });
    }
};
