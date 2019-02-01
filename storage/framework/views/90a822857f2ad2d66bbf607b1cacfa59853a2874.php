<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo e(route('user.index')); ?>" class="btn btn-primary btn-lg">Back to Users</a>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-12">
            <h2 class="title">User Details</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Name: <?php echo e($user->name); ?></h4>
                    <p class="card-text"><strong>Email:</strong> <?php echo e($user->email); ?></p>
                    <p class="card-text"><strong>Role:</strong> <?php echo e($user->roles[0]->display_name); ?></p>
                    <p class="card-text"><strong>Registered:</strong> <?php echo e($user->created_at->format('Y-m-d')); ?></p>
                </div>
            </div>            
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>