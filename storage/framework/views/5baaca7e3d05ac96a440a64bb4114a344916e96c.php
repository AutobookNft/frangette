<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.collections.layout-item','data' => ['drop' => ''.e($drop).'','dropTitle' => ''.e($drop->title).'','collectionDrop' => 'drop','datecreation' => $item['creation_date'],'description' => $item['description'],'extention' => $item['extention'],'thumbnails' => $item['thumbnail'],'title' => $item['title'],'webp' => $item['webp'],'show' => $item['show'],'itemId' => ''.e($item['id']).'','imagefile' => ''.e($item['hash_file']).'','fileCover' => ''.e($fileCover).'','pathfile' => ''.e($item['item']).'','filename' => ''.e($filename).'','price' => ''.e($item['price']).'','hasHfile' => ''.e($item['hash_file']).'','imagetitle' => ''.e($imagetitle).'','cardType' => $cardType,'itemType' => $itemType,'item' => $item]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('collections.layout-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['drop' => ''.e($drop).'','dropTitle' => ''.e($drop->title).'','collectionDrop' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('drop'),'datecreation' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item['creation_date']),'description' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item['description']),'extention' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item['extention']),'thumbnails' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item['thumbnail']),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item['title']),'webp' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item['webp']),'show' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item['show']),'itemId' => ''.e($item['id']).'','imagefile' => ''.e($item['hash_file']).'','fileCover' => ''.e($fileCover).'','pathfile' => ''.e($item['item']).'','filename' => ''.e($filename).'','price' => ''.e($item['price']).'','hasHfile' => ''.e($item['hash_file']).'','imagetitle' => ''.e($imagetitle).'','cardType' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($cardType),'itemType' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($itemType),'item' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH /var/www/natan_blog/resources/views/livewire/collections/collection-drop-item.blade.php ENDPATH**/ ?>