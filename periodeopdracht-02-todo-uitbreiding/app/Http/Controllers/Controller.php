<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function index()
    {
        return view('pages.home');
    }
    
    public function dashboard()
    {
        return view('pages.dashboard');
    }
    
    public function todo()
    {
        $notDoneTodos = \Auth::user()->todos()->latest()->where('done',0)->get();
        
        $doneTodos = \Auth::user()->todos()->where('done',1)->get();
        
        return view('pages.todo')->with('notDoneTodos',$notDoneTodos)->with('doneTodos', $doneTodos);
    }
    
    public function voegtoe()
    {
        return view('pages.voegtoe');
    }
    
    public function store(\App\Http\Requests\CreateTodoRequest $request)
    {
        $input = $request->all();
        
        $input['done'] = false;
        
        $todo = new \App\Todo($input);
        
        \Auth::user()->todos()->save($todo);
        return redirect('/todo');
    }
    
    public function changeToDone($id)
    {
        $todo = \App\Todo::findOrFail($id);
        $todo['done'] = true;
        $todo->save();
        return redirect('/todo');
    }
    
    public function changeToNotDone($id)
    {
        $todo = \App\Todo::findOrFail($id);
        $todo['done'] = false;
        $todo->save();
        return redirect('/todo');
    }
    
    public function delete($id)
    {
        $todo = \App\Todo::findOrFail($id);
        $todo['done'] = false;
        $todo->delete();
        return redirect('/todo');
    }
    
}
