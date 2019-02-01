<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo e(route('expences.index')); ?>" class="btn btn-primary btn-lg">Back to Expense</a>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-12">
            <h2 class="title">Edit Expense</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form action="<?php echo e(route('expences.update', $expence->id)); ?>" method="post">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PATCH'); ?>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="text" name="date" id="date" value="<?php echo e($expence->date); ?>" class="form-control bootstrap_datepicker">
                </div>
                <div class="form-group">
                    <label for="name">Expense Title</label>
                    <input type="text" name="name" id="name" value="<?php echo e($expence->name); ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="details">Expense Details</label>
                    <textarea name="details" id="" cols="30" rows="4" class="form-control"><?php echo e($expence->details); ?></textarea>
                </div>
                <div class="form-group">
                    <label for="total">Expense Total</label>
                    <input type="text" name="total" id="total" value="<?php echo e($expence->total); ?>" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update Expense</button>
                </div>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        window.addEventListener('load', function() {
            var app = new Vue({
                el: '#page-content-wrapper',
                data: {
                }
            });
            $('.bootstrap_datepicker').datepicker({
                format: 'yyyy/mm/dd',
                autoclose: true,
                todayHighlight: true,
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>