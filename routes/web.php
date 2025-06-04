<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task ;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

Route::get('tasks', function () {
  return view('index', ['tasks' => Task::latest()->paginate(10)]);
})->name('tasks.index');

Route::view('tasks/create', 'create')->name('tasks.create');

Route::get('tasks/{task}', function (Task $task) {
  return view('show', ['task' => $task]);
})->name('tasks.show');

Route::post('tasks', function (TaskRequest $request) {
$task = Task::create($request->validated());
  return redirect()
    ->route('tasks.show', $task)
    ->with('success', 'Task created successfully!');
})->name('tasks.store');

Route::get('tasks/{task}/edit', function (Task $task) {
  return view('edit', ['task' => $task]);
})->name('tasks.edit');

Route::put('tasks/{task}', function (Task $task,TaskRequest $request) {
    $task->update($request->validated());
    return redirect()
    ->route('tasks.show', $task)
    ->with('success', 'Task updated successfully!');
})->name('tasks.update');

Route::delete('tasks/{task}', function (Task $task) {
    $task->delete();
    return redirect()
        ->route('tasks.index')
        ->with('success', 'Task deleted successfully!');
})->name('tasks.destroy');

Route::put('tasks/{task}/toggleCompletion',function(Task $task){
    $task->toggleCompleted();
    return redirect()->back()->with('success', 'Task completion status updated successfully!');
})->name('tasks.toggleCompletion');


Route::get('/', function () {
  return redirect()->route('tasks.index');
})->name('home');
