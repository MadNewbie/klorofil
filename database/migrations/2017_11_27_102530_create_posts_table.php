<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
//Adding non-standard query expression
use Illuminate\Database\Query\Expression;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        //Using non-standard command for multiple database: Schema::connection()
        Schema::connection('mysql2')->create('posts', function (Blueprint $table) {
            //Encapsulation to signify cross database relationship
            $cross=DB::connection('mysql')->getDatabaseName();

            $table->increments('id');
            $table->unsignedInteger('author_id')->default(0)->index();
            $table->foreign('author_id')
            ->references('id_user')
            ->on(new Expression(''.$cross.'.users'))
            ->onDelete('cascade');
            $table->string('title')->unique();
            $table->text('body');
            $table->string('slug')->unique();
            $table->boolean('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Using non-standard command for multiple database: Schema::connection()
        Schema::connection('mysql2')->dropIfExists('posts');
    }
}
