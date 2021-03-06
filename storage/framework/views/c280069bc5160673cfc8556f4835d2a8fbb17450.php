
<?php $__env->startSection('title', 'edit profile'); ?>

<?php $__env->startSection('section'); ?>

<div class="mx-auto w-full bg-gray-100 md:rounded-md p-6 mt-5 dark:bg-gray-700 dark:text-gray-400">
  <form action="<?php echo e(route('profile.update', $profile)); ?>" method="POST" enctype="multipart/form-data" class="py-3" enctype="multipart/form-data">
    <?php echo method_field('PATCH'); ?>
    <?php echo csrf_field(); ?>

    <h1 class="text-2xl font-semibold text-center text-gray-900 dark:text-gray-300">Edit Profile</h1>

    <div class="mt-10 md:w-9/12 mx-auto">
      <small class="text-blue-500 font-semibold dark:text-gray-200">All fields are optional.</small>
    </div>

    <div class="mt-7 md:w-9/12 mx-auto">
      <label for="city" class="dark:text-gray-200">City</label>
      <input type="text" 
      autocomplete="off"
      name="city" placeholder="Enter the name of your city" 
      class="placeholder-gray-800 dark:placeholder-gray-300 dark:bg-gray-600 dark:text-gray-300 mt-3 w-full rounded-md focus:ring-0 focus:border-purple-500 <?php if($profile->city): ?> bg-gray-300 <?php endif; ?>" 
      <?php if($profile->city): ?> value="<?php echo e($profile->city); ?>" <?php else: ?> value="<?php echo e(old('city')); ?>" <?php endif; ?>>
      <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <div class="text-sm text-red-500 justify-end"><?php echo e($message); ?></div>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="mt-10 md:w-9/12 mx-auto">
      <label for="city" class="dark:text-gray-200">Country</label>
      <input type="text" autocomplete="off"
      name="country" placeholder="What country are you from?" class="placeholder-gray-800 dark:placeholder-gray-300 dark:bg-gray-600 dark:text-gray-300 mt-3 w-full rounded-md focus:ring-0 focus:border-purple-500 <?php if($profile->country): ?> bg-gray-300 <?php endif; ?>" 
      <?php if($profile->country): ?> value="<?php echo e($profile->country); ?>" <?php else: ?> value="<?php echo e(old('country')); ?>" <?php endif; ?>>
      <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <div class="text-sm text-red-500 justify-end"><?php echo e($message); ?></div>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="mt-10 md:w-9/12 mx-auto">
      <label for="city" class="dark:text-gray-200">Phone</label>
      <input type="text" autocomplete="off"
      name="phone" placeholder="We do not mind if you share your phone number" class="placeholder-gray-800 dark:placeholder-gray-300 dark:bg-gray-600 dark:text-gray-300 mt-3 w-full rounded-md focus:ring-0 focus:border-purple-500 <?php if($profile->phone): ?> bg-gray-300 <?php endif; ?>" 
      <?php if($profile->phone): ?> value="<?php echo e($profile->phone); ?>" <?php else: ?> value="<?php echo e(old('phone')); ?>" <?php endif; ?>>
      <small class="text-blue-500 font-semibold my-2 dark:text-gray-200">Your number is visible to you only</small>
      <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <div class="text-sm text-red-500 justify-end"><?php echo e($message); ?></div>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="md:w-9/12 mx-auto mt-10">
      <label for="sex" class="dark:text-gray-200">Gender</label>
      <select name="sex" class="placeholder-gray-800 dark:placeholder-gray-300 dark:bg-gray-600 dark:text-gray-300 w-full rounded-md focus:ring-0 focus:border-purple-500 mt-2 <?php if($profile->sex): ?> bg-gray-300 <?php endif; ?>">
        <option <?php if($profile->sex == 'male'): ?> selected <?php endif; ?> value="male">Male</option>
        <option <?php if($profile->sex == 'female'): ?> selected <?php endif; ?> value="female">Female</option>
        <option <?php if($profile->sex == 'others'): ?> selected <?php endif; ?> value="others">Others</option>
      </select>
      <?php $__errorArgs = ['sex'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <div class="text-sm text-red-500 justify-end"><?php echo e($message); ?></div>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    
    <div class="md:w-9/12 mx-auto mt-10">
      <small class="text-blue-500 font-semibold dark:text-gray-200">This image will be used as your profile photo.
        <?php if(! $profile->file): ?> It will remove the deafult image. <?php endif; ?>
      </small>
      <input 
      type="file" 
      id="photo" 
      name="images[]"
      accept="image/*" 
      data-max-file-size="5MB"
      class="w-full mt-2"
      >
    </div>

    <div class="mt-8 md:w-9/12 mx-auto">
      <input type="submit" value="Update Profile" class="px-3 py-2 bg-green-700 text-gray-100 rounded-md focus:ring-0 focus:border-purple-500 font-semibold">
    </div>

  </form>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Forume\resources\views/profile/edit.blade.php ENDPATH**/ ?>