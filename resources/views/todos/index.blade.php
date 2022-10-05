@extends('todos.layout')

@section('content')
<div class="flex justify-center">
    <h1 class="text-2xl">All your Todos</h1>
    <a class="mx-5 py-2 px-1 bg-blue-400 text-white rounded cursor-pointer" href="{{ route('todos.create') }}">Create new</a>
</div>

<ul class="my-5">
    @foreach ($todos as $todo)
        <li>
            <a href="{{ route('todos.edit', ['id' => $todo->id]) }}">{{ $todo->title }}</a>
        </li>
    @endforeach
</ul>
@endsection
