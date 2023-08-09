<div class="container-fluid">
    <a class="navbar-brand" href="/">NzCRM</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
         <li class="nav-item">
          <a class="nav-link disabled" href="/control_panel" tabindex="-1">Панель управления</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Менеджеры
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/list_managers">Список менеджеров</a></li>
            <li><a class="dropdown-item" href="/add_manager">Добавить менеджера</a></li>
          </ul>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Клиенты
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/list_clients">Список клиентов</a></li>
            <li><a class="dropdown-item" href="/add_client">Добавить клиента</a></li>
          </ul>
        </li><!-- comment -->
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Задачи
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/list_tasks">Список задач</a></li>
            <li><a class="dropdown-item" href="/add_task">Добавить задачу</a></li>
          </ul>
        </li>
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Пользователь
          </a>
         <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Вход</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register-user') }}">Регистрация</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('signout') }}">Выход</a>
                    </li>
                    @endguest
                </ul>
         </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Техподдержка
          </a>      
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="https://github.com/artnazarov/nzcrm">NzCRM оn Github</a></li>
            <li><a class="dropdown-item" href="mailto:artem@nazarow.ru">Email автору</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="http://nazarow.ru/support/">Донат</a></li>
          </ul>
        </li>
        
       
      </ul>