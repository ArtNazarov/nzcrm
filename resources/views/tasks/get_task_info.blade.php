<!DOCTYPE html>
<html>
<head>
<title>Информация по задаче</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href=".">База задач</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       
        <li class="nav-item">
          <a class="nav-link" href="/add_task">Добавить в базу</a>
        </li>
       
      </ul>
      <form class="d-flex" action='/searcher_task' method='post'>
                  {{ csrf_field() }}
        <input class="form-control me-2" type="search" name='q' id='q' placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Поиск</button>
      </form>
    </div>
  </div>
</nav>
    
 
 
 
 		 	 	 	 	 	 	 	 	 	 	 	
  		 	 	 	 	 	 	 	 	 	 	 	 	 	 	


<h3>Номер задачи {{ $task->id  }}</h3>
 
<p>План {{ $task->dplan  }}</p>
<p>Дата постановки {{ $task->dstart }}</p>
<p>Дней на исполнение {{ $task->days }}</p>
<p>Отчет {{ $task->report }}</p>
<p>ID менеджера {{ $task->manager_id }} - {{ $manager->name }} <a href='/get_manager_info/{{ $task->manager_id }}'>карточка менеджера</a></p>
<p>ID клиента {{ $task->client_id }} - {{ $client->name }} <a href='/get_client_info/{{ $task->client_id }}'>карточка клиента</a></p>
<p>Тип задачи {{ $task->task_type }}</p>
<p>Статус {{ $task->status }}</p>
 

 	 	
 

</div>

</body><!-- comment -->
</html>


 
