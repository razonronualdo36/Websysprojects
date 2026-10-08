<?= view('_start',['pageTitle'=>'All Tasks']) ?>
<h1>All Tasks</h1>
<?php if (session()->get('isLoggedIn')): ?><p><a href="<?= site_url('tasks/new') ?>">+ Create New Task</a></p><?php endif; ?>
<?php if (empty($tasks)): ?><p>No active tasks yet.</p><?php endif; ?>
<?php foreach ($tasks as $task): ?>
<div class="task"><strong><?= esc($task['title']) ?></strong><p>Status: <?= esc($task['status']) ?> | Date: <?= esc($task['task_date']) ?></p>
<?php if (session()->get('isLoggedIn')): ?>
<a href="<?= site_url('tasks/'.$task['id'].'/edit') ?>">Edit</a>
<form method="post" action="<?= site_url('tasks/'.$task['id'].'/archive') ?>" style="display:inline" onsubmit="return confirm('Archive this task?')"><?= csrf_field() ?><button type="submit">Archive</button></form>
<?php endif; ?></div>
<?php endforeach; ?>
<?= view('_end') ?>
