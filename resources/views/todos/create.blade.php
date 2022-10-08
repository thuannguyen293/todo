@extends('todos.layout')

@section('content')
    <x-alert />
    <form action="{{ route('todo.store') }}" method="post" class="py-5">
        @csrf
        <div class="py-1">
            <input type="text" name="title" class="border rounded boder-gray-300" placeholder="Title">
        </div>
        <div class="py-1">
            <textarea name="description" class="border rounded boder-gray-300" placeholder="Description"></textarea>
        </div>

        <div class="py-2">
            @livewire('step')
        </div>

        <div class="py-1">
            <input type="submit" value="Create" class="border rounded p-2">
        </div>
    </form>
    <a href="{{ route('todo.index') }}">Back</a>
@endsection