<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo e(route('projects.index')); ?>" class="btn btn-primary btn-lg">Back to Projects</a>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-12">
            <h2 class="title">Edit Project</h2>
            <hr>
        </div>
    </div>
    <form action="<?php echo e(route('projects.update', $project->id)); ?>" method="post">
        <div class="row">
            <div class="col-md-6">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PATCH'); ?>
                <div class="form-group">
                    <label for="display_name">Select Client</label>
                    <select v-model="selectedClient" name="client_id" id="" class="form-control">
                        <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($client->id); ?>"><?php echo e($client->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Project Name</label>
                    <input type="text" name="name" class="form-control" value="<?php echo e($project->name); ?>">
                </div>
                <div class="form-group">
                    <label for="name">Details</label>
                    <textarea name="details" id="details" cols="30" rows="8" class="form-control"><?php echo e($project->details); ?></textarea>
                </div>
                <div class="form-group">
                    <label for="estimated_amount">Estimated Budget</label>
                    <input type="text" name="estimated_amount" class="form-control" value="<?php echo e($project->estimated_amount); ?>">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Create Project</button>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="estimated_time">Estimated Time</label>
                    <input type="text" name="estimated_time" class="form-control" value="<?php echo e($project->estimated_time); ?>">
                </div>
                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input type="text" name="start_date" class="form-control bootstrap_datepicker" value="<?php echo e($project->start_date); ?>" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input type="text" name="end_date" class="form-control bootstrap_datepicker" value="<?php echo e($project->end_date); ?>" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select v-model="selectedStatus" name="status" id="" class="form-control">
                        <option value="0">Processing</option>
                        <option value="1">Completed</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="comments">Comments</label>
                    <input type="text" name="comments" class="form-control" value="<?php echo e($project->comments); ?>">
                </div>
                <div class="form-group">
                    <label for="file_location">File Location</label>
                    <input type="text" name="file_location" class="form-control" value="<?php echo e($project->file_location); ?>">
                </div>
            </div>
        </div>
    </form>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        window.addEventListener('load', function() {
            var app = new Vue({
                el: '#page-content-wrapper',
                data: {
                    selectedClient: <?php echo e($project->client_id); ?>,
                    selectedStatus: <?php echo e($project->status); ?>,
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