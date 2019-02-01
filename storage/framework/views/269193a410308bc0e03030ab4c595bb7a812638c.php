<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo e(route('clients.create')); ?>" class="btn btn-primary btn-lg">Add New Client</a>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-12">
            <h2 class="title">Clients</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-stripped dataTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Client Source</th>
                        <th>Country</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($client->name); ?></td>
                            <td><?php echo e($client->email); ?></td>
                            <td><?php echo e($client->client_source); ?></td>
                            <td><?php echo e($client->country); ?></td>
                            <td>
                                <a href="<?php echo e(route('clients.show', $client->id)); ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                <a href="<?php echo e(route('clients.edit', $client->id)); ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                <form action="<?php echo e(route('clients.destroy', $client->id)); ?>" onclick="return confirm('Are you sure to delete?')" method="post" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field("DELETE"); ?>
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