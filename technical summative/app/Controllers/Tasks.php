<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\UserModel;

class Tasks extends BaseController
{

    public function home()
    {
        $model = new TaskModel();

        $today = date('Y-m-d');

        $data['tasks'] =
            $model
            ->where('task_date',$today)
            ->findAll();

        return view('welcome',$data);
    }


    public function index()
    {
        $model = new TaskModel();

        $data['tasks'] =
            $model
            ->orderBy('task_date','ASC')
            ->findAll();

        return view('tasks',$data);
    }


    public function profile()
    {
        $model = new UserModel();

        $data['user'] =
            $model->first();

        return view('profile',$data);
    }

}