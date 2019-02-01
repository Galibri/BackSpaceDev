<?php $__env->startSection('content'); ?>
    <div class="row dashboard-row">
        <div class="col-md-12">
            <h3 class="text-center dashboard-heading">Earnings history</h3>
        </div>
        <div class="col-md-3">
            <div class="card text-center text-white bg-orange card-shadow dashboard-cards">
                <div class="card-body">
                    <h5 class="card-title"><?php echo e(date('F')); ?> earnings</h5>
                    <p class="card-text"><span>$</span> <?php echo e($earned_this_month); ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center text-white bg-purple card-shadow dashboard-cards">
                <div class="card-body">
                    <h5 class="card-title"><?php echo e(date('Y')); ?> earnings</h5>
                    <p class="card-text"><span>$</span> <?php echo e($earned_this_year); ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center text-white bg-danger card-shadow dashboard-cards">
                <div class="card-body">
                    <h5 class="card-title">Lifetime Earnings</h5>
                    <p class="card-text"><span>$</span> <?php echo e($earned_lifetime); ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center text-white bg-secondary card-shadow dashboard-cards">
                <div class="card-body">
                    <h5 class="card-title">Upcoming earnings</h5>
                    <p class="card-text"><span>$</span> <?php echo e($upcoming_earning); ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5 dashboard-row">
        <div class="col-md-12 mt-2">
            <h3 class="text-center dashboard-heading">Projects history</h3>
        </div>
        <div class="col-md-3">
            <div class="card text-center text-white bg-info card-shadow dashboard-cards">
                <div class="card-body">
                    <h5 class="card-title">In <?php echo e(date('F')); ?></h5>
                    <p class="card-text"><?php echo e($completed_projects_this_month); ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center text-white bg-success card-shadow dashboard-cards">
                <div class="card-body">
                    <h5 class="card-title">In <?php echo e(date('Y')); ?></h5>
                    <p class="card-text"><?php echo e($completed_projects_this_year); ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center text-white bg-cyan card-shadow dashboard-cards">
                <div class="card-body">
                    <h5 class="card-title">Lifetime</h5>
                    <p class="card-text"><?php echo e($completed_projects_lifetime); ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center text-white bg-grey card-shadow dashboard-cards">
                <div class="card-body">
                    <h5 class="card-title">Upcoming</h5>
                    <p class="card-text"><?php echo e($processing_projects); ?></p>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>