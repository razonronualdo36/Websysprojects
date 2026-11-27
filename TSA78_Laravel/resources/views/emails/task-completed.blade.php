<!doctype html><html lang="en"><body>
<h1>Task completed</h1>
<p>The following task has changed to done.</p>
<p><strong>{{ $task->title }}</strong></p>
<p>{{ $task->description }}</p>
<p>Due: {{ $task->due_date->format('F j, Y') }}</p>
<p>Status: Done</p>
<a href="{{ route('tasks.index') }}">View task list</a>
</body></html>
