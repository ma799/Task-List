@extends('layouts.app')
@section('title', isset($task) ? 'Edit Task' : 'Create Tasks')
@section('content')

<form method="POST" action="
@isset($task)
    {{ route('tasks.update', $task) }}
@else
{{ route('tasks.store') }}
@endisset
">
    @csrf
    @isset($task)
        @method('PUT')
    @endisset
    <div class="form-group">
        <label for="title">Task Title</label>
        <input value="{{$task->title ?? old('title') }}" type="text" class="form-control"
         id="description" name="title" placeholder="Enter task name">
        @error('title')
            <p class="form-error">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">Task Description</label>
        <textarea class="form-control" id="description" name="description" rows="3"
        placeholder="Enter task description">{{ $task->description ?? old('description') }}</textarea>
          @error('description')
            <p class="form-error">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="long_description">Task Description</label>
        <textarea class="form-control" id="long_description" name="long_description" rows="3"
         placeholder="Enter task description">{{ $task->long_description ?? old('long_description') }}</textarea>
          @error('long_description')
            <p class="form-error">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="long_description">Completed</label>
        <input type="checkbox" name="completed" >
        </div>

    <button type="submit" class="btn btn-primary">
        @isset($task)
            Update Task
        @else
            Create Task
        @endisset
    </button>

</form>

@endsection

