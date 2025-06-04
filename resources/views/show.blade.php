@extends('layouts.app')

@section('title',$task->title)

@section('content')
<a class="link" href="{{ route('tasks.index') }}">← Back to All Tasks</a>
<div class="flex flex-col gap-2">
<p>{{ $task->description }}</p>
@if($task->long_description)
 <p class="text-slate-700"> {{ $task->long_description }}</p>
 @else
    <p>No long description available.</p>
@endif
  <div class="flex text-slate-500">
    <p>Created : {{ $task->created_at->diffForHumans() }}</p>&nbsp; • &nbsp;
    <p>Updated : {{ $task->updated_at->diffForHumans() }}</p>
  </div>
  @if ($task->completed)
    <p class="text-slate-700 font-medium">Completed</p>
  @else
    <p class="text-red-500 font-medium">Pending</p>
  @endif
 <div class="mt-4 flex gap-2">
    <a class="btn" href="{{ route( 'tasks.edit', $task) }}">Edit</a>
    <form method="POST" action="{{ route( 'tasks.destroy', $task) }}">
        @csrf
        @method('DELETE')
        <button  type="submit" class="btn ">Delete</button>
    </form>
    <form method="POST" action="{{ route( 'tasks.toggleCompletion', $task) }}">
    @csrf
    @method('PUT')
    <button  type="submit" class="btn ">
        Mark as @if($task->completed)
                Pending
        @else
            Completed
        @endif
    </button>
    </form>
 </div>
</div>
@endsection

