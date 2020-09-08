<?php

namespace App\Http\Controllers;

use App\todo;
use Auth;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        $todos = todo::where('user_id',$id)->get();
        return view('fontend.index',compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fontend.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(request()->all());
        // dd(auth()->user()->id);
        $todo = new todo();
        $todo->title = $request->title;
        //$todo->task = $request->todo;
        $task = implode(',',$request->todo);
        $todo->user_id = auth()->user()->id;
        $todo->task = $task;
        $todo->save();
        return redirect()->route('todo.index')->with('message','Successfully Done!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(todo $todo)
    {
        //dd($todo);
        //dd($todo->task);
        $task = explode(',',$todo->task);
        $data['task'] = $task;
        $data['todos'] = $todo;
        return view('fontend.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(todo $todo)
    {
        $task = explode(',',$todo->task);
        $data['task'] = $task;
        $data['todos'] = $todo;
        return view('fontend.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,todo $todo)
    {
        // $todo = todo::find($id);
        $todo->title = $request->title;
        //$todo->task = $request->todo;
        $task = implode(',',$request->todo);
        $todo->user_id = auth()->user()->id;
        $todo->task = $task;
        $todo->save();
        return redirect()->route('todo.index')->with('message','Successfully Done!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(todo $todo)
    {
        $todo->delete();
        return redirect()->back();
    }
    public function complete($id)
    {
        $todo = todo::find($id);
        $todo->status = '1';
        $todo->save();
        return redirect()->route('todo.index')->with('message','Task Complete!');
    }
    public function uncomplete($id)
    {
        $todo = todo::find($id);
        $todo->status = '0';
        $todo->save();
        return redirect()->route('todo.index')->with('message','Task UnComplete!');
    }
}
