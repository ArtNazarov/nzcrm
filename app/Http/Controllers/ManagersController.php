<?php


namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Manager; 
use App\Models\Task;
use App\Models\Client;
use App\Other\WidgetCalendar;

use Illuminate\Support\Facades\Gate;

  require_once  $_SERVER['DOCUMENT_ROOT']. '/settings.php';

 

//include __DIR__ . '/stub_models.php';

// /home/artem/laranotes/app/Http/Controllers/MyController.php

class ManagersController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function list_managers(){
    
        $managers = Manager::paginate(3);
    
        
        
      

        return view('managers.list_managers', 
                [
                   
                 'managers'=>$managers
                ]);
    }
    
    public function search_manager(Request $request){
         
    $q = $request->q;
            
         $managers = Manager::where('name', 'LIKE', '%'.$q.'%')->paginate(3);
         
    
        
        
      

        return view('managers.search_manager', 
                [
                 'q' => $q,  
                 'managers'=>$managers
                ]);
         
 
    }
    
    
    public function del_manager($id){
        if (! Gate::allows('req_admin')) {
            abort(403);
        };        
$manager = Manager::firstWhere('id', $id);
$manager->delete();
return redirect('list_managers');
 
}
    
    public function get_manager_info($id){
    
        $manager = Manager::firstWhere('id', $id);;
        if ($manager){
            $tasks = Task::where('manager_id', $id)->join('clients', 'clients.id', '=', 'tasks.client_id')->get();
            return view('managers.get_manager_info', 
                [
                  'manager'=>$manager,
                  'tasks'=>$tasks
                ]);
        }
        else 
            return view('managers.not_found_managers');
    }
    
    
     public function apply_form(Request $request){
$v=$request->validate([
'name' => 'required',
'email' => 'required',
'adr' => 'required',
'pass' => 'required',
'phone' => 'required',
'birthday' => 'required',
'inn' => 'required',
'wday' => 'required',
'percent' =>'required',
'email' => 'required',
'manager_group' => 'required' 	
]);
$man = new Manager();

$man->name = $v['name'];
$man->email = $v['email'];
$man->adr = $v['adr'];
$man->pass=$v['pass'];
$man->phone=$v['phone'];
$man->birthday=$v['birthday'];
$man->inn =$v['inn'];
$man->wday = $v['wday'];
$man->percent = $v['percent'];
$man->email = $v['email'];
$man->manager_group = $v['manager_group'];





$man->save();
return back()->with('status', 'Добавлено успешно');
 
}
     
     public function show_form(){
         return view('managers.form_manager');
     }
     
        public function fedit_manager($id){
            
            $manager = Manager::firstWhere('id', $id);
            return view('managers.update_manager', ['manager'=>$manager]);
     }
     
     public function edit_manager(Request $request){

$v=$request->validate([
'name' => 'required',
'email' => 'required',
'adr' => 'required',
'pass' => 'required',
'phone' => 'required',
'birthday' => 'required',
'inn' => 'required',
'wday' => 'required',
'percent' =>'required',
'email' => 'required',
'manager_group' => 'required' 	
]);         
         
$id = $request->input('id');
 
$man = Manager::firstWhere('id', $id);
$man->id = $id;

$man->name = $v['name'];
$man->email = $v['email'];
$man->adr = $v['adr'];
$man->pass=$v['pass'];
$man->phone=$v['phone'];
$man->birthday=$v['birthday'];
$man->inn =$v['inn'];
$man->wday = $v['wday'];
$man->percent = $v['percent'];
$man->email = $v['email'];
$man->manager_group = $v['manager_group'];


$man->update();
return back()->with('status', 'Обновлено успешно ' . $man->name . ' ' . $man->email );
 
}


function control_panel(){
    
    $year = '2022';
    $records = Task::all();
    $date_field = 'dstart';
    $cap_field = 'description';
    $link = '/get_task_info';
    
    $statuses = statuses();
    $type_tasks = type_tasks();
    
    $voronka_by_statuses = [];
    
    foreach ($statuses as $status_key => $status_value){
        $voronka_by_statuses[ $status_key ] = Task::where('status', '=', $status_key)->sum('price');
    };
    
    
    $voronka_by_task_types = [];
    
    
    
    foreach ($type_tasks as $type_key => $type_value){
        $voronka_by_task_types[ $type_key ] = Task::where('task_type', '=', $type_key)->sum('price');
    };
    
    $client_statuses = client_statuses();
    
    $voronka_by_client_statuses = [];
 
    var_dump($client_statuses);
    foreach ($client_statuses as $cl_key => $cl_value){
        $voronka_by_client_statuses [ $cl_key ] = Client::where('clients.status', '=', $cl_key)->join('tasks', 'tasks.client_id', '=', 'clients.id')->sum('price');
    };
    
    $sources = sources();
    
    $voronka_by_sources = [];
 
    /* 
Select sum(tasks.price) from clients
left join tasks on clients.id = tasks.client_id
WHERE clients.source = 'ads'
     */
    foreach ($sources  as $s_key => $s_value){
        $voronka_by_sources[ $s_key ] = Client::where('clients.source', '=', $s_key)->join('tasks', 'tasks.client_id', '=', 'clients.id')->sum('price');
    };
    
    $client_groups = client_groups();
    
    
    $voronka_by_client_groups = [];
 /*
  Select sum(tasks.price) from clients
left join tasks on clients.id = tasks.client_id
WHERE clients.client_group = 'retail'
  */
    foreach ($client_groups as $cg_key => $cg_value){
        $voronka_by_client_groups[ $cg_key ] = Client::where('clients.client_group', '=', $cg_key)->join('tasks', 'tasks.client_id', '=', 'clients.id')->sum('price');
    };
     
            
            
    
    

    
    $WC = new WidgetCalendar($year, $records, $date_field, $cap_field, $link);
    $widgetCalendar = $WC->widget();
    return view('welcome',
            ['widgetCalendar'=>$widgetCalendar,
             'voronka_by_statuses'=>$voronka_by_statuses,
             'voronka_by_task_types'=>$voronka_by_task_types,
             'voronka_by_sources' => $voronka_by_sources,
             'voronka_by_client_groups'=>$voronka_by_client_groups,
             'voronka_by_client_statuses'=>$voronka_by_client_statuses,
                
             'statuses' => $statuses,
             'type_tasks' => $type_tasks,
             'client_statuses' => $client_statuses,
             'client_groups' => $client_groups,
             'sources' => $sources
            ]);
}

function widget_calendar($year){
    
    $records = Task::all();
    $date_field = 'dstart';
    $cap_field = 'description';
    $link = '/get_task_info';
    $WC = new WidgetCalendar($year, $records, $date_field, $cap_field, $link);
    return $widgetCalendar = $WC->widget();
    
    
}
}

