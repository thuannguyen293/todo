<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Models\Step;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    //
    public function index()
    {
        $todos = auth()->user()->todos()->orderBy('completed')->get();
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(TodoCreateRequest $request)
    {
        $todo = auth()->user()->todos()->create($request->all());
        if ($request->step) {
            foreach ($request->step as $step) {
                $todo->steps()->create(['name' => $step]);
            }
        }
        return redirect(route('todo.index'))->with('message', 'Todo created successfully');
    }

    public function edit($id)
    {
        $todo = Todo::find($id);
        return view('todos.edit', compact('todo'));
    }

    public function update(TodoCreateRequest $request, Todo $todo)
    {
        $todo->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        if ($request->stepName) {
            foreach ($request->stepName as $k => $v) {
                $id = $request->stepId[$k];
                if (!$id) {
                    $todo->steps()->create(['name' => $v]);
                }else{
                    $step = Step::find($id);
                    $step->update(['name' => $v]);
                }
                
            }
        }

        return redirect()->back()->with('message', 'Todo updated successfully');
    }

    public function complete(Todo $todo)
    {
        $todo->update(['completed' => !$todo->completed]);
        return redirect()->back()->with('message', 'Task marked!');
    }

    public function destroy(Todo $todo)
    {
        $todo->steps->each->delete();
        $todo->delete();
        return redirect()->back()->with('message', 'Task deleted!');
    }

    public function show(Todo $todo)
    {
        return view('todos.show', compact('todo'));
    }
}
