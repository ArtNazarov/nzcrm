<!DOCTYPE html>
<html>
<head>
<title>Список задач</title>
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
       
      </ul>00
      <form class="d-flex" action='/searcher_task' method='post'>
                  {{ csrf_field() }}
        <input class="form-control me-2" type="search" name='q' id='q' placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Поиск</button>
      </form>
    </div>
  </div>
</nav>
    
 
 
 
 


<h3>Список задач</h3>
 

    @forelse($tasks as $task)
    <div class="row">
    
        <div class='col'>
            <a href="/get_task_info/{{ $task->id }}">   {{ $task->description }} </a>
        </div>
        <div class='col'>
             {{ $task->price }} </a>
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
    
    {{ $tasks->links() }}

</div>

</body><!-- comment -->
</html>