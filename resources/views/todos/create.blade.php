@extends('todos.layout')

@section('content')
    <x-alert />
    <form action="{{ route('todo.store') }}" method="post">
        @csrf
        <input type="text" name="title" class="border boder-gray-300">
        <input type="submit" value="Create" class="border rounded p-2">
    </form>
    <a href="{{ route('todo.index') }}">Back</a>
@endsection