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
    
  