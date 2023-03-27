<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('image', 255)->nullable()->after('class_id');
        });
    }
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('image'); // Make sure column name != input name in views
        });
    }
};
