<!DOCTYPE html>
<html style="scroll-behavior: smooth;" lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" class="dark">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

  <title>Forume - <?php echo $__env->yieldContent('title'); ?></title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

  <!-- Styles -->
  <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">

  <!-- Scripts -->
  <script>
    window.matchMedia('(prefers-color-scheme: dark)')
      .addEventListener('change', e => {
        if (localStorage.theme === 'system') {
          if (e.matches) {
            document.documentElement.classList.add('dark');
          } else {
            document.documentElement.classList.remove('dark');
          }
        }
      });

    function updateTheme() {
      if (!('theme' in localStorage)) {
        localStorage.theme = 'light';
      }

      switch (localStorage.theme) {
        case 'system':
          if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
            document.documentElement.classList.add('dark');
          } else {
            document.documentElement.classList.remove('dark');
          }
          document.documentElement.setAttribute('color-theme', 'system');
          break;

        case 'dark':
          document.documentElement.classList.add('dark');
          document.documentElement.setAttribute('color-theme', 'dark');
          break;

        case 'light':
          document.documentElement.classList.remove('dark');
          document.documentElement.setAttribute('color-theme', 'light');
          break;
      }
    }

    updateTheme();
  </script>

  <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
</head>

<body class="bg-gray-200 dark:bg-gray-800 min-h-screen antialiased">
  <div id="main" class="main" v-cloak>
    
    <a class="<?php if(request()->routeIs('post.create')): ?> hidden <?php endif; ?>" href="<?php echo e(route('post.create')); ?>">
      <div class="bg-blue-900 hover:bg-blue-800 dark:bg-blue-800 hover:dark:bg-blue-700 h-12 w-12 rounded-full fixed z-50 bottom-10 right-7 grid place-items-center lg:hidden">
        <span class="text-gray-50 font-black text-4xl">+</span>
      </div>
    </a>
    

    <header class="px-2 sm:px-4 md:px-6 pt-6 pb-3 bg-white dark:bg-gray-800 dark:text-gray-100 shadow-md relative">
      <div class="max-w-7xl font-semibold mx-auto">
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.forume.mobile-header','data' => []]); ?>
<?php $component->withName('forume.mobile-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        <?php echo $__env->make('components.forume.desktop-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
    </header>
    <clip-design></clip-design>

    <!-- <main class="font-sans antialiased mx-auto my-10 flex gap-x-10 px-2 sm:px-4 md:px-6 lg:px-0 w-screen max-w-7xl"> -->
    <main class="mx-auto my-10 gap-x-5 md:px-6 xl:px-0 flex justify-between max-w-7xl overflow-hidden">
      <!-- <div class="hidden md:w-2/12 md:block"> -->
      <div class="hidden md:block md:w-[25%] lg:block lg:w-1/6">
        <nav class="flex flex-col dark:text-gray-200">

          <div class="py-2 inline-flex w-full border-l-4 border-transparent">
            <div class="w-7 h-7 mr-2 ml-5"></div>
            Menu
          </div>

          <a href="<?php echo e(route('post.index')); ?>" class="mb-3">
            <div class="py-2 inline-flex w-full border-l-4 border-transparent rounded
         <?php if(request()->routeIs('post.index')): ?> bg-blue-100 dark:text-gray-900 dark:bg-gray-400 border-blue-900 <?php endif; ?>">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 ml-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
              </svg>
              Explore Topics
            </div>
          </a>

          <a href="<?php echo e(route('user.posts')); ?>" class="mb-3">
            <div class="py-2 inline-flex w-full border-l-4 border-transparent rounded <?php if(request()->routeIs('user.posts')): ?> bg-blue-100 dark:text-gray-900 dark:bg-gray-400 border-blue-900 <?php endif; ?>">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 ml-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              My Topics
            </div>
          </a>

          <a href="<?php echo e(route('my-comments')); ?>" class="mb-3">
            <div class="py-2 inline-flex w-full border-l-4 border-transparent rounded <?php if(request()->routeIs('my-comments')): ?> ) bg-blue-100 dark:text-gray-900 dark:bg-gray-400 border-blue-900 <?php endif; ?>">
              <svg class="w-6 h-6 mr-2 ml-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
              </svg>
              My Answers
            </div>
          </a>

          <a href="<?php echo e(route('category.index')); ?>" class="mb-3">
            <div class="py-2 inline-flex w-full border-l-4 border-transparent rounded <?php if(request()->routeIs('category.index')): ?> bg-blue-100 dark:text-gray-900 dark:bg-gray-400 border-blue-900 <?php endif; ?>">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 ml-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
              </svg>
              Categories
            </div>
          </a>

          <?php if(auth()->guard()->check()): ?>
          <?php if(auth()->user()->isAdmin()): ?>
          <a href="<?php echo e(route('admin.home')); ?>" class="mb-3">
            <div class="py-2 inline-flex w-full border-l-4 border-transparent rounded <?php if(request()->routeIs('admin.home')): ?> bg-blue-100 dark:text-gray-900 dark:bg-gray-400 border-blue-900 <?php endif; ?>">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7  mr-2 ml-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              Admin
            </div>
          </a>
          <?php endif; ?>
          <?php endif; ?>

          <a href="<?php echo e(route('users')); ?>" class="mb-1">
            <div class="py-2 inline-flex w-full border-l-4 border-transparent rounded <?php if(request()->routeIs('users')): ?> bg-blue-100 dark:text-gray-900 dark:bg-gray-400 border-blue-900 <?php endif; ?>">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 ml-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
              </svg>
              All Users
            </div>
          </a>

          <?php if(auth()->guard()->check()): ?>

          <a href="<?php echo e(route('setting.index')); ?>" class="mb-1">
            <div class="py-2 inline-flex w-full border-l-4 border-transparent rounded <?php if(request()->routeIs('setting.index')): ?> bg-blue-100 dark:text-gray-900 dark:bg-gray-400 border-blue-900 <?php endif; ?>">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 mr-2 ml-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
              Settings
            </div>
          </a>

          <?php endif; ?>

        </nav>

        <div class="mt-10 lg:hidden">
          <h2 class="font-semibold mb-2 dark:text-gray-200">Top Users</h2>

          <div class="grid gap-y-2 mb-20 shadow-lg rounded-md p-3 bg-gray-100 dark:bg-gray-700 dark:text-gray-200">
            <?php $__currentLoopData = \App\Models\User::withCount('posts')->orderBy('posts_count', 'desc')->take(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="grid grid-cols-8">
              <img <?php if($user->profile->file): ?> src="/uploads/<?php echo e($user->profile->file->file); ?>"
              <?php else: ?> src="/image-header.jpg" <?php endif; ?>
              class="mr-2 w-4 h-4 object-center object-cover rounded-full">

              <span class="text-blue-900 dark:text-gray-300 font-semibold text-xs col-span-5"><a href="<?php echo e(route('profile.show', $user->profile->name)); ?>"><?php echo e($user->name); ?></a></span>

              <span><?php echo e($user->posts_count); ?></span>

              <span>
                <svg class="fill-current text-gray-400 dark:text-gray-400 w-4 h-6" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 330 330" xml:space="preserve">
                  <path id="XMLID_29_" d="M100.606,100.606L150,51.212V315c0,8.284,6.716,15,15,15c8.284,0,15-6.716,15-15V51.212l49.394,49.394
         C232.322,103.535,236.161,105,240,105c3.839,0,7.678-1.465,10.606-4.394c5.858-5.857,5.858-15.355,0-21.213l-75-75
         c-5.857-5.858-15.355-5.858-21.213,0l-75,75c-5.858,5.857-5.858,15.355,0,21.213C85.251,106.463,94.749,106.463,100.606,100.606z" />
                </svg></span>

            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </div>
        </div>



      </div>

      <div class="w-full px-2 sm:px-4 md:px-0 lg:px-0 md:w-[75%] lg:w-[63%]">
        <?php echo $__env->yieldContent('section'); ?>
      </div>

      <!-- <div class="lg:w-2/12 hidden lg:block pr-6 xl:pr-0"> -->
      <div class="hidden lg:block lg:w-1/6">

        <a href="<?php echo e(route('post.create')); ?>">
          <div class="pt-1 pb-2 px-1 bg-blue-900 text-gray-100 font-semibold mb-3 hover:bg-blue-800 mt-4 text-center rounded-md">
            <span class="text-lg">+</span>
            <span class="ml-2 text-sm">Start a New Topic</span>
          </div>
        </a>

        <div class="mt-10">
          <h2 class="font-semibold mb-2 dark:text-gray-100">Top Users</h2>

          <div class="grid gap-y-2 mb-20 shadow-lg rounded-md p-3 bg-gray-100 dark:bg-gray-700 dark:text-gray-200">
            <?php $__currentLoopData = \App\Models\User::withCount('posts')->orderBy('posts_count', 'desc')->take(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="grid grid-cols-8">
              <img <?php if($user->profile->file): ?> src="/uploads/<?php echo e($user->profile->file->file); ?>"
              <?php else: ?> src="/image-header.jpg" <?php endif; ?>
              class="mr-2 w-4 h-4 object-center object-cover rounded-full">

              <span class="text-blue-900 dark:text-gray-300 font-semibold text-xs col-span-5"><a href="<?php echo e(route('profile.show', $user->profile->name)); ?>"><?php echo e($user->name); ?></a></span>

              <span><?php echo e($user->posts_count); ?></span>

              <span>
                <svg class="fill-current text-gray-400 dark:text-gray-400 w-4 h-6" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 330 330" xml:space="preserve">
                  <path id="XMLID_29_" d="M100.606,100.606L150,51.212V315c0,8.284,6.716,15,15,15c8.284,0,15-6.716,15-15V51.212l49.394,49.394
         C232.322,103.535,236.161,105,240,105c3.839,0,7.678-1.465,10.606-4.394c5.858-5.857,5.858-15.355,0-21.213l-75-75
         c-5.857-5.858-15.355-5.858-21.213,0l-75,75c-5.858,5.857-5.858,15.355,0,21.213C85.251,106.463,94.749,106.463,100.606,100.606z" />
                </svg></span>

            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </div>
        </div>


        <div class="flex justify-between text-xs font-semibold text-gray-500 dark:text-gray-300 p-4 bg-gray-100 dark:bg-gray-700 shadow rounded-md">

          <div class="grid gap-y-2">
            <a href="#">Help</a>
            <a href="#">ForumePro</a>
            <a href="#">Topics</a>
            <a href="#">Top Topics</a>
            <a href="#">Blog</a>
            <a href="#">Advertise</a>
          </div>

          <div class="grid">
            <a href="#">About</a>
            <a href="#">Careers</a>
            <a href="#">Press</a>
            <a href="#">Terms</a>
            <a href="#">Privacy Policy</a>

          </div>
        </div>

      </div>

    </main>

    <div class="flex lg:hidden justify-evenly text-gray-500 dark:text-gray-300">
      <div class="grid">
        <a href="#">Help</a>
        <a href="#">ForumePro</a>
        <a href="#">Topics</a>
        <a href="#">Top Topics</a>
        <a href="#">Blog</a>
        <a href="#">Advertise</a>
      </div>

      <div class="grid">
        <a href="#">About</a>
        <a href="#">Careers</a>
        <a href="#">Press</a>
        <a href="#">Terms</a>
        <a href="#">Privacy Policy</a>

      </div>
    </div>

    <br>
    <br>
    <br>
  </div>
</body>

</html><?php /**PATH C:\laragon\www\Forume\resources\views/layouts/app.blade.php ENDPATH**/ ?>