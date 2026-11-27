@extends('tasks.layout')
@section('content')
<h1>{{ $task->exists ? 'Edit Task' : 'Create Task' }}</h1>
<form method="POST" action="{{ $task->exists ? route('tasks.update',$task) : route('tasks.store') }}">
@csrf @if($task->exists) @method('PUT') @endif
<label for="title">Title</label><input id="title" name="title" maxlength="150" required value="{{ old('title',$task->title) }}">
<label for="description">Description</label><textarea id="description" name="description" rows="4" maxlength="5000">{{ old('description',$task->description) }}</textarea>
<label for="due_date">Due Date</label><input id="due_date" type="date" name="due_date" required value="{{ old('due_date',$task->due_date?->format('Y-m-d')) }}">
<label for="priority">Priority</label><select id="priority" name="priority">@foreach(['low','medium','high'] as $value)<option value="{{ $value }}" @selected(old('priority',$task->priority ?? 'medium') === $value)>{{ ucfirst($value) }}</option>@endforeach</select>
<label for="status">Status</label><select id="status" name="status">@foreach(['pending','in_progress','done'] as $value)<option value="{{ $value }}" @selected(old('status',$task->status ?? 'pending') === $value)>{{ ucfirst(str_replace('_',' ',$value)) }}</option>@endforeach</select>
<p><button>Save Task</button> <a class="button secondary" href="{{ route('tasks.index') }}">Cancel</a></p></form>
@endsection
