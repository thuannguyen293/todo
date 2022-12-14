@extends('todos.layout')

@section('content')
<h1>Edit Todo {{ $todo->title }}</h1>
    <x-alert />
    <form action="{{ route('todos.update', ['id' => $todo->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{ $todo->title }}" class="border boder-gray-300">
        <input type="submit" value="Update" class="border rounded p-2">
    </form>
    <a href="{{ route('todos.index') }}">Back</a>
@endsection