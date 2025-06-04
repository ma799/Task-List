@extends('layouts.app')
@section('title', isset($task) ? 'Edit Task' : 'Create Tasks')
@section('content')

<form class="flex flex-col gap-2" method="POST" action="
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
    <div >
        <label for="title">Task Title</label>
        <input value="{{$task->title ?? old('title') }}" type="text" @class(['input-error'=>$errors->has('title')]) class=" @error('title') input-error @enderror"
         id="description" name="title" placeholder="Enter task name">
        @error('title')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>

    <div >
        <label for="description">Task Description</label>
        <textarea class=" @error('description') input-error @enderror" id="description" name="description" rows="3"
        placeholder="Enter task description">{{ $task->description ?? old('description') }}</textarea>
          @error('description')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>

    <div >
        <label for="long_description">Task Description</label>
        <textarea class=" @error('long_description') input-error @enderror" id="long_description" name="long_description" rows="3"
         placeholder="Enter task description">{{ $task->long_description ?? old('long_description') }}</textarea>
          @error('long_description')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex items-center flex-row-reverse justify-end gap-2 ">
        <label for="long_description">Completed</label>
        <input type="checkbox" name="completed" >
        </div>

    <div class="flex items-center  justify-between gap-2 mt-2">
        <button type="submit" class="btn ">
        @isset($task)
            Update Task
        @else
            Create Task
        @endisset
    </button>
    <a href="{{ route('tasks.index') }}" class="link">Cancel</a>
</div>


</form>

@endsection

