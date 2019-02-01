<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo e(route('roles.index')); ?>" class="btn btn-primary btn-lg">Back to Roles</a>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-12">
            <h2 class="title">Create Role</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form action="<?php echo e(route('roles.store')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="display_name">Display Name</label>
                    <input type="text" name="display_name" id="display_name" value="<?php echo e(old('display_name')); ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="<?php echo e(old('name')); ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description" value="<?php echo e(old('description')); ?>" class="form-control">
                </div>
                <hr>
                <h3>Permissions:</h3>
                <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-group">
                        <label class="btn btn-outline-default">
                            <input type="checkbox" value="<?php echo e($permission->id); ?>" v-model.number="roles" checked autocomplete="off"> <?php echo e($permission->display_name); ?> (<?php echo e($permission->name); ?>)
                        </label>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <input type="hidden" :value="roles" name="permission_ids">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Create Role</button>
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
                    roles: []
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>