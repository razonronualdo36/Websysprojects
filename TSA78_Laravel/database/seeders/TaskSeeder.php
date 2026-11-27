<?php
namespace Database\Seeders;
use App\Models\Task;
use Illuminate\Database\Seeder;
class TaskSeeder extends Seeder {
    public function run(): void {
        foreach (['Review Laravel routes','Prepare project documentation','Test form validation','Check email notification','Submit the hosted project'] as $index=>$title) {
            Task::firstOrCreate(['title'=>$title],['description'=>'Sample classroom task.','due_date'=>now()->addDays($index+1)->toDateString(),'priority'=>$index===4?'high':'medium','status'=>'pending']);
        }
    }
}
