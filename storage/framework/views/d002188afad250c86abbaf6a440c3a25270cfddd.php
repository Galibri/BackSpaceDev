<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo e(route('posts.create')); ?>" class="btn btn-primary btn-lg">Add New Post</a>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-12">
            <h2 class="title">Posts</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-stripped dataTable">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Post Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($post->title); ?></td>
                            <td><?php echo e($post->user->name); ?></td>
                            <td><?php echo e($post->status == 0 ? 'Draft': 'Published'); ?></td>
                            <td>
                                <a href="<?php echo e(route('posts.edit', $post->id)); ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                <form action="<?php echo e(route('posts.destroy', $post->id)); ?>" method="post" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>