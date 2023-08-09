<!DOCTYPE html>
<html>
<head>
<title>Поиск задачи</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    @include("navigation")
      <form class="d-flex" action='/searcher_task' method='post'>
        {{ csrf_field() }}
        <input value ='{{ $q }}' class="form-control me-2" name='q' id='q' type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Поиск</button>
      </form>
    </div>
  </div>
</nav>
    
 
 
 
 


<h3>Поиск задачи по {{ $q }} в названию</h3>
     
 
 

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
    
    {{ $tasks->links() }}

</div>
@include('footer')

</body><!-- comment -->
</html>