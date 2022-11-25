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
      <form class="d-flex" action='/searcher_client' method='post'>
                  {{ csrf_field() }}
        <input class="form-control me-2" type="search" name='q' id='q' placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Поиск</button>
      </form>
    </div>
  </div>
</nav>
    
 
 
 
 


<h3>Список клиентов</h3>
 

    @forelse($clients as $client)
    <div class="row">
    
        <div class='col'>
            <a href="/get_client_info/{{ $client->id }}">   {{ $client->name }} </a>
        </div>
        <div class='col'>
            <a href='/del_client/{{ $client->id }}'>Удалить из базы</a>
        </div>
        <div class='col'>
            <a href='/fedit_client/{{ $client->id }}'>Изменить данные</a>
        </div>
        
    </div>    
    @empty 
        Нет клиентов в базе
    @endforelse
    
    {{ $clients->links() }}

</div>
@include('footer')

</body><!-- comment -->
</html>