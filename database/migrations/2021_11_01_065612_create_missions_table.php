<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('missions', function (Blueprint $table) {
            $table->id()->comment('id');
            $table->uuid('mission_id')->unique()->index()->comment('mission_id');
            $table->uuid('builder_id')->index()->comment('builder_id 任務建立者id');
            $table->uuid('updater_id')->index()->comment('updater_id 任務修改者id');
            $table->string('title', 100)->comment('任務標題');
            $table->text('content')->comment('任務內容');
            $table->timestamp('start_at')->nullable()->comment('任務開始時間');
            $table->timestamp('end_at')->nullable()->comment('任務結束時間');
            $table->enum('priority',['low', 'middle', 'high'])->default('low')->comment('優先順序 low:低, middle:中, high:高');
            $table->enum('status',['waiting', 'doing', 'finish'])->default('waiting')->comment('狀態 waiting:待處理, doing:進行中, finish:已完成');
            $table->json('tag')->nullable()->comment('分類標籤');
            $table->timestamp('created_at')->comment('任務創立時間');
            $table->timestamp('updated_at')->nullable()->comment('任務修改時間');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('missions');
    }
}
