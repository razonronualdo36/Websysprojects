<?= view('_start',['pageTitle'=>"Today's Tasks"]) ?>
<h1>Today's Tasks</h1><p><?= esc(date('F j, Y')) ?></p>
<?php if (empty($tasks)): ?><p>No tasks scheduled for today.</p><?php endif; ?>
<?php foreach ($tasks as $task): ?><div class="task"><strong><?= esc($task['title']) ?></strong> — <?= esc($task['status']) ?></div><?php endforeach; ?>
<?= view('_end') ?>
