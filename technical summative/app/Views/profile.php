<?= view('_start',['pageTitle'=>'Developer Profile']) ?>
<h1>Developer Profile</h1>


<p>
Username:
<?= esc($user['username']) ?>
</p>


<p>
Name:
<?= esc($user['full_name']) ?>
</p>


<p>
Email:
<?= esc($user['email']) ?>
</p>
<?= view('_end') ?>
