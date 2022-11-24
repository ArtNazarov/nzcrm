<!DOCTYPE html>
<html>
<head>
<title>Информация по клиенту</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href=".">База клиентов</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       
        <li class="nav-item">
          <a class="nav-link" href="/add_client">Добавить в базу</a>
        </li>
       
      </ul>
      <form class="d-flex" action='/searcher_client' method='post'>
                  {{ csrf_field() }}
        <input class="form-control me-2" type="search" name='q' id='q' placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Поиск</button>
      </form>
    </div>
  </div>
</nav>
    
 
 
 
 		 	 	 	 	 	 	 	 	 	 	 	
  	 	 	 	 	 	


<h3>{{ $client->name }}</h3>
 
<p>ИНН {{ $client->inn  }}</p>
<p>КПП {{ $client->kpp }}</p>
<p>Юр. адрес {{ $client->uadr }}</p>
<p>Факт. адрес {{ $client->fadr }}</p>
<p>Грузополучатель {{ $client->rcv }}</p>
<p>Телефон {{ $client->phone }}</p>
<p>Факс {{ $client->fax }}</p>
<p>Директор {{ $client->director }}</p>
<p>Главный бух {{ $client->glavbuh }}</p>


<p>Email {{ $client->email }}</p>
<p>Сайт {{ $client->site }}</p>
<p>Источник клиента {{ $client->source }}</p>
<p>Статус {{ $client->status }}</p>


<p>Группа клиента {{ $client->client_group }}</p>
<p>Номер договора {{ $client->doc_num }}</p>
<p>Дата договора {{ $client->doc_date }}</p>
<p>Рассчетный счет {{ $client->rs }}</p>

<p>Банк {{ $client->bank}}</p>
<p>Коррсчет {{ $client->ks }}</p>
<p>БИК {{ $client->bik }}</p>

 	 	
 

</div>

</body><!-- comment -->
</html>


 
