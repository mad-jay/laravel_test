

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2>Add New Listing</h2>
        <form method="POST" action="<?php echo e(route('listings.store')); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="latitude">Latitude:</label>
                <input type="text" name="latitude" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="longitude">Longitude:</label>
                <input type="text" name="longtitude" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Add Listing</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\admin\Desktop\Advisory Apps\laravel_test\resources\views/listings/create.blade.php ENDPATH**/ ?>