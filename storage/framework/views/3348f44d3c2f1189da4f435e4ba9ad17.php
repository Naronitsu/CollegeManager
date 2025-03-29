<?php $__env->startSection('title', 'Add Student'); ?>

<?php $__env->startSection('content'); ?>
  <main class="py-5">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header card-title">
              <strong>Add New Student</strong>
            </div>           
            <div class="card-body">
              <form action="<?php echo e(route('students.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                
                <?php echo $__env->make('students._form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sss/myCollegeManager/resources/views/students/create.blade.php ENDPATH**/ ?>