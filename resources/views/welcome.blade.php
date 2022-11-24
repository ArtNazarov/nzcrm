<!DOCTYPE html>
<html>
<head>
<title>NZCRM</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/">NzCrm</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       
        <li class="nav-item">
          <a class="nav-link" href="/list_clients">База клиентов</a>
        </li>
        
         
        <li class="nav-item">
          <a class="nav-link" href="/list_managers">База менеджеров</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="/list_tasks">База задач</a>
        </li>
       
      </ul>
        
     </div>
  </div>
</nav>
    
 
 
 
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
<script src="{{ asset('/js/widgetcalendar.js') }}"></script>
</body> 
</html>
    
  