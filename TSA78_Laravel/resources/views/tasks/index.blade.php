@extends('tasks.layout')
@section('content')
<h1>Task List</h1><p>Current tasks, ordered by deadline.</p>
@auth<a class="button" href="{{ route('tasks.create') }}">Create Task</a>@else<p><a href="{{ route('login') }}">Log in</a> to manage tasks.</p>@endauth
<div class="scroll"><table><thead><tr><th>Task</th><th>Due Date</th><th>Priority</th><th>Status</th>@auth<th>Actions</th>@endauth</tr></thead><tbody>
@forelse($tasks as $task)<tr><td><strong>{{ $task->title }}</strong><br><small>{{ $task->description }}</small></td><td>{{ $task->due_date->format('M j, Y') }}</td><td>{{ ucfirst($task->priority) }}</td><td><span class="badge">{{ ucfirst(str_replace('_',' ',$task->status)) }}</span></td>@auth<td><div class="actions"><a class="button" href="{{ route('tasks.edit',$task) }}">Edit</a><form method="POST" action="{{ route('tasks.destroy',$task) }}" onsubmit="return confirm('Archive this task?')">@csrf @method('DELETE')<button class="danger">Archive</button></form></div></td>@endauth</tr>@empty<tr><td colspan="5">No active tasks.</td></tr>@endforelse
</tbody></table></div>
<div class="actions">@if($tasks->previousPageUrl())<a href="{{ $tasks->previousPageUrl() }}">Previous</a>@endif <span>Page {{ $tasks->currentPage() }} of {{ $tasks->lastPage() }}</span>@if($tasks->nextPageUrl())<a href="{{ $tasks->nextPageUrl() }}">Next</a>@endif</div>
@endsection
