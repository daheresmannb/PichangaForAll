<!DOCTYPE Html>
<Html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PichangaForAll</title>
     <link rel="shortcut icon" href="<?php echo e(asset('assets/img/favicon.png')); ?>">
    <!-- Fonts -->
    <?php echo Html::style('assets/css/font-awesome.min.css');; ?>

    <!-- Styles -->
    <?php echo Html::style('assets/css/bootstrap.min.css');; ?>

    <?php echo Html::style('assets/css/style.css');; ?>

    <?php echo Html::style('assets/css/bootstrap.css');; ?>

        <?php echo Html::script('assets/js/jquery-3.2.1.js');; ?>

    <?php echo Html::script('assets/js/bootstrap.min.js');; ?>


   <?php echo e(HTML::style('css/busqueda.css')); ?>

   <?php echo e(HTML::script('js/busqueda.js')); ?>

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
    <?php echo Html::script('assets/js/move-top.js');; ?>

    <?php echo Html::script('assets/js/easing.js');; ?>


    <script type="text/javascript">
        jQuery(document).ready(
            function($) {
                $(".scroll").click(
                    function(event){     
                        event.preventDefault();
                        $('Html,body').animate({
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
    <?php echo $__env->yieldContent('funcionesjs'); ?>
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
    <?php echo $__env->yieldContent('jugadoresporlista'); ?>
    <?php echo $__env->yieldContent('jugadorformulario'); ?>
    <?php echo $__env->yieldContent('datosjugador'); ?>
    <?php echo $__env->yieldContent('busquedajugador'); ?>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 id="titulomodal" class="modal-title"></h4>
                </div>
                <div id="textmodal" class="modal-body  justify-content-center" >
                </div> 
                <div class="modal-footer">
                    <button id='confirma-del' value='' class='btn btn-danger'>Confirmar</button>
                    <button id="confirmamodal" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>  
        </div>
    </div>
</body>
</Html>
