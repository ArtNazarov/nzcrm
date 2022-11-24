<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            
            $table->string('dplan'); // запланировано на дату
            $table->string('dstart'); // поставлено 
            $table->string('days'); // дней на исполнение
            $table->string('description'); // описание
            $table->string('report'); // отчет
            $table->string('manager_id'); // кто назначен
            $table->string('client_id'); // кто клиент
            $table->string('task_type'); // тип задачи
            $table->string('status'); // состояние задачи
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
