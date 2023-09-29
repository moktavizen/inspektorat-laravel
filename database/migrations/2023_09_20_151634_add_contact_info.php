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
        DB::table('contacts')->insert([
            'address' => 'Jl. Dr. Wahidin Sudirohusodo No. 245 Gresik',
            'phone' => '(031) 3952823 - 30',
            'email' => 'inspektorat@gresikkab.go.id',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        DB::table('contacts')->where([
            'address' => 'Jl. Dr. Wahidin Sudirohusodo No. 245 Gresik',
            'phone' => '(031) 3952823 - 30',
            'email' => 'inspektorat@gresikkab.go.id',
        ])->delete();
    }
};
