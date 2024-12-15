

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2>Edit Listing</h2>
        <form method="POST" action="<?php echo e(route('listings.update', $listing->id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" value="<?php echo e(old('name', $listing->name)); ?>" required>
            </div>
            <div class="form-group">
                <label for="latitude">Latitude:</label>
                <input type="text" name="latitude" class="form-control" value="<?php echo e(old('latitude', $listing->latitude)); ?>" required>
            </div>
            <div class="form-group">
                <label for="longitude">Longitude:</label>
                <input type="text" name="longitude" class="form-control" value="<?php echo e(old('longtitude', $listing->longtitude)); ?>" required>
            </div>
            <button type="submit" class="btn btn-warning">Update Listing</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\admin\Desktop\Advisory Apps\laravel_test\resources\views/listings/edit.blade.php ENDPATH**/ ?>