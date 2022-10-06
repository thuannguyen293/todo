@extends('todos.layout')

@section('content')
<div class="flex justify-center">
    <h1 class="text-2xl">All your Todos</h1>
    <a class="mx-5 py-2 px-1 bg-blue-400 text-white rounded cursor-pointer" href="{{ route('todo.create') }}">Create new</a>
</div>
<x-alert />
<ul class="my-5">
    @foreach ($todos as $todo)
        <li class="flex justify-between p-2">
            <p class="{{ $todo->completed ? 'line-through' : '' }}">{{ $todo->title }}</p>
            <div>
                <a href="{{ route('todo.edit', $todo->id) }}" class="cursor-pointer rounded text-orange-400"><span class="fas fa-edit px-2"></span></a>
                <span 
                    class="fas fa-check px-2 text-green-400 cursor-pointer {{ $todo->completed ? 'text-green-400' : 'text-gray-300' }}"
                        onclick="event.preventDefault(); document.getElementById('form-complete-{{$todo->id}}').submit();">
                </span>
                <form action="{{ route('todo.complete', $todo->id) }}" method="POST" style="display: none" id="form-complete-{{ $todo->id }}">
                    @csrf
                    @method('PUT')
                </form>
                <span 
                    class="fas fa-trash px-2 text-green-400 cursor-pointer text-red-400"
                        onclick="event.preventDefault();
                                if(confirm('Are you really want to delete?')) {
                                    document.getElementById('form-delete-{{$todo->id}}').submit();
                                }
                                ">
                </span>
                <form action="{{ route('todo.destroy', $todo->id) }}" method="POST" style="display: none" id="form-delete-{{ $todo->id }}">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
            
        </li>
    @endforeach
</ul>
@endsection
