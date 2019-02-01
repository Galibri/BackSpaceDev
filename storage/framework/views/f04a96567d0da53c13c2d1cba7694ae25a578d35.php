<?php $__env->startSection('content'); ?>
<style>
 @keyframes  color-animation {
    0% {
       background: #7986cb;
    }
    25% {
       background: #9575cd;
    } 
    50% {
       background: #64b5f6;
    }
    60% {
       background: #4db6ac;
    }
    70% {
       background: #4dd0e1;
    }
    80% {
       background: #4fc3f7;
    }
    100% {
       background: #78909c;
    }
 }
body {
   width: 100%;
   height: 100%;
   font-size: 19px;
   animation: color-animation 40s infinite linear alternate;
}
nav {
    animation: color-animation 40s infinite linear alternate;
}
.navbar-brand {
    font-size: 42px;
}
h3 {
    text-transform: uppercase;
}
</style>
<div class="container text-light">
    <div class="row pt-2">
        <div class="col-md-12">
            <a class="navbar-brand text-light" href="<?php echo e(url('/')); ?>">
                <?php echo e(config('app.name', 'BackSpaceDev')); ?>

            </a>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-md-6 pb-5">
            <h3>What we do?</h3>
            <ul class="list-group ml-3">
                <li class="list-group-item-single">Website Design & Development</li>
                <li class="list-group-item-single"><strong>Laravel</strong> Application Development</li>
                <li class="list-group-item-single"><strong>WordPress <i class="fa fa-wordpress"></i></strong> website/template Development</li>
                <li class="list-group-item-single">WordPress plugin Development</li>
                <li class="list-group-item-single">Laravel/Lumen/<strong>RESTful API</strong> development</li>
                <li class="list-group-item-single"><strong>Shopify</strong> store development</li>
            </ul>
            <h2 class="pt-5"><i class="fa fa-chrome"></i> Learn more from Partner website</h2>
            <a href="https://galibweb.com/portfolio/" class="btn btn-dark btn-sm" target="_blank">GalibWeb partner with BackSpaceDev</a>
        </div>
        <div class="col-md-6">
            <h3><i class="fa fa-tags"></i> Hire us!</h3>
            <p class="button-elements">
                <a href="https://www.upwork.com/fl/galibri" class="btn btn-dark btn-sm" target="_blank">UpWork</a>
                <a href="https://www.fiverr.com/galibasad" class="btn btn-dark btn-sm" target="_blank">Fiverr</a>
                <a href="https://www.freelancer.com/u/galibri" class="btn btn-dark btn-sm" target="_blank">Freelancer</a>
            </p>
            <h3 class="pt-4"><i class="fa fa-tags"></i> Portfolio</h3>
            <p class="portfolio-items">
                <a href="https://galibweb.com/portfolio/" class="btn btn-dark btn-sm" target="_blank">View Sample</a>
                <a href="https://www.upwork.com/fl/galibri" class="btn btn-dark btn-sm" target="_blank">View On UpWork</a>
                <a href="https://www.fiverr.com/galibasad" class="btn btn-dark btn-sm" target="_blank">View On Fiverr</a>
                <a href="https://github.com/Galibri?tab=repositories" class="btn btn-dark btn-sm" target="_blank">GitHub <i class="fa fa-github"></i></a>
            </p>
            <h3 class="pt-4"><i class="fa fa-tags"></i> Get Consulation / Leave a message</h3>
            <p class="consultation-items">
                <a href="mailto:galibweb@gmail.com" class="btn btn-dark btn-sm">Email <i class="fa fa-envelope"></i></a>
                <a href="skype:galibluc?chat" class="btn btn-dark btn-sm">Skype <i class="fa fa-skype"></i></a>
                <a href="https://www.upwork.com/fl/galibri" class="btn btn-dark btn-sm" target="_blank">UpWork</a>
                <a href="https://www.fiverr.com/galibasad" class="btn btn-dark btn-sm" target="_blank">Fiverr</a>
            </p>
            <p><i class="fa fa-envelope"></i> info@BackSpaceDev.com</p>
            <p><i class="fa fa-envelope"></i> galibweb@gmail.com</p>
        </div>
    </div>
    <div class="row pt-5">
        <div class="col-md-12">
            <h4 class="text-center"> <i class="fa fa-money"></i> <i>USD $12/hour for your next projects!</i> <i class="fa fa-money"></i></h4>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>