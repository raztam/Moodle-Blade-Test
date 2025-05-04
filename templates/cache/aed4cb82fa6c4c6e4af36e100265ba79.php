<div class="local_blade_test">

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0">Blade Demo</h4>
                <span class="badge badge-pill badge-primary"><?php echo e(count($items)); ?> items</span>
            </div>

            <div class="mb-4">
                <?php if($showmessage): ?>
                    <div class="p-3 border-left border-info pl-4" style="border-left-width: 4px !important;">
                        <p class="mb-0"><?php echo e($message); ?></p>
                    </div>
                <?php endif; ?>
            </div>

            <div class="row">
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4 mb-3">
                        <div class="card h-100 <?php echo e($index % 2 == 0 ? 'bg-light' : ''); ?>">
                            <div class="card-body text-center">
                                <h5 class="card-title">Item <?php echo e($index + 1); ?></h5>
                                <p><?php echo e($item); ?></p>
                                <span class="text-muted small">
                                    <?php if($loop->first): ?>
                                        First item
                                    <?php elseif($loop->last): ?>
                                        Last item
                                    <?php else: ?>
                                        Middle item
                                    <?php endif; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div><?php /**PATH /Applications/MAMP/htdocs/moodle404/local/blade_test/templates/view/example.blade.php ENDPATH**/ ?>