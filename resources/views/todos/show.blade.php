@extends('todos.layout')

@section('content')
    <div class="flex justify-center border-b px-4 pb-4">
        <h1 class="text-2xl pb-4">{{ $todo->title }}</h1>
        <a href="{{ route('todo.index') }}" class="mx-5 py-2 text-gray-400 cursor-pointer"><span class="fas fa-arrow-left"></span></a>
    </div>
    
    <div class="py-1">
        <p>{{ $todo->description }}</p>
    </div>

    @if ($todo->steps->count() > 0)
    <div class="py-4">
        <h3 class="text-lg">Steps for this task</h3>
        @foreach ($todo->steps as $step)
            <p>{{ $step->name }}</p>
        @endforeach
    </div>
    @endif
@endsection