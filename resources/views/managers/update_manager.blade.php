<!DOCTYPE html>
<html>
<head>
<title>Обновление данных на менеджера</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
@if(session('status'))
<div class="alert alert-success">
{{ session('status') }}
</div>
@endif
<div class="card">
<div class="card-header text-center font-weight-bold">
<h2>Обновление данных на менеджера</h2>
</div>
<div class="card-body">
    <form name="manager" id="manager" method="post" action="{{url('edit_manager')}}">   
        {{ csrf_field() }}
    <div class="form-group">
        <input type='hidden' name='id' value='{{ $manager->id }}'>
        
        
         <div class="form-group">
        <label for="exampleInputName">Имя</label>
        <input value='{{ $manager->name }}' type="text" id="name" name="name" class="@error('name') is-invalid @enderror form-control">
            @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
    </div>        
 

<!-- adr -->
     <div class="form-group">
                <label for="exampleInputAdr">Адрес</label>
                <input value='{{ $manager->adr }}' type="text" id="adr" name="adr" class="@error('adr') is-invalid @enderror form-control">
                        @error('adr')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror  
        </div>    

<!-- pass -->

    <div class="form-group">
                <label for="exampleInputPass">Пасспорт</label>
                <input value='{{ $manager->pass }}' type="text" id="pass" name="pass" class="@error('pass') is-invalid @enderror form-control">
                        @error('pass')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror  
        </div> 
<!-- phone -->


    <div class="form-group">
                <label for="exampleInputPhone">Телефон</label>
                <input value='{{ $manager->phone }}' type="text" id="phone" name="phone" class="@error('phone') is-invalid @enderror form-control">
                        @error('phone')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror  
        </div> 
<!-- birthday -->
 <div class="form-group">
                <label for="exampleInputBirthday">День рождения</label>
                <input value='{{ $manager->birthday }}' type="text" id="birthday" name="birthday" class="@error('birthday') is-invalid @enderror form-control">
                        @error('birthday')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror  
        </div> 

<!-- inn -->
<div class="form-group">
                <label for="exampleInputInn">Инн</label>
                <input value='{{ $manager->inn }}' type="text" id="inn" name="inn" class="@error('inn') is-invalid @enderror form-control">
                        @error('inn')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror  
        </div> 
 

<div class="form-group">
                <label for="exampleInputWday">Дата найма</label>
                <input value='{{ $manager->wday }}' type="text" id="wday" name="wday" class="@error('wday') is-invalid @enderror form-control">
                        @error('wday')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror  
        </div>


 

<div class="form-group">
                <label for="exampleInputPercent">Процент</label>
                <input value='{{ $manager->percent }}' type="text" id="percent" name="percent" class="@error('percent') is-invalid @enderror form-control">
                        @error('percent')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror  
        </div>

 

<div class="form-group">
                <label for="exampleInputEmail">Email</label>
                <input value='{{ $manager->email }}' type="text" id="email" name="email" class="@error('email') is-invalid @enderror form-control">
                        @error('email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror  
        </div>


 


    <div class="form-group">
                <label for="exampleInputManagerGroup">Номер группы</label>
                <input value='{{ $manager->manager_group }}' type="text" id="manager_group" name="manager_group" class="@error('manager_group') is-invalid @enderror form-control">
                        @error('manager_group')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror  
        </div>
         
        
   <button type="submit" class="btn btn-primary">Обновить сведения в базе</button>
    </form>
</div>
</div>
</div>  
</body>
</html>