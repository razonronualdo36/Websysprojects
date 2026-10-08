<?php
namespace App\Controllers;
use App\Models\UserModel;
class Auth extends BaseController {
    public function login() {
        if (session()->get('isLoggedIn')) return redirect()->to(site_url('tasks'));
        return view('login');
    }
    public function authenticate() {
        if (! $this->validate(['username'=>'required','password'=>'required']))
            return redirect()->back()->withInput()->with('error','Username and password are required.');
        $user = (new UserModel())->where('username', (string)$this->request->getPost('username'))->first();
        if (! $user || ! password_verify((string)$this->request->getPost('password'), (string)$user['password']))
            return redirect()->back()->withInput()->with('error','Invalid username or password.');
        session()->regenerate();
        session()->set(['user_id'=>$user['id'],'username'=>$user['username'],'isLoggedIn'=>true]);
        return redirect()->to(site_url('tasks'));
    }
    public function logout() {
        session()->destroy();
        return redirect()->to(site_url('login'));
    }
}
