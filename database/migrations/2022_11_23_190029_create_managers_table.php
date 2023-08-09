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
        Schema::create('managers', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // имя менеджера
            $table->string('adr'); // адрес
            $table->string('pass'); // номер паспорта
            $table->string('phone'); // телефон
            $table->date('birthday'); // дата рождения
            $table->string('inn'); // ИНН
            $table->string('wday'); // дата найма
            $table->string('percent'); // процент
            $table->string('email'); // почта
            $table->string('manager_group'); // группа
           });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('managers');
    }
};
