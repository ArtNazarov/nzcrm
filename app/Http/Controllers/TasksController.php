<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Task; 
use App\Models\Client; 
use App\Models\Manager; 
//include __DIR__ . '/stub_models.php';

// /home/artem/laranotes/app/Http/Controllers/MyController.php

class TasksController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function list_tasks(){
    
        $tasks = Task::paginate(3);
    
        
        
      

        return view('tasks.list_tasks', 
                [
                   
                 'tasks'=>$tasks
                ]);
    }
    
    public function searcher_task(Request $request){
         
    $q = $request->q;
            
         $tasks = Task::where('description', 'LIKE', '%'.$q.'%')->paginate(3);
         
    
         
      

       return view('tasks.search_task', 
                [
                 'q' => $q,  
                 'tasks'=>$tasks
                ]);
        
 
    }
    
    
    public function del_task($id){
        
$task = Task::firstWhere('id', $id);
$task->delete();
return redirect('list_tasks');
 
}
    
    public function get_task_info($id){
    
        $task = Task::firstWhere('id', $id);
        $manager = Manager::firstWhere('id', $task->manager_id);
        $client = Client::firstWhere('id', $task->client_id);
        
        if ($task){
            return view('tasks.get_task_info', 
                [
                  'task'=>$task,
                  'manager'=>$manager,
                  'client'=>$client
                ]);
        }
        else 
            return view('tasks.not_found_tasks');
    }
    
    
     public function apply_form(Request $request){
  	 	 	 	 	 	 	 	 	
  		 	 	 	 	 			 	         	 	 	 	 	
          	 	 	 	
          	 	 	 	       	
$v=$request->validate([
'dplan' => 'required',
'dstart' => 'required',
'days' => 'required',
'description' => 'required',
'report' => 'required',
'manager_id' => 'required',
'client_id' => 'required',
'task_type' => 'required',
'status' => 'required',
        
]);
$tk = new Task();



$tk->dplan = $v['dplan'];
$tk->dstart = $v['dstart']; 
$tk->days = $v['days']; 
$tk->description = $v['description'];  
$tk->report = $v['report']; 
$tk->manager_id = $v['manager_id']; 
$tk->client_id = $v['client_id'];  
$tk->task_type  = $v['task_type'];
$tk->status = $v['status']; 
  





$tk->save();
return back()->with('status', 'Добавлено успешно');
 
}
     
     public function show_form(){
         $clients = Client::all();
         $managers = Manager::all();
         
         return view('tasks.form_task',
                 ['clients'=> $clients,
                  'managers'=> $managers]
                 );
     }
     
        public function fedit_task($id){
            $clients = Client::all();
            $managers = Manager::all();
                
            $task = Task::firstWhere('id', $id);
            return view('tasks.update_task', ['task'=>$task,
                'clients' => $clients,
                'managers' => $managers
                ]);
     }
     
     public function edit_task(Request $request){

$v=$request->validate([
'dplan' => 'required',
'dstart' => 'required',
'days' => 'required',
'description' => 'required',
'report' => 'required',
'manager_id' => 'required',
'client_id' => 'required',
'task_type' => 'required',
'status' => 'required' 
]);        
         
$id = $request->input('id');
 
$tk = Task::firstWhere('id', $id);
$tk->id = $id;


$tk->dplan = $v['dplan'];
$tk->dstart = $v['dstart']; 
$tk->days = $v['days']; 
$tk->description = $v['description'];  
$tk->report = $v['report']; 
$tk->manager_id = $v['manager_id']; 
$tk->client_id = $v['client_id'];  
$tk->task_type  = $v['task_type'];
$tk->status = $v['status'];


$tk->update();
return back()->with('status', 'Обновлено успешно ' . $tk->name . ' ' . $tk->email );
 
}
    
}

