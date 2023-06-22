<div class="relative font-poppins antialiased" x-data="{ open: false }">

    <div class="z-50 ml-4 absolute top-[80px]">

        <button @click="open = !open"
            class="flex justify-end md:hidden p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
            <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{'hidden': !open, 'inline -flex': open}" class="inline-flex" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

    </div>

    <div id="view" class="w-11/12 absolute top-[66px] z-10 ml-2 border border-green-500" :class="{'': open}">

        <div class="h-screen fixed w-[180px] md:w-[240px] bg-white hidden md:block shadow-xl px-3 transition-transform duration-300
                    ease-in-out rounded-lg" :class="{'w-[144]': open, 'hidden': !open}" id="sidebar">

            <div class="mt-5 h-screen overflow-y-auto">
                <?php echo e($head); ?>


                
                

                
                <?php $__currentLoopData = $sidebars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sidebar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo get_defined_vars()[$sidebar]; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <div class="absolute top-20 xs:left-60 xl:left-80 lg:w-5/6 md:2/6 bg-gray-100 border-red-900
                                grid grid-cols-1 gap-4 p-2 rounded grid-flow-row justify-items-start">
            <div class="">
                <?php echo e($bodyhead); ?>

            </div>
        </div>

        <?php echo e($items); ?>


    </div>

</div>
<?php /**PATH /var/www/natan_blog/resources/views/components/sidebar-traits.blade.php ENDPATH**/ ?>