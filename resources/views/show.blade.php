@extends('layouts.app')

@section('title',$task->title)

@section('content')
{{ $task->description }}
@if($task->long_description)
 <p>{{ $task->long_description }}</p>
 @else
    <p>No long description available.</p>
@endif
  <p>{{ $task->created_at }}</p>
  <p>{{ $task->updated_at }}</p>
  @if ($task->completed)
    <p>Status: Completed</p>
  @else
    <p>Status: Pending</p>
  @endif
      <a href="{{ route( 'tasks.edit', $task) }}">Edit</a>
     <form method="POST" action="{{ route( 'tasks.destroy', $task) }}">
        @csrf
        @method('DELETE')
        <button style="background-color:#ff5f5f;border:none" type="submit" class="btn btn-danger">Delete</button>
      </form>
          <form method="POST" action="{{ route( 'tasks.toggleCompletion', $task) }}">
            @csrf
            @method('PUT')
            <button style="background-color:rgb(119, 119, 255);border:none" type="submit" class="btn btn-danger">
               Mark as @if($task->completed)
                     Pending
                @else
                    Completed
                @endif
            </button>
        </form>

@endsection

