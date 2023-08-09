<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Client; 
use App\Models\Task; 

//include __DIR__ . '/stub_models.php';

// /home/artem/laranotes/app/Http/Controllers/MyController.php

class ClientsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function list_clients(){
    
        $clients = Client::paginate(3);
    
        
        
      

        return view('clients.list_clients', 
                [
                   
                 'clients'=>$clients
                ]);
    }
    
    public function searcher_client(Request $request){
         
    $q = $request->q;
            
         $clients = Client::where('name', 'LIKE', '%'.$q.'%')->paginate(3);
         
    
         
      

       return view('clients.search_client', 
                [
                 'q' => $q,  
                 'clients'=>$clients
                ]);
        
 
    }
    
    
    public function del_client($id){
              
$client = Client::firstWhere('id', $id);
$client->delete();
return redirect('list_clients');
 
}
    
    public function get_client_info($id){
    
        $client = Client::firstWhere('id', $id);
        if ($client){
           
            $tasks = Task::where('manager_id', $id)->get();

            return view('clients.get_client_info', 
                [
                  'client'=>$client,
                  'tasks'=>$tasks
                ]);
        }
        else 
            return view('clients.not_found_clients');
    }
    
    
     public function apply_form(Request $request){
  	 	 	 	 	 	 	 	 	
          	 	 	 	 	
          	 	 	 	
          	 	 	 	       	
$v=$request->validate([
'name' => 'required',
'inn' => 'required',
'kpp' => 'required',
'uadr' => 'required',
'fadr' => 'required',
'rcv' => 'required',
'phone' => 'required',
'fax' => 'required',
'director' => 'required',
'glavbuh' => 'required',
'email' => 'required',
'site' => 'required',
'source' => 'required',
'status' => 'required',
'client_group' => 'required',
'doc_num' => 'required',
'doc_date' => 'required',
'rs' => 'required',
'bank' => 'required',
'ks' => 'required',
'bik' => 'required'  
	
]);
$cl = new Client();



$cl->name = $v['name'];
$cl->inn = $v['inn']; 
$cl->kpp = $v['kpp']; 
$cl->uadr = $v['uadr'];  
$cl->fadr = $v['fadr']; 
$cl->rcv = $v['rcv']; 
$cl->phone = $v['phone'];  
$cl->fax  = $v['fax'];
$cl->director = $v['director']; 
$cl->glavbuh = $v['glavbuh']; 
$cl->email = $v['email'];  
$cl->site = $v['site'];  
$cl->source = $v['source'];  
$cl->status = $v['status']; 
$cl->client_group = $v['client_group'];   
$cl->doc_num = $v['doc_num'];  
$cl->doc_date = $v['doc_date']; 
$cl->rs = $v['rs'];    
$cl->bank= $v['bank']; 
$cl->ks = $v['ks']; 
$cl->bik = $v['bik'];  





$cl->save();
return back()->with('status', 'Добавлено успешно');
 
}
     
     public function show_form(){
         return view('clients.form_client');
     }
     
        public function fedit_client($id){
            
            $client = Client::firstWhere('id', $id);
            return view('clients.update_client', ['client'=>$client]);
     }
     
     public function edit_client(Request $request){

$v=$request->validate([
'name' => 'required',
'inn' => 'required',
'kpp' => 'required',
'uadr' => 'required',
'fadr' => 'required',
'rcv' => 'required',
'phone' => 'required',
'fax' => 'required',
'director' => 'required',
'glavbuh' => 'required',
'email' => 'required',
'site' => 'required',
'source' => 'required',
'status' => 'required',
'client_group' => 'required',
'doc_num' => 'required',
'doc_date' => 'required',
'rs' => 'required',
'bank' => 'required',
'ks' => 'required',
'bik' => 'required'  
	
]);        
         
$id = $request->input('id');
 
$cl = Client::firstWhere('id', $id);
$cl->id = $id;

$cl->name = $v['name'];
$cl->inn = $v['inn']; 
$cl->kpp = $v['kpp']; 
$cl->uadr = $v['uadr'];  
$cl->fadr = $v['fadr']; 
$cl->rcv = $v['rcv']; 
$cl->phone = $v['phone'];  
$cl->fax  = $v['fax'];
$cl->director = $v['director']; 
$cl->glavbuh = $v['glavbuh']; 
$cl->email = $v['email'];  
$cl->site = $v['site'];  
$cl->source = $v['source'];  
$cl->status = $v['status']; 
$cl->client_group = $v['client_group'];   
$cl->doc_num = $v['doc_num'];  
$cl->doc_date = $v['doc_date']; 
$cl->rs = $v['rs'];    
$cl->bank= $v['bank']; 
$cl->ks = $v['ks']; 
$cl->bik = $v['bik'];  


$cl->update();
return back()->with('status', 'Обновлено успешно ' . $cl->name . ' ' . $cl->email );
 
}
    
}

