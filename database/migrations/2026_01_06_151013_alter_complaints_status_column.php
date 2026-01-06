<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('complaints', function (Blueprint $table) {
            // change status to an ENUM-like constraint using a string is fine,
            // but we'll enforce it at app validation level.
            $table->string('status', 50)->default('New')->change();
        });
    }

    public function down(): void
    {
        Schema::table('complaints', function (Blueprint $table) {
            $table->string('status', 255)->default('New')->change();
        });
    }
};
