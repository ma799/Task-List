@extends('layouts.app')
@section('title',content: 'All Tasks')
@section('content')

    <a class="link" href="{{ route('tasks.create') }}">Add Task!</a>

@forelse ($tasks as $task)
    <div>
        <a
            @class(['line-through text-gray-800'=> $task->completed])
        href="{{ route( 'tasks.show', $task) }}">{{ $task->title }}</a>

        {{-- <p>{{ $task->description }}</p>
        <p>{{ $task->long_description ?? "No Long Description yet" }}</p>
        <p>Status: {{ $task->completed ? 'Completed' : 'Pending' }}</p>
        <a href="{{ route( 'tasks.show', $task) }}">View Details</a> &nbsp;
        <a href="{{ route( 'tasks.edit', $task) }}">Edit</a>
        <form method="POST" action="{{ route( 'tasks.destroy', $task) }}">
            @csrf
            @method('DELETE')
            <button  type="submit" class="btn btn-danger">Delete</button>
        </form> --}}
    </div>
@empty
There are no tasks available.
@endforelse
    <div class="flex flex-wrap items-center justify-start gap-8 text-sm mt-4 ms-1">
    <!-- Results count - more compact -->
      <div class="mb-2 sm:mb-0">
        <p class="text-sm text-gray-700">
            Showing
            <span class="font-medium">{{ $tasks->firstItem() }}</span>
            to
            <span class="font-medium">{{ $tasks->lastItem() }}</span>
            of
            <span class="font-medium">{{ $tasks->total() }}</span>
            results
        </p>
    </div>

    <!-- Compact pagination links -->
    @if ($tasks->hasPages())
    <div class="flex items-center gap-1">
        <!-- Previous link -->
        @if ($tasks->onFirstPage())
            <span class="px-2 py-1 rounded border border-gray-200 text-gray-400 cursor-default">
                &lsaquo;
            </span>
        @else
            <a href="{{ $tasks->previousPageUrl() }}"
               class="px-2 py-1 rounded border border-gray-200 hover:bg-gray-50 transition-colors">
                &lsaquo;
            </a>
        @endif

        <!-- Page numbers - show limited range -->
        @php
            $current = $tasks->currentPage();
            $last = $tasks->lastPage();
            $start = max($current - 1, 1);
            $end = min($current + 1, $last);

            if ($start > 1) $start = max($current - 1, 1);
            if ($end < $last) $end = min($current + 1, $last);
        @endphp

        @if ($start > 1)
            <a href="{{ $tasks->url(1) }}" class="px-2 py-1 rounded border border-gray-200 hover:bg-gray-50">1</a>
            @if ($start > 2)
                <span class="px-1">...</span>
            @endif
        @endif

        @for ($page = $start; $page <= $end; $page++)
            @if ($page == $current)
                <span class="px-2 py-1 rounded bg-blue-600 text-white border border-blue-600">
                    {{ $page }}
                </span>
            @else
                <a href="{{ $tasks->url($page) }}"
                   class="px-2 py-1 rounded border border-gray-200 hover:bg-gray-50">
                    {{ $page }}
                </a>
            @endif
        @endfor

        @if ($end < $last)
            @if ($end < $last - 1)
                <span class="px-1">...</span>
            @endif
            <a href="{{ $tasks->url($last) }}" class="px-2 py-1 rounded border border-gray-200 hover:bg-gray-50">{{ $last }}</a>
        @endif

        <!-- Next link -->
        @if ($tasks->hasMorePages())
            <a href="{{ $tasks->nextPageUrl() }}"
               class="px-2 py-1 rounded border border-gray-200 hover:bg-gray-50">
                &rsaquo;
            </a>
        @else
            <span class="px-2 py-1 rounded border border-gray-200 text-gray-400 cursor-default">
                &rsaquo;
            </span>
        @endif
    </div>
    @endif
</div>
@endsection
