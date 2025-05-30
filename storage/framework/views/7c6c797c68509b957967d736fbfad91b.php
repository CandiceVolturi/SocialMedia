<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e(isset($post) ? 'Edit Post' : 'Buat Post'); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <nav class="bg-white shadow mb-8">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between">
            <a href="<?php echo e(route('home')); ?>" class="text-xl font-bold text-blue-600">Home</a>
        </div>
    </nav>

    <div class="max-w-xl mx-auto px-4 py-6 bg-white rounded shadow">
        <h1 class="text-2xl font-bold mb-6">
            <?php echo e(isset($post) ? 'Edit Post' : 'Buat Post Baru'); ?>

        </h1>

        <?php if($errors->any()): ?>
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul class="list-disc pl-5">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(isset($post) ? route('posts.update', $post['id']) : route('posts.store')); ?>">
            <?php echo csrf_field(); ?>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Judul</label>
                <input type="text" name="title" value="<?php echo e(old('title', $post['title'] ?? '')); ?>"
                    class="w-full px-4 py-2 border rounded" required>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Isi</label>
                <textarea name="body" rows="6" class="w-full px-4 py-2 border rounded" required><?php echo e(old('body', $post['body'] ?? '')); ?></textarea>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                <?php echo e(isset($post) ? 'Update' : 'Simpan'); ?>

            </button>
        </form>
    </div>

</body>
</html>
<?php /**PATH C:\newxampp\htdocs\SocialMedia\resources\views/create-edit-post.blade.php ENDPATH**/ ?>