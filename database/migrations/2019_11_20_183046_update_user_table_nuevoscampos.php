<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserTableNuevoscampos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname')->after('name');
            $table->string('phone')->after('surname')->nullable();
            $table->string('cvpath')->after('phone')->nullable();
            $table->integer('status')->after('cvpath')->comment('value 1 = habilitado; value 0 = deshabilitado')->default(1);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['surname', 'phone', 'cvpath','status']);
        });
    }
}
