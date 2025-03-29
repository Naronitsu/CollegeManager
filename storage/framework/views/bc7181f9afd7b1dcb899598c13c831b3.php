<?php $__env->startSection('content'); ?>
<div class="container text-center py-5">
    <h1 class="mb-4">Welcome to the Student & College Management System</h1>
    <p class="lead">Manage students and colleges easily.</p>
    
    <div class="d-flex justify-content-center gap-3">
        <a href="<?php echo e(route('students.index')); ?>" class="btn btn-primary btn-lg">View Students</a>
        <a href="<?php echo e(route('colleges.index')); ?>" class="btn btn-primary btn-lg">View Colleges</a>
    </div>

    <div class="mt-4">
        <a href="<?php echo e(route('students.create')); ?>" class="btn btn-outline-primary">Add Student</a>
        <a href="<?php echo e(route('colleges.create')); ?>" class="btn btn-outline-primary">Add College</a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sss/myCollegeManager/resources/views/welcome.blade.php ENDPATH**/ ?>