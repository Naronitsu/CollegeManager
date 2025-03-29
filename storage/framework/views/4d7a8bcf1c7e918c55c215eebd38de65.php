<?php $__env->startSection('content'); ?>
    <main class="py-5">
      <div class="container">
        <div class="row justify-content-md-center">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header card-title">
                <strong>Edit College</strong>
              </div>
              <div class="card-body">
                <form action="<?php echo e(route('colleges.update', $college->id)); ?>" method="POST">
                  <?php echo method_field('PUT'); ?>
                  <?php echo csrf_field(); ?>
                  <?php echo $__env->make('colleges._form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sss/myCollegeManager/resources/views/colleges/edit.blade.php ENDPATH**/ ?>