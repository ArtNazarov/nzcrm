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
    
<!-- Секция контент -->
@section('content')
@show
<!-- Конец секции -->

@include('footer')  
<script src="{{ asset('/js/widgetcalendar.js') }}"></script>
</body> 
</html>
    
  