<?php
namespace App\Http\Controllers;
use App\Mail\TaskCompleted;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
class TaskController extends Controller {
    public function index() {
        $tasks = Task::where('is_archived', false)->orderBy('due_date')->orderBy('id')->paginate(10);
        return view('tasks.index', compact('tasks'));
    }
    public function create() { return view('tasks.form', ['task' => new Task]); }
    private function validated(Request $request): array {
        return $request->validate([
            'title'=>['required','string','max:150'],
            'description'=>['nullable','string','max:5000'],
            'due_date'=>['required','date_format:Y-m-d'],
            'priority'=>['required',Rule::in(['low','medium','high'])],
            'status'=>['required',Rule::in(['pending','in_progress','done'])],
        ]);
    }
    public function store(Request $request) {
        Task::create($this->validated($request));
        return to_route('tasks.index')->with('success','Task created.');
    }
    public function edit(Task $task) {
        abort_if($task->is_archived,404);
        return view('tasks.form', compact('task'));
    }
    public function update(Request $request, Task $task) {
        $data = $this->validated($request);
        $notify = DB::transaction(function () use ($task,$data) {
            $current = Task::whereKey($task->id)->lockForUpdate()->firstOrFail();
            abort_if($current->is_archived,404);
            $changed = $current->status !== 'done' && $data['status'] === 'done';
            $current->update($data);
            return $changed;
        });
        $message = 'Task updated.';
        if ($notify) {
            try {
                Mail::to(config('tasks.notification_recipient'))->send(new TaskCompleted($task->fresh()));
                $message .= ' Completion notification generated.';
            } catch (\Throwable $exception) {
                Log::error('Task completion mail failed', ['task_id'=>$task->id,'error'=>$exception->getMessage()]);
                return to_route('tasks.index')->with('warning','Task saved, but its email failed. Check mail configuration and logs.');
            }
        }
        return to_route('tasks.index')->with('success',$message);
    }
    public function destroy(Task $task) {
        abort_if($task->is_archived,404);
        $task->update(['is_archived'=>true]);
        return to_route('tasks.index')->with('success','Task archived. The database record was preserved.');
    }
}
