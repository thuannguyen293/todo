@extends('todos.layout')

@section('content')
<h1>Edit Todo {{ $todo->title }}</h1>
    <x-alert />
    <form action="{{ route('todo.update', $todo->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="py-1">
            <input type="text" name="title" class="border rounded boder-gray-300" placeholder="Title" value="{{ $todo->title }}">
        </div>
        <div class="py-1">
            <textarea name="description" class="border rounded boder-gray-300" placeholder="Description">{{ $todo->description }}</textarea>
        </div>
        <div class="py-2">
            @livewire('edit-step', ['steps' => $todo->steps])
        </div>
        <div class="py-1">
            <input type="submit" value="Update" class="border rounded p-2">
        </div>
        
    </form>
    <a href="{{ route('todo.index') }}">Back</a>
@endsection