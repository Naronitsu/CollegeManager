<?php $__env->startSection('content'); ?>
    <main class="py-5">
      
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
                <div class="card-header card-title">
                  <div class="d-flex align-items-center">
                    <h2 class="mb-0">All Colleges</h2>
                    <div class="ms-auto">
                      <a href="<?php echo e(route('colleges.create')); ?>" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add New</a>
                    </div>
                  </div>
                </div>
              <div class="card-body">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Address</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if($colleges->count()): ?>
                      <?php $__currentLoopData = $colleges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $college): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <th scope="row"><?php echo e($index + 1); ?></th>
                          <td><?php echo e($college->name); ?></td>
                          <td><?php echo e($college->address); ?></td>
                          <td width="250">
                          <a href="<?php echo e(route('colleges.show', $college->id)); ?>" class="btn btn-sm btn-outline-info" title="View">
                              <i class="fa fa-eye"></i>
                            </a>

                            <a href="<?php echo e(route('colleges.edit', $college->id)); ?>" class="btn btn-sm btn-outline-secondary" title="Edit">
                              <i class="fa fa-edit"></i>
                            </a>
                            
                            <form action="<?php echo e(route('colleges.destroy', $college->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this college?');">
                              <?php echo csrf_field(); ?>
                              <?php echo method_field('DELETE'); ?>
                              <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                <i class="fa fa-trash"></i>
                              </button>
                            </form>
                          </td>
                        </tr>                        
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                      <tr>
                        <td colspan="4" class="text-center">No colleges found.</td>
                      </tr>
                    <?php endif; ?>
                  </tbody>
                </table> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sss/myCollegeManager/resources/views/colleges/index.blade.php ENDPATH**/ ?>