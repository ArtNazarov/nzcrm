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
 
 
         Schema::create('clients', function (Blueprint $table) {
             
            $table->id();
            $table->string('name'); // Полное название
            $table->string('inn'); // ИНН КПП
            $table->string('kpp');
            $table->string('uadr'); // Юр адрес
            $table->string('fadr'); // Физ адрес
            $table->string('rcv'); // Перевозчик
            $table->string('phone'); // Телефон
            $table->string('fax'); // Факс
            $table->string('director'); // Директор
            $table->string('glavbuh'); // Гл. бух

            $table->string('email'); // e-mail
            $table->string('site'); // сайт
            $table->string('source'); // источник, откуда пришел был, с сайта, с выставки
            $table->string('status'); // статус клиента 
            $table->string('client_group'); // группа в которой клиент  
            //мелкий опт, оптовики, дилеры, сетевые магазины,
            //поставщики, устаревшее
            $table->string('doc_num'); // Номер договора
            $table->date('doc_date');  // Дата договора
            $table->string('rs'); // Расчетный счет
            $table->string('bank'); // Банк
            $table->string('ks'); // Корр счет
            $table->string('bik'); // БИК
            

        });
        
     
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
};
