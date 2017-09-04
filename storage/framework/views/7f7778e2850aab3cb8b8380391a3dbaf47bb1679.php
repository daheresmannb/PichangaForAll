<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PichangaForAll</title>
     <link rel="shortcut icon" href="<?php echo e(asset('assets/img/favicon.png')); ?>">
    <!-- Fonts -->
    <?php echo Html::style('assets/css/font-awesome.min.css');; ?>

    <!-- Styles -->
    <?php echo Html::style('assets/css/boostrap.min.css');; ?>

    <?php echo Html::style('assets/css/style.css');; ?>

    <?php echo Html::style('assets/css/bootstrap.css');; ?>

        <?php echo HTML::script('assets/js/jquery-3.2.1.js');; ?>

    <?php echo Html::script('assets/js/boostrap.min.js');; ?>


    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <script type="application/x-javascript"> 
        addEventListener(
            "load", 
            function() { 
                setTimeout(hideURLbar, 0); 
            }, 
            false
        ); 
        function hideURLbar() { 
            window.scrollTo(0,1); 
        } 
    </script>
    <?php echo HTML::script('assets/js/move-top.js');; ?>

    <?php echo HTML::script('assets/js/easing.js');; ?>


    <script type="text/javascript">
        jQuery(document).ready(
            function($) {
                $(".scroll").click(
                    function(event){     
                        event.preventDefault();
                        $('html,body').animate({
                            scrollTop:$(this.hash).offset().top
                        },1000);
                    }
                );
            }
        );
    </script>
<!-- start-smoth-scrolling -->
<!-- animated-css -->
    <?php echo Html::style('assets/css/animate.css');; ?>

    <?php echo Html::script('assets/js/wow.min.js');; ?>

    <script>
        new WOW().init();
    </script>

</head>
<body>
    <?php echo $__env->yieldContent('header'); ?>
    <?php echo $__env->yieldContent('banner'); ?>
    <?php echo $__env->yieldContent('servicios'); ?>
    <?php echo $__env->yieldContent('portafolio'); ?>
    <?php echo $__env->yieldContent('acerca'); ?>
    <?php echo $__env->yieldContent('habilidades'); ?>
    <?php echo $__env->yieldContent('contacto'); ?>
    <?php echo $__env->yieldContent('footer'); ?>
    <?php echo $__env->yieldContent('login'); ?>
    <?php echo $__env->yieldContent('content'); ?>

</body>
</html>
