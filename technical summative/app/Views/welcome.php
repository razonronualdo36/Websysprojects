<h1>Today's Tasks</h1>

<?php foreach($tasks as $task): ?>

<p>
<?= esc($task['title']) ?>
-
<?= esc($task['status']) ?>
</p>

<?php endforeach; ?>