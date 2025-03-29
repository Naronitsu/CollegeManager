<?php $__env->startSection('content'); ?>
    <main class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
                <div class="card-header card-title">
                  <div class="d-flex align-items-center">
                    <h2 class="mb-0">All Students</h2>
                    <div class="ms-auto d-flex">
                      <!-- College Filter Dropdown -->
                      <form method="GET" action="<?php echo e(route('students.index')); ?>" class="me-2">
                        <select name="college_id" class="form-select" onchange="this.form.submit()">
                            <option value="" <?php echo e(request('college_id') ? '' : 'selected'); ?>>All Students</option>
                            <?php $__currentLoopData = $colleges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $college): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($college->id); ?>" <?php echo e(request('college_id') == $college->id ? 'selected' : ''); ?>>
                                    <?php echo e($college->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </form>
                      <!-- Add New Student Button -->
                      <a href="<?php echo e(route('students.create')); ?>" class="btn btn-success">
                        <i class="fa fa-plus-circle"></i> Add New
                      </a>
                    </div>
                  </div>
                </div>
              <div class="card-body">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <!-- Make the Name header clickable for sorting -->
                      <th scope="col">
                      <a href="<?php echo e(route('students.index', array_merge(request()->query(), ['sort' => request()->query('sort') === 'name' ? null : 'name']))); ?>">
                          Name
                      </a>
                      </th>
                      <th scope="col">Email</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Date of Birth</th>
                      <th scope="col">College</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if($students->count()): ?>
                      <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <th scope="row"><?php echo e($index + 1); ?></th>
                          <td><?php echo e($student->name); ?></td>
                          <td><?php echo e($student->email); ?></td>
                          <td><?php echo e($student->phone); ?></td>
                          <td><?php echo e($student->dob); ?></td>
                          <td><?php echo e($student->college->name ?? 'N/A'); ?></td>
                          <td width="250">
                            <!-- View Button -->
                            <a href="<?php echo e(route('students.show', $student->id)); ?>" class="btn btn-sm btn-outline-info" title="View">
                              <i class="fa fa-eye"></i>
                            </a>
                            
                            <!-- Edit Button -->
                            <a href="<?php echo e(route('students.edit', $student->id)); ?>" class="btn btn-sm btn-outline-secondary" title="Edit">
                              <i class="fa fa-edit"></i>
                            </a>
                            
                            <!-- Delete Form -->
                            <form action="<?php echo e(route('students.destroy', $student->id)); ?>" method="POST" class="d-inline" 
                                  onsubmit="return confirm('Are you sure you want to delete this student?');">
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
                        <td colspan="7" class="text-center">No students found.</td>
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

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sss/myCollegeManager/resources/views/students/index.blade.php ENDPATH**/ ?>