<?php
namespace Tests\Feature;
use App\Mail\TaskCompleted;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;
class TaskWorkflowTest extends TestCase {
    use RefreshDatabase;
    private function data(array $overrides=[]): array {
        return array_merge(['title'=>'Review work','description'=>'Test task','due_date'=>'2027-01-10','priority'=>'medium','status'=>'pending'],$overrides);
    }
    public function test_public_pages_are_accessible(): void {
        foreach (['/','/tasks','/profile','/about'] as $url) $this->get($url)->assertOk();
    }
    public function test_guests_cannot_manage_tasks(): void {
        $task=Task::create($this->data());
        $this->get('/tasks/create')->assertRedirect('/login');
        $this->get("/tasks/{$task->id}/edit")->assertRedirect('/login');
        $this->post('/tasks',$this->data())->assertRedirect('/login');
        $this->put("/tasks/{$task->id}",$this->data())->assertRedirect('/login');
        $this->delete("/tasks/{$task->id}")->assertRedirect('/login');
    }
    public function test_crud_validation_and_single_completion_email(): void {
        Mail::fake();
        $this->actingAs(User::factory()->create());
        $this->post('/tasks',[])->assertSessionHasErrors(['title','due_date','priority','status']);
        $this->post('/tasks',$this->data())->assertRedirect(route('tasks.index'));
        $task=Task::firstOrFail();
        $this->get("/tasks/{$task->id}/edit")->assertOk()->assertSee('Review work');
        $this->put("/tasks/{$task->id}",$this->data(['status'=>'done']))->assertRedirect(route('tasks.index'));
        Mail::assertSent(TaskCompleted::class,1);
        Mail::assertSent(TaskCompleted::class,fn($mail)=>$mail->hasTo(config('tasks.notification_recipient')));
        $this->put("/tasks/{$task->id}",$this->data(['status'=>'done','title'=>'Updated title']))->assertRedirect(route('tasks.index'));
        Mail::assertSent(TaskCompleted::class,1);
        $this->delete("/tasks/{$task->id}")->assertRedirect(route('tasks.index'));
        $this->assertDatabaseHas('tasks',['id'=>$task->id,'is_archived'=>true]);
        $this->get('/tasks')->assertDontSee('Updated title');
        $this->get("/tasks/{$task->id}/edit")->assertNotFound();
    }
}
