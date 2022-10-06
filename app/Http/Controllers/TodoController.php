<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    //
    public function index()
    {
        $todos = Todo::orderBy('completed', 'desc')->get();
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(TodoCreateRequest $request)
    {
        Todo::create($request->all());

        return redirect()->back()->with('message', 'Todo created successfully');
    }

    public function edit($id)
    {
        $todo = Todo::find($id);
        return view('todos.edit', compact('todo'));
    }

    public function update(TodoCreateRequest $request, $id)
    {
        $todo = Todo::find($id);
        $todo->update([
            'title' => $request->title
        ]);

        return redirect()->back()->with('message', 'Todo updated successfully');
    }

    public function complete(Todo $todo)
    {
        $todo->update(['completed' => !$todo->completed]);
        return redirect()->back()->with('message', 'Task marked!');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->back()->with('message', 'Task deleted!');
    }
}
