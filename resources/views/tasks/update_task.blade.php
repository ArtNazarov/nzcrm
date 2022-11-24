<!DOCTYPE html>
<html>
<head>
<title>Обновление задачи</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<?php require_once  $_SERVER['DOCUMENT_ROOT']. '/settings.php';
$statuses = statuses();
?>
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
<h2>Обновление задачи</h2>
</div>
<div class="card-body">
    <form name="task" id="task" method="post" action="{{url('edit_task')}}">   
        {{ csrf_field() }}
        
                <input type='hidden' name='id' value='{{ $task->id }}'>

        
    <div class="form-group">
        <label for="taskInputDplan">Дата по плану</label>
        <input value='{{ $task->dplan }}' type="date" id="dplan" name="dplan" class="@error('dplan') is-invalid @enderror form-control">
            @error('dplan')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
    </div>        
 
 	 	 	 	 		 			 	
<!-- dstart -->	
     <div class="form-group">
                <label for="taskInputDstart">Дата постановки</label>
                <input value='{{ $task->dstart }}' type="date" id="dstart" name="dstart" class="@error('dstart') is-invalid @enderror form-control">
                        @error('dstart')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror  
        </div>    

<!-- days  -->

    <div class="form-group">
                <label for="taskInputDays">Дней на исполнение</label>
                <input value='{{ $task->days }}' type="text" id="days" name="days" class="@error('days') is-invalid @enderror form-control">
                        @error('days')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror  
        </div> 

<!-- description  -->  	 	


    <div class="form-group">
                <label for="taskInputDescription ">Описание задачи</label>
                <input value='{{ $task->description }}' type="text" id="description" name="description" class="@error('description') is-invalid @enderror form-control">
                        @error('description')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror  
        </div> 
<!-- report -->
 <div class="form-group">
                <label for="taskInputReport">Отчет</label>
                <textarea  id="report" name="report" class="@error('report') is-invalid @enderror form-control">{{ $task->report }}</textarea>
                         @error('report')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror  
        </div> 

 
<!-- manager_id  -->  	 	
<div class="form-group">
                <label for="taskInputManagerId">Менеджер</label>
                
                <select  id="manager_id" name="manager_id" class="@error('manager_id') is-invalid @enderror form-control">
                    @foreach ($managers as $manager)
                    <option <?=$task->manager_id == $manager->id ? ' selected="selected"' : '';?>  value='{{ $manager->id }}'>{{ $manager->name }} </option>
                    @endforeach
                </select>
                
                        @error('manager_id')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror  
        </div> 

<!-- client_id  -->  	 	
<div class="form-group">
                <label for="taskInputClientId">Клиент</label>
                <select  id="client_id" name="client_id" class="@error('client_id') is-invalid @enderror form-control">
                    @foreach ($clients as $client)
                    <option <?=$task->client_id == $client->id ? ' selected="selected"' : '';?>  value='{{ $client->id }}'>{{ $client->name }} </option>
                    @endforeach
                </select> 
                        @error('client_id')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror  
        </div>
 
<!-- task_type  -->
<div class="form-group">
                <label for="taskInputTaskType">Тип задачи</label>
                <input value='{{ $task->task_type }}' type="text" id="task_type" name="task_type" class="@error('task_type') is-invalid @enderror form-control">
                        @error('task_type')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror  
        </div>


 
<!-- status -->
<div class="form-group">
                <label for="taskInputStatus">Статус задачи</label>
                <select  id="status" name="status" class="@error('status') is-invalid @enderror form-control">
                    @foreach ($statuses as $status_key => $status_value)
                    <option <?=$task->status == $status_key ? ' selected="selected"' : '';?> value='{{ $status_key }}'>{{ $status_value }} </option>
                    @endforeach
                </select> 
                         @error('status')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror  
        </div>

 
 
                                        

   <button type="submit" class="btn btn-primary">Обновить в системе задачу</button>
    </form>
</div>
</div>
</div>  
</body>
</html>