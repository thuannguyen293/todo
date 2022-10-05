@extends('todos.layout')

@section('content')
    <x-alert />
    <form action="{{ route('todos.create') }}" method="post">
        @csrf
        <input type="text" name="title" class="border boder-gray-300">
        <input type="submit" value="Create" class="border rounded p-2">
    </form>
    <a href="{{ route('todos.index') }}">Back</a>
@endsection