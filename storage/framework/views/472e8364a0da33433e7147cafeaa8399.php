<form method="GET" action="<?php echo e(route('students.index')); ?>" class="me-2">
    <div class="d-flex align-items-center">
        <label for="sort" class="me-2">Sort by</label>
        <select name="sort" class="form-select" onchange="this.form.submit()">
            <option value="name" <?php echo e(request('sort') == 'name' ? 'selected' : ''); ?>>Name</option>
        </select>
    </div>
</form>
<?php /**PATH /home/sss/myCollegeManager/resources/views/students/_sort.blade.php ENDPATH**/ ?>