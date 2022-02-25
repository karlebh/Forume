

<?php $__env->startSection('section'); ?>
<div class="mx-auto w-full">
  <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="my-4 p-4 bg-gray-50 shadow-md md:rounded-md">
      <div class="flex">
       <div class="w-11/12">
        <a href="<?php echo e(route('category.show', $category)); ?>">
          <h1 class="lg:text-xl font-semibold truncate"><?php echo e($category->name); ?></h1>
          <p class="text-gray-600 font-base mt-3"><?php echo e($category->desc ?? "A Cool place to have fun!"); ?></p>
        </a>
      </div>
    </div>

    <hr class="my-2 bg-gray-400">

    <div class="w-full py-1 flex justify-between items-center">
      <div class="flex justify-center">

        <span class="text-sm"><span class="mr-3">created by Superuser</span><?php echo e($category->created_at->DiffForHumans()); ?></span>
      </div>

      <div class="flex items-center">
        <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 ml-5"><path fill-rule="evenodd" clip-rule="evenodd" d="M24 29.3485C24 28.3722 24.7049 27.5385 25.6676 27.3763C27.7916 27.0183 30.1723 26.3473 32.2652 25.2485C35.3472 23.6303 38.0008 20.9633 38.0008 16.8447C38.0008 13.2074 36.2944 10.5064 33.7326 8.72515C31.2093 6.97066 27.8823 6.11808 24.5452 6.01149C21.2024 5.90472 17.7512 6.54254 14.9316 7.87372C12.1196 9.20135 9.81587 11.2827 9.03645 14.1214C8.89021 14.6539 9.20341 15.2042 9.73598 15.3505C10.2686 15.4967 10.8188 15.1835 10.9651 14.6509C11.5336 12.5804 13.272 10.869 15.7855 9.68229C18.2813 8.50395 21.4113 7.91241 24.4813 8.01047C27.5578 8.10874 30.4742 8.89549 32.5908 10.3672C34.6739 11.8156 36.0008 13.931 36.0008 16.8447C36.0008 19.9159 34.0809 22.0363 31.3355 23.4777C28.5988 24.9145 25.2495 25.5481 22.9432 25.6794C22.4139 25.7095 22 26.1475 22 26.6777V30C22 30.5523 22.4477 31 23 31C23.5523 31 24 30.5523 24 30V29.3485ZM23 37C21.8955 37 21 37.8954 21 39C21 40.1046 21.8955 41 23 41C24.1046 41 25 40.1046 25 39C25 37.8954 24.1046 37 23 37ZM34.8743 7.08308C37.9149 9.1972 40.0008 12.4839 40.0008 16.8447C40.0008 22.0099 36.6142 25.224 33.195 27.0192C30.8637 28.2432 28.2668 28.9664 26 29.3485V30C26 31.6568 24.6569 33 23 33C21.3432 33 20 31.6568 20 30V26.6777C20 25.0871 21.2415 23.773 22.8296 23.6826C24.9482 23.562 27.996 22.9722 30.4058 21.7069C32.7869 20.4568 34.0008 18.8909 34.0008 16.8447C34.0008 14.6496 33.0491 13.1219 31.4491 12.0093C29.7386 10.82 27.2324 10.0994 24.4175 10.0095C21.6204 9.92011 18.8116 10.4653 16.6394 11.4909C14.4343 12.5319 13.2533 13.8706 12.8937 15.1805C12.455 16.7782 10.8041 17.7178 9.20643 17.2791C7.60871 16.8404 6.66913 15.1895 7.10783 13.5918C8.09817 9.98502 10.9672 7.53373 14.0778 6.06516C17.2212 4.58109 20.9936 3.89703 24.609 4.01251C28.2067 4.12742 31.9442 5.04572 34.8743 7.08308ZM19 39C19 36.7909 20.7909 35 23 35C25.2092 35 27 36.7909 27 39C27 41.2091 25.2092 43 23 43C20.7909 43 19 41.2091 19 39Z" fill="#333333"></path></svg>
        <span class="text-blue-900 font-bold"><?php echo e($category->posts_count); ?></span>
      </div>
    </div>
  </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

<h1 class="text-center">No Posts Yet <a href="<?php echo e(route('post.create')); ?>" class="ml-4 text-blue-900 font-semibold">Create a Topic</a></h1>

<?php endif; ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Jet\resources\views/category/index.blade.php ENDPATH**/ ?>