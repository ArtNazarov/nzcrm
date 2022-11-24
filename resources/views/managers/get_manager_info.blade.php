<!DOCTYPE html>
<html>
<head>
<title>Список менеджеров</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
 
<p>Адрес {{ $manager->adr }}</p>
<p>Паспорт {{ $manager->pass }}</p>
<p>Дата рождения {{ $manager->birthday }}</p>
<p>Дата найма {{ $manager->wday }}</p>
<p>Телефон {{ $manager->phone }}</p>
<p>E-mail {{ $manager->email }}</p>
<p>Инн {{ $manager->inn }}</p>
<p>Процент {{ $manager->percent }}</p>
<p>Группа менеджера {{ $manager->manager_group }}</p>
 

</div>

</body><!-- comment -->
</html>


 
