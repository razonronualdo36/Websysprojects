<?php
namespace App\Controllers;
use App\Models\TaskModel;
use App\Models\UserModel;
class Tasks extends BaseController {
    public function home() {
        return view('welcome', ['tasks'=>(new TaskModel())->where('is_archived',0)->where('task_date',date('Y-m-d'))->orderBy('id','ASC')->findAll()]);
    }
    public function index() {
        return view('tasks', ['tasks'=>(new TaskModel())->where('is_archived',0)->orderBy('task_date','ASC')->orderBy('id','ASC')->findAll()]);
    }
    public function profile() {
        return view('profile', ['user'=>(new UserModel())->first()]);
    }
    public function new() { return view('task_new'); }
    public function create() {
        if (! $this->validate($this->rules())) return redirect()->back()->withInput()->with('errors',$this->validator->getErrors());
        (new TaskModel())->insert($this->payload() + ['created_at'=>date('Y-m-d H:i:s'),'is_archived'=>0]);
        return redirect()->to(site_url('tasks'))->with('success','Task created.');
    }
    public function edit(int $id) {
        $task = (new TaskModel())->where('is_archived',0)->find($id);
        if (! $task) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        return view('task_edit',['task'=>$task]);
    }
    public function update(int $id) {
        $model = new TaskModel();
        if (! $model->where('is_archived',0)->find($id)) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        if (! $this->validate($this->rules())) return redirect()->back()->withInput()->with('errors',$this->validator->getErrors());
        $model->update($id,$this->payload());
        return redirect()->to(site_url('tasks'))->with('success','Task updated.');
    }
    public function archive(int $id) {
        $model = new TaskModel();
        if (! $model->where('is_archived',0)->find($id)) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        $model->update($id,['is_archived'=>1]);
        return redirect()->to(site_url('tasks'))->with('success','Task archived.');
    }
    private function rules(): array {
        return ['title'=>'required|max_length[150]','task_date'=>'required|valid_date[Y-m-d]','status'=>'required|in_list[pending,completed]'];
    }
    private function payload(): array {
        return ['title'=>trim((string)$this->request->getPost('title')),'task_date'=>(string)$this->request->getPost('task_date'),'status'=>(string)$this->request->getPost('status')];
    }
}
