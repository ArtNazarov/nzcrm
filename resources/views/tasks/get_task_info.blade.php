<!DOCTYPE html>
<html>
<head>
<title>Информация по задаче</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<?php require_once  $_SERVER['DOCUMENT_ROOT']. '/settings.php';
$statuses = statuses();
$type_tasks = type_tasks();
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
 
 
 
 		 	 	 	 	 	 	 	 	 	 	 	
  		 	 	 	 	 	 	 	 	 	 	 	 	 	 	


<h3>Номер задачи {{ $task->id  }}</h3>
 
<p>Сумма {{ $task->price  }}</p
<p>План {{ $task->dplan  }}</p>
<p>Дата постановки {{ $task->dstart }}</p>
<p>Дней на исполнение {{ $task->days }}</p>
<p>Отчет {{ $task->report }}</p>
<p>ID менеджера {{ $task->manager_id }} - {{ $manager->name }} <a href='/get_manager_info/{{ $task->manager_id }}'>карточка менеджера</a></p>
<p>ID клиента {{ $task->client_id }} - {{ $client->name }} <a href='/get_client_info/{{ $task->client_id }}'>карточка клиента</a></p>
<p>Тип задачи {{ $type_tasks[$task->task_type] }}</p>
<p>Статус {{ $statuses[$task->status] }}</p>
 

 	 	
 

</div>
@include('footer')

</body><!-- comment -->
</html>


 
