<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Schema::table('groups', function (Blueprint $table) {
            $table->integer('faculty_id')->unsigned()->after('number');
            $table->integer('speciality_id')->unsigned()->after('number');

            $table->foreign('faculty_id')
                ->references('id')->on('faculties')
                ->onDelete('cascade');
            $table->foreign('speciality_id')
                ->references('id')->on('specialities')
                ->onDelete('cascade');
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('groups', function (Blueprint $table) {
            $table->dropForeign('groups_faculty_id_foreign');
            $table->dropColumn('faculty_id');
            $table->dropForeign('groups_speciality_id_foreign');
            $table->dropColumn('speciality_id');
        });
    }
}
