<?= view('_start',['pageTitle'=>'Task Management System']) ?>
<h1>Task Management System</h1><p>Welcome to my CodeIgniter project.</p><hr>
<p><a href="<?= site_url('welcome') ?>">Today's Tasks</a></p>
<p><a href="<?= site_url('tasks') ?>">Full Task List</a></p>
<p><a href="<?= site_url('profile') ?>">Developer Profile</a></p>
<p><a href="<?= site_url('about') ?>">About</a></p>
<?= view('_end') ?>
