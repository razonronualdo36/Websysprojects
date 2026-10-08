<?= view('_start',['pageTitle'=>'Create New Task']) ?>
<h1>Create New Task</h1>
<?php $errors = session()->getFlashdata('errors') ?? []; ?>
<?php foreach ($errors as $error): ?><p class="error"><?= esc($error) ?></p><?php endforeach; ?>
<form method="post" action="<?= site_url('tasks') ?>">
<?= csrf_field() ?>
<label for="title">Title</label><input id="title" name="title" maxlength="150" required value="<?= esc(old('title', $task['title'] ?? '')) ?>">
<label for="task_date">Task date</label><input id="task_date" name="task_date" type="date" required value="<?= esc(old('task_date', $task['task_date'] ?? '')) ?>">
<label for="status">Status</label><select id="status" name="status"><option value="pending" <?= old('status', $task['status'] ?? 'pending') === 'pending' ? 'selected' : '' ?>>Pending</option><option value="completed" <?= old('status', $task['status'] ?? 'pending') === 'completed' ? 'selected' : '' ?>>Completed</option></select>
<p><button type="submit">Save Task</button> <a href="<?= site_url('tasks') ?>">Cancel</a></p></form>
<?= view('_end') ?>
