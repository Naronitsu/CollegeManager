<div class="row">
    <div class="col-md-6"></div>
    <div class="col-md-6">
        <div class="row">
        <div class="col">
            <div class="input-group mb-3">
            <select id="filter_company_id" class="custom-select">
                <?php $__currentLoopData = $colleges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php echo e($id == request('college_id') ? 'selected' : ''); ?>  value=<?php echo e($id); ?>><?php echo e($name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            </div>
            </div>
        </div>
        </div>
    </div>
</div><?php /**PATH /home/sss/myCollegeManager/resources/views/colleges/_filter.blade.php ENDPATH**/ ?>