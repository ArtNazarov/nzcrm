<!DOCTYPE html>
<html>
<head>
<title>NZCRM</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
    
 
 
<div class='row'>
<h1>Панель управления</h1>
    
    <h2><a href="/list_managers"> Менеджеры </a></h2>
    
    <a href="/add_manager"> Добавить менеджера </a>
    
    <h2><a href="/list_clients"> Клиенты </a></h2>
    
    <a href="/add_client"> Добавить клиента </a> 

    <h2><a href="/list_tasks"> Задачи </a></h2>
    
    <a href="/add_task"> Поставить задачу на контроль </a> 
    
    <h3>Воронка по статусам общая</h3>
    @foreach ($voronka_by_statuses as $key => $value)
    <div class='row'>
       {{ $statuses[$key] }} -  {{ $voronka_by_statuses[$key] }}
    </div>
    @endforeach
    
    <h3>Воронка по типам задач общая</h3>
    @foreach ($voronka_by_task_types as $key => $value)
        <div class='row'>
           {{ $type_tasks[$key] }} -  {{ $voronka_by_task_types[$key] }}
        </div>
    @endforeach
    
    <h3>Воронка по источникам клиентов</h3>
    @foreach ($voronka_by_sources as $key => $value)
        <div class='row'>
           {{ $sources[$key] }} -  {{ $voronka_by_sources[$key] }}
        </div>
    @endforeach
    
    <h3>Воронка по статусам клиентов </h3>
    @foreach ($voronka_by_client_statuses as $key => $value)
        <div class='row'>
           {{ $client_statuses[$key] }} -  {{ $voronka_by_client_statuses[$key] }}
        </div>
    @endforeach
    
    <h3>Воронка по группам клиентов </h3>
    @foreach ($voronka_by_client_groups as $key => $value)
        <div class='row'>
           {{ $client_groups[$key] }} -  {{ $voronka_by_client_groups[$key] }}
        </div>
    @endforeach
    
    <h3>Календарь</h3>
    
     <select id="year" name='year'>
        <option value='2022'>2022</option> 
        <option value='2023'>2023</option> 
        <option value='2024'>2024</option>
    </select>
    
    <div id='calendar_widget'>
    
        {!! $widgetCalendar !!}
    
    </div>
   
 

</div>
  </div> 
@include('footer')  
<script src="{{ asset('/js/widgetcalendar.js') }}"></script>
</body> 
</html>
    
  