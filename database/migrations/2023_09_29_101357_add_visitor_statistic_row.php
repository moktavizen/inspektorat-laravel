<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::table('visitor_statistics')->insert([
            'weekly_visitors' => 0,
            'total_visitors' => 0,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        DB::table('visitor_statistics')->where([
            'weekly_visitors' => 0,
            'total_visitors' => 0,
        ])->delete();
    }
};
