<?php $__env->startSection('content'); ?>
<h1>Tasks for Today</h1><p>Keep track of your tasks, deadlines, and progress.</p><p>Everyone can browse the task list. Log in to create, edit, or archive tasks.</p><a class="button" href="<?php echo e(route('tasks.index')); ?>">View Tasks</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('tasks.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\codeigniter projects\Websysprojects\TSA78_Laravel\resources\views/tasks/welcome.blade.php ENDPATH**/ ?>