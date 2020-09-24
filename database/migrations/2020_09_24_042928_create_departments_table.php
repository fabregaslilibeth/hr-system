<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    private const DEPARTMENTS = [
        [
            'id' => 1,
            'name' => 'Accounting',
        ],
        [
            'id' => 2,
            'name' => 'Finance'
        ],
        [
            'id' => 3,
            'name' => 'HR '
        ],
        [
            'id' => 4,
            'name' => 'Admin'
        ],
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Seed
        DB::table('departments')->insert(self::DEPARTMENTS);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
}
