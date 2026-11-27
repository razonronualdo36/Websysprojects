@extends('tasks.layout')
@section('content')
<h1>Tasks for Today</h1><p>Keep track of your tasks, deadlines, and progress.</p><p>Everyone can browse the task list. Log in to create, edit, or archive tasks.</p><a class="button" href="{{ route('tasks.index') }}">View Tasks</a>
@endsection
