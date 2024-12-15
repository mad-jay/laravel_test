

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2>Admin Dashboard</h2>
        <a href="<?php echo e(route('listings.create')); ?>" class="btn btn-success">Add Listing</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Latitude</th>
                    <th>Longtitude</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $listings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($listing->id); ?></td>
                        <td><?php echo e($listing->name); ?></td>
                        <td><?php echo e($listing->latitude); ?></td>
                        <td><?php echo e($listing->longtitude); ?></td>
                        <td>
                            <a href="<?php echo e(route('listings.edit', $listing->id)); ?>" class="btn btn-warning">Edit</a>
                            <form action="<?php echo e(route('listings.destroy', $listing->id)); ?>" method="POST" style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\admin\Desktop\Advisory Apps\laravel_test\resources\views/listings/admin.blade.php ENDPATH**/ ?>