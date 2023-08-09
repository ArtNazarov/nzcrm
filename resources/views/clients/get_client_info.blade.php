<!DOCTYPE html>
<html>
<head>
<title>Информация по клиенту</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<?php require_once  $_SERVER['DOCUMENT_ROOT']. '/settings.php';
$client_statuses = client_statuses();
$sources = sources();
$client_groups = client_groups();
?>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      @include("navigation")
      <form class="d-flex" action='/searcher_client' method='post'>
                  {{ csrf_field() }}
        <input class="form-control me-2" type="search" name='q' id='q' placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Поиск</button>
      </form>
    </div>
  </div>
</nav>
    
 
 
 
 		 	 	 	 	 	 	 	 	 	 	 	
  	 	 	 	 	 	


<h3>{{ $client->name }}</h3>

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Основные</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Статус</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Дополнительно</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        
<p>ИНН {{ $client->inn  }}</p>
<p>КПП {{ $client->kpp }}</p>
<p>Юр. адрес {{ $client->uadr }}</p>
<p>Факт. адрес {{ $client->fadr }}</p>
<p>Грузополучатель {{ $client->rcv }}</p>
<p>Телефон {{ $client->phone }}</p>
<p>Факс {{ $client->fax }}</p>
<p>Директор {{ $client->director }}</p>
<p>Главный бух {{ $client->glavbuh }}</p>
        
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        
<p>Email {{ $client->email }}</p>
<p>Сайт {{ $client->site }}</p>
<p>Источник клиента {{ $sources[ $client->source ] }}</p>
<p>Статус {{ $client_statuses[$client->status] }}</p>


<p>Группа клиента {{ $client_groups[ $client->client_group ] }}</p>        
        
    </div>
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        
<p>Номер договора {{ $client->doc_num }}</p>
<p>Дата договора {{ $client->doc_date }}</p>
<p>Рассчетный счет {{ $client->rs }}</p>

<p>Банк {{ $client->bank}}</p>
<p>Коррсчет {{ $client->ks }}</p>
<p>БИК {{ $client->bik }}</p>
        
    </div>
</div>

 

<h2>Задачи по клиенту</h2>

 @forelse($tasks as $task)
    <div class="row">
    
        <div class='col'>
            <a href="/get_task_info/{{ $task->id }}">   {{ $task->description }} </a>
        </div>
        <div class='col'>
            <a href='/del_task/{{ $task->id }}'>Удалить из базы</a>
        </div>
        <div class='col'>
            <a href='/fedit_task/{{ $task->id }}'>Изменить данные</a>
        </div>
        
    </div>    
    @empty 
        Нет задач в базе
    @endforelse
    
 	 	
 

</div>

@include('footer')

</body><!-- comment -->
</html>


 
