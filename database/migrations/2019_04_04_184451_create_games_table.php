<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('赛事名称');
            $table->integer('class')->comment('赛事类型');
            $table->timestamp('begins_at');
            $table->integer('golden_id')->nullable()->comment('金牌队伍ID');
            $table->string('golden_name')->nullable()->comment('金牌获得者');
            $table->integer('silver_id')->nullable()->comment('银牌队伍ID');
            $table->string('silver_name')->nullable()->comment('银牌获得者');
            $table->integer('bronze_id')->nullable()->comment('铜牌队伍ID');
            $table->string('bronze_name')->nullable()->comment('铜牌获得者');
            $table->integer('golden_s_id')->nullable()->comment('体特-金牌队伍ID');
            $table->string('golden_s_name')->nullable()->comment('体特-金牌获得者');
            $table->integer('silver_s_id')->nullable()->comment('体特-银牌队伍ID');
            $table->string('silver_s_name')->nullable()->comment('体特-银牌获得者');
            $table->integer('bronze_s_id')->nullable()->comment('体特-铜牌队伍ID');
            $table->string('bronze_s_name')->nullable()->comment('体特-铜牌获得者');
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
        Schema::dropIfExists('games');
    }
}
