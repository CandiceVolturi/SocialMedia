<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <nav class="bg-white shadow mb-8">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between">
            <a href="<?php echo e(route('home')); ?>" class="text-xl font-bold text-blue-600">Home</a>
        </div>
    </nav>

    <div class="max-w-3xl mx-auto px-4 py-6">
        <div class="bg-white rounded shadow p-6">
            <h1 class="text-2xl font-bold mb-4"><?php echo e($post['title']); ?></h1>
            <p class="text-gray-700"><?php echo e($post['body']); ?></p>
            <div class="mt-4 text-sm text-gray-500">
                <a href="<?php echo e(route('users.show', $post['userId'])); ?>" class="text-blue-500">Lihat Profil User</a>
            </div>
        </div>

        <div class="mt-8">
            <h2 class="text-xl font-semibold mb-4">Komentar</h2>
            <?php $__empty_1 = true; $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="bg-white p-4 rounded shadow mb-4">
                    <div class="flex justify-between items-center mb-2">
                        <p class="font-medium"><?php echo e($comment['name']); ?></p>
                        <p class="text-sm text-gray-500"><?php echo e($comment['email']); ?></p>
                    </div>
                    <p class="text-gray-700"><?php echo e($comment['body']); ?></p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="text-gray-600">Belum ada komentar.</p>
            <?php endif; ?>
        </div>
    </div>

</body>
</html>
<?php /**PATH C:\newxampp\htdocs\SocialMedia\resources\views/post-detail.blade.php ENDPATH**/ ?>