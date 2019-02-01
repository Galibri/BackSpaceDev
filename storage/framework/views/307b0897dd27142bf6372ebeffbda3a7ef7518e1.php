<?php $__env->startSection('content'); ?>
    <div class="row my-3">
        <div class="col-md-12">
            <h2 class="title">Media</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" @change="onChangeFile" multiple>
                    <label class="custom-file-label" for="customFile">Choose file to upload...</label>
                </div>
            </div>
        </div>
    </div>
    <div class="row" v-cloak v-if="progressPercent > 0">
        <div class="col-md-12">
            <div class="progress">
                <div class="progress-bar bg-success" role="progressbar" :style="{width: progressPercent + '%'}"
                    :aria-valuenow="progressPercent" aria-valuemin="0" aria-valuemax="100">{{ progressPercent }} %</div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <?php $__currentLoopData = $allFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-4 mb-2">
                <div class="media-img-container mb-4" style="background-image: url(<?php echo e(url('/') . '/' . $file->directory . '/' . rawurlencode($file->name)); ?>)"></div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        window.addEventListener('load', function() {
            var app = new Vue({
                el: '#page-content-wrapper',
                data: {
                    attachments: [],
                    postFormData: new FormData,
                    progressPercent: 0
                },
                methods: {
                    onChangeFile(event) {
                        this.progressPercent = 0;

                        let selectedFiles = event.target.files;

                        for(let i = 0; i<selectedFiles.length; i++) {
                            this.attachments.push(selectedFiles[i]);
                        }

                        for(let i = 0; i<this.attachments.length; i++) {
                            this.postFormData.append('pics[]', this.attachments[i]);
                        }
                        
                        const config = { 
                            headers: {'Content-Type': 'multipart/form-data'},
                            onUploadProgress: (event) => {
                                let progressRun = event.loaded;
                                let progressTotal = event.total;
                                this.progressPercent = Math.round((progressRun * 100) / progressTotal);
                            }
                        };

                        axios.post("<?php echo e(route('files.store')); ?>", this.postFormData, config)
                            .then(response => {
                                this.attachments = [];
                                this.postFormData = new FormData;
                            })
                            .catch(err => console.log(err));
                    }
                }
            });
        });

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>