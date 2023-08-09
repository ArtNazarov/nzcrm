<!DOCTYPE html>
<html>
<head>
<title>Поиск менеджера</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      @include("navigation")
      <form class="d-flex" action='/search_manager' method='post'>
        {{ csrf_field() }}
        <input value ='{{ $q }}' class="form-control me-2" name='q' id='q' type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Поиск</button>
      </form>
    </div>
  </div>
</nav>
    
 
 
 
 


<h3>Поиск менеджера по {{ $q }} в имени</h3>
     
 
 

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
        Нет менеджера в базе
    @endforelse
    
    {{ $managers->links() }}

</div>
@include('footer')

</body><!-- comment -->
</html>