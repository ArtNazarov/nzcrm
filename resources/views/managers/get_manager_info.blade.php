<!DOCTYPE html>
<html>
<head>
<title>Список менеджеров</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<?php require_once  $_SERVER['DOCUMENT_ROOT']. '/settings.php';
$statuses = statuses();
$type_tasks = type_tasks();

$client_statuses = client_statuses();
$sources = sources();
$client_groups = client_groups()

?>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    @include("navigation")
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
               {{ $task->price }} </a>
        </div>
       
        <div class='col'>
            <a href='/get_client_info/{{ $task->client_id }}'> {{ $task->name }} </a>
        </div>
         <div class='col'>
           {{ $task->phone }}
         </div>
         <div class='col'>
           {{ $client_statuses[ $task->status ] }}
         </div>
         <div class='col'>
           {{ $sources [ $task->source ] }}
         </div>
         <div class='col'>
           {{ $client_groups [ $task->client_group ] }}
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
        <?php $s = 0; ?>    
        @forelse($tasks as $task)
        
                @if ($task->task_type == $task_key)
                <?php $s += $task->price; ?>
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
        
        {{ $s }}
    </div>    
   
    @endforeach

        
    </div>
    
    <h2>Канбан (по статусам задач)</h2>
    
    <div class="row">
        
    @foreach($statuses as $status_key => $status_value)
    <div class="col" style='border:thin solid lightblue'>
        {{ $status_value }} <br/>
        <?php $s = 0; ?>
        @forelse($tasks as $task)
                  
                @if ($task->status == $status_key)
                <?php $s += $task->price; ?>
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
    
        {{ $s }}    
    </div>    
   
    @endforeach

        
    </div>
    
    
    
 

</div>
    
@include("footer")  

</body><!-- comment -->
</html>


 
