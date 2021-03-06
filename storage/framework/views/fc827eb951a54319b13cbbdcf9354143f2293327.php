

<?php $__env->startSection('title', 'search'); ?>

<?php $__env->startSection('section'); ?>


  
<div class="mx-auto w-full bg-gray-50 rounded-md p-6 mt-5 text-gray-800 dark:bg-gray-500">

  <h1 class="text-center text-gray-800 dark:text-gray-300 text-lg font-bold"><?php echo e($results->count()); ?> result(s) for "<?php echo e($item); ?>"</h1>

  <?php $__empty_1 = true; $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
  <div class="my-4 py-4 px-2 bg-gray-50 dark:bg-gray-400 dark:text-gray-700 shadow-md rounded-md">
    <div class="flex">
       <div class="w-11/12">
        <a href="<?php echo e(route('post.show', $post)); ?>">
          <h1 class="lg:text-xl font-semibold truncate"><?php echo e($post->title); ?></h1>
          <p class="text-gray-600 font-base mt-3"><?php echo e($post->desc); ?></p>
        </a>
      </div>
    </div>

    <hr class="my-2 bg-gray-400 dark:bg-gray-700">

    <div class="w-full py-1 flex justify-between items-center">
      <div class="flex justify-center">
        <div class="mr-3">
          <img 
          <?php if(!$post->user->profile->file): ?> src="/image-header.jpg" <?php else: ?> src="/storage/uploads/<?php echo e($post->user->profile->file->file); ?>" <?php endif; ?> 
          class="w-6 h-6 object-center object-cover rounded-full" alt="image">
        </div>

        <div class="flex text-sm mr-4">
          <div class="mr-2"><span class="hidden md:inline mr-2">posted</span>by</div>

          <a href="<?php echo e(route('profile.show', $post->user->profile)); ?>" class="text-blue-900 font-semibold mr-2" ><?php echo e($post->user->name); ?></a>
          <span class="mr-2">in</span>
          <a href="<?php echo e(route('category.show', $post->category)); ?>" class="text-blue-900 font-semibold mr-2" >
            <?php echo e($post->category); ?></a>
          </div>

          <span class="text-sm"><?php echo e($post->created_at->shortRelativeDiffForHumans()); ?></span>
        </div>

        <div class="flex items-center">
         <svg class="w-6 h-6 mr-1" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
        </svg>
        <span class="text-blue-900 font-bold"><?php echo e($post->comments_count); ?></span>
      </div>
    </div>
  </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

  <?php endif; ?>

  <?php echo e($results->links()); ?>


</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Forume\resources\views/search.blade.php ENDPATH**/ ?>