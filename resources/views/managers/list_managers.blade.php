<!DOCTYPE html>
<html>
<head>
<title>Список клиентов</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
    
 
 
 
 


<h3>Список менеджеров</h3>
 

    @forelse($managers as $manager)
    <div class="row">
    
        <div class='col'>
            <a href="/get_manager_info/{{ $manager->id }}">   {{ $manager->name }} </a>
        </div>
        <div class='col'>
            <a href='/del_manager/{{ $manager->id }}'>Удалить из базы</a>
        </div>
        <div class='col'>
            <a href='/fedit_manager/{{ $manager->id }}'>Изменить данные</a>
        </div>
        
    </div>    
    @empty 
        Нет менеджеров в базе
    @endforelse
    
    {{ $managers->links() }}

</div>
@include('footer')

</body><!-- comment -->
</html>