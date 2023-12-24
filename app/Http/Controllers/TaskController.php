<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\client;
use App\Models\task;
use Redirect;
use Session;
use Illuminate\Support\Facades\DB;
use Crypt;


class TaskController extends Controller
{
    function SaveUser(Request $request)
    {
      
        $obj=new Client;
        $obj->Name=$request->name;
        $obj->Email=$request->email;
        $enc=$request->password;
        $obj->Password=Crypt::encrypt($enc);
        $obj->save();
        return Redirect::back()->with('message','Register succesfully!');

    }

    function LoginCheck(Request $request)
    {

        $cl_obj=client::where('Email',$request->email)->first();
        
        if($cl_obj)
        {
         if(crypt::decrypt($cl_obj->Password)==$request->password)
         {
            $request->session()->put('AuthClient',$request->email);
            return redirect("/dashboard");
            
         }
         else
         {
            return Redirect::back()->with('invalid','Wrong Password For Provided Email Try Again !');  
         }
        }
        else
        {
            return Redirect::back()->with('invalid','Wrong Email Plese Try Again !');  
        }
    }

        function Dash(Request $request)
        {
           
            $value = Session::get('AuthClient');
            $user = client::where('Email', $value)->first();
           
           if ($user) {

            $currentDate = now(); 
            $date = now()->format('Y-m-d');
            $dateBeforeCurrent = $currentDate->subDay()->format('Y-m-d');

            $clientTasks = DB::table('clients')
            ->join('tasks', 'clients.id', '=', 'tasks.User_id')
            ->where('clients.Email',$value)
            ->where('tasks.Date',$date)
            ->select('clients.*', 'tasks.*')
            ->get();


           $results = client::join('tasks', 'clients.id', '=', 'tasks.user_id')
          ->where('tasks.Date', $date)
          ->selectRaw('COUNT(*) as count, clients.Email, tasks.Date')
          ->groupBy('clients.Email', 'tasks.Date')
          ->get();

          $PendingCount = DB::table('clients')
             ->select(DB::raw('COUNT(*) as Total_pending'), 'clients.Email')
             ->join('tasks', 'clients.id', '=', 'tasks.User_id')
             ->where('tasks.Status', 1)
             ->whereDate('tasks.Date', $date)
             ->groupBy('clients.Email')
             ->get();
             
             $PreviousDaycount = DB::table('clients')
             ->select(DB::raw('COUNT(*) as Total_pending'), 'clients.Email','tasks.Date')
             ->join('tasks', 'clients.id', '=', 'tasks.User_id')
             ->where('tasks.Status', 1)
             ->whereDate('tasks.Date', $dateBeforeCurrent)
             ->groupBy('clients.Email')
             ->groupBy('tasks.Date')
             ->get();  


            return view('dashboard', ['clientTasks' => $clientTasks,'userfetch'=>$user,'res'=>$results,'Count'=>$PendingCount,'Prev'=>$PreviousDaycount]);
        }
    }
    function ClientForgot(Request $request)
    {

        $cl=client::where('Email',$request->email)->first();

        if($cl)
        {
         $enc=$request->password;
         $cl->Password=Crypt::encrypt($enc);
         $cl->save();
         return Redirect::back()->with('message','Your password reset succesfully!');
        }
        else
        {
            return Redirect::back()->with('invalid','Email address not found!');
        }      
    }

    function AddTask(Request $request)
    {

        $tk_obj=new task;
        $tk_obj->User_id=$request->userid;
        $tk_obj->Task=$request->taskDescription;
        $tk_obj->Date=$request->taskDate;
        $tk_obj->Status=1;
        $tk_obj->save();
        return Redirect::back()->with('msg','Task Added succesfully!');
        
        
    }
    function update(Request $request,$id)
    {
        $tk_obj=task::find($id);
        if($tk_obj->Status==1)
        {
            $tk_obj->Status=0;
            $tk_obj->save();
            return redirect()->route('ClientDash')->with('success', 'Task status updated!');

        }
        else
        {
            $tk_obj->Status=1;
            $tk_obj->save();
            return redirect()->route('ClientDash')->with('success', 'Task status updated!');

        }

    }
    function logout()
    {
        Session::forget('AuthClient');
        return redirect("/login");
    }
}



