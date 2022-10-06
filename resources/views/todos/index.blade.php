@extends('todos.layout')

@section('content')
<div class="flex justify-center">
    <h1 class="text-2xl">All your Todos</h1>
    <a class="mx-5 py-2 px-1 bg-blue-400 text-white rounded cursor-pointer" href="{{ route('todos.create') }}">Create new</a>
</div>

<ul class="my-5">
    @foreach ($todos as $todo)
        <li class="flex justify-between p-2">
            <p class="{{ $todo->completed ? 'line-through' : '' }}">{{ $todo->title }}</p>
            <div>
                <a href="{{ route('todos.edit', ['id' => $todo->id]) }}" class="cursor-pointer rounded text-orange-400"><span class="fas fa-edit px-2"></span></a>
                <span class="fas fa-check px-2 text-green-400 {{ $todo->completed ? 'text-green-400' : 'text-gray-300' }}"></span>
            </div>
            
        </li>
    @endforeach
</ul>
@endsection
