<?php

function statuses(){
    return
    [
        
      'status_new' => 'Поставлено',
      'status_done' =>'Выполнено',
      'status_progress' =>'В процессе',
      'status_cancelled' =>'Отменено',
        
    ];
}

function client_statuses(){
    
    return [
      'maybe_client' => 'Потенциальный',
      'in_work_client' => 'В работе',
      'has_docs_client' => 'Договор'   
    ];
   
}

function type_tasks(){
    return 
    [
        'dog' => 'Договор',
        'zvonok' => 'Звонок',
        'znakomstvo' => 'Знакомоство',
        'peregovory' => 'Переговоры',
        'prazdnik' => 'Праздник',
        'ubiley' => 'Юбилей',
        'kanc_tovary' => 'Канцтовары',
        'remont_pk' => 'Ремонт компьютеров',
        'orgteh' => 'Обслуживание оргтехники',
        'sobes' => 'Собеседование'
    ];        
}