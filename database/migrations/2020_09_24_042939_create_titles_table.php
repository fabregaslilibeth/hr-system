<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTitlesTable extends Migration
{
    private const TITLES = [
        [
            'id' => 1,
            'name' => 'Accountant',
            'level' => 'Management'
        ],
        [
            'id' => 2,
            'name' => 'Finance Officer',
            'level' => 'Management'
        ],
        [
            'id' => 3,
            'name' => 'HR Manager',
            'level' => 'Management'
        ],
        [
            'id' => 4,
            'name' => 'Admin Staff',
            'level' => 'Rank and File'
        ],
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('level');
            $table->timestamps();
        });

        // Seed
        DB::table('titles')->insert(self::TITLES);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('titles');
    }
}
