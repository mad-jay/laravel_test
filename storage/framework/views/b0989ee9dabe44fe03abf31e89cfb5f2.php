<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
    <!-- Add any CSS here -->
</head>
<body>
    <nav>
        <!-- Navigation goes here -->
    </nav>

    <div class="container">
        <?php echo $__env->yieldContent('content'); ?>  <!-- This is where the content from child views will be inserted -->
    </div>
</body>
</html>
<?php /**PATH C:\Users\admin\Desktop\Advisory Apps\laravel_test\resources\views/layouts/app.blade.php ENDPATH**/ ?>