<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo e(route('posts.index')); ?>" class="btn btn-primary btn-lg">Back to Posts</a>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-12">
            <h2 class="title">Create Post</h2>
            <hr>
        </div>
    </div>
    <form action="<?php echo e(route('posts.store')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-md-9">
                <div class="form-group">
                    <input type="text" name="title" id="title" v-model="title" class="form-control" placeholder="Title...">
                </div>
                <slug-widget url="<?php echo e(url('/')); ?>/" :title="title" @slug-changed="updateSlug" api_token="<?php echo e(auth()->user()->api_token); ?>"></slug-widget>
                <input type="hidden" :value="slug" name="slug">
                <div class="form-group">
                <textarea name="content" class="form-control" id="tinycontent" cols="30" rows="20" placeholder="Type your content..."></textarea>
                </div>   
            </div>
            <div class="col-md-3">
                <div class="card mb-2">
                    <div class="card-header">
                        <strong>Action</strong>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><i class="fa fa-book"></i> <span class="draft">Unpublished</span></p>
                        <div class="form-group">
                            <button type="submit" name="draft" class="btn btn-outline-dark btn-light">Draft</button>
                            <button type="submit" name="save" class="btn btn-primary">Publish Post</button>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header">
                    <strong>Category</strong>
                    </div>
                    <div class="card-body">
                        <div class="post-categories">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" value="<?php echo e($category->id); ?>" v-model="post_categories">
                                    <?php echo e($category->name); ?>

                                  </label>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <input type="hidden" :value="post_categories" name="post_cats">
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header">
                    <strong>Author</strong>
                    </div>
                    <div class="card-body">
                        <select name="post_author" class="form-control" v-model="author_name">
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </form>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        window.addEventListener('load', function() {
            var app = new Vue({
                el: '#page-content-wrapper',
                data: {
                    title: '',
                    slug: '',
                    post_categories: [1],
                    author_name: '<?php echo auth()->user()->id; ?>',
                },
                methods: {
                    updateSlug: function(val) {
                        this.slug = val;
                    }
                }
            });
            // TinyMce Editor
            CKEDITOR.replace( 'tinycontent' );
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>