<!DOCTYPE html>
<html>
<head>
<title>Список менеджеров</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<?php require_once  $_SERVER['DOCUMENT_ROOT']. '/settings.php';
$statuses = statuses();
$type_tasks = type_tasks();
?>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href=".">База менеджеров</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       
        <li class="nav-item">
          <a class="nav-link" href="/add_manager">Добавить в базу</a>
        </li>
       
      </ul>
      <form class="d-flex" action='/search_manager' method='post'>
                  {{ csrf_field() }}
        <input class="form-control me-2" type="search" name='q' id='q' placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Поиск</button>
      </form>
    </div>
  </div>
</nav>
    
 
 
 
 


<h3>{{ $manager->name }}</h3>

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Данные</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Дополнительно</button>
  </li>
  
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        
<p>Адрес {{ $manager->adr }}</p>
<p>Паспорт {{ $manager->pass }}</p>
<p>Дата рождения {{ $manager->birthday }}</p>
<p>Телефон {{ $manager->phone }}</p>
<p>E-mail {{ $manager->email }}</p>
        
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        
        <p>Дата найма {{ $manager->wday }}</p>
        <p>Инн {{ $manager->inn }}</p>
        <p>Процент {{ $manager->percent }}</p>
        <p>Группа менеджера {{ $manager->manager_group }}</p>
        
    </div>
 </div>

 



<h2>Задачи менеджера</h2>

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
    
    <h2>Канбан (по типам задач)</h2>
    
    <div class="row">
        
    @foreach($type_tasks as $task_key => $type_status)
    <div class="col" style='border:thin solid lightblue'>
        {{ $type_status }} <br/>
        
        @forelse($tasks as $task)
        
                @if ($task->task_type == $task_key)
        <div class="row" style='border:thin dashed lime'>
    
                    <div class='col'>
            <a href="/get_task_info/{{ $task->id }}">   {{ $task->description }} </a>
                    </div>
                    <div class='col'>
            <a href='/del_task/{{ $task->id }}'>Удалить</a>
                    </div>
                    <div class='col'>
            <a href='/fedit_task/{{ $task->id }}'>Изменить</a>
                    </div>
        </div>
                @endif
        
        @empty
            Нет задач в данной группе
        @endforelse
        
    </div>    
   
    @endforeach

        
    </div>
    
    <h2>Канбан (по статусам задач)</h2>
    
    <div class="row">
        
    @foreach($statuses as $status_key => $status_value)
    <div class="col" style='border:thin solid lightblue'>
        {{ $status_value }} <br/>
        
        @forelse($tasks as $task)
        
                @if ($task->status == $status_key)
        <div class="row" style='border:thin dashed lime'>
    
                    <div class='col'>
            <a href="/get_task_info/{{ $task->id }}">   {{ $task->description }} </a>
                    </div>
                    <div class='col'>
            <a href='/del_task/{{ $task->id }}'>Удалить</a>
                    </div>
                    <div class='col'>
            <a href='/fedit_task/{{ $task->id }}'>Изменить</a>
                    </div>
        </div>
                @endif
        
        @empty
            Нет задач в данной группе
        @endforelse
        
    </div>    
   
    @endforeach

        
    </div>
    
    
    
 

</div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


</body><!-- comment -->
</html>


 
