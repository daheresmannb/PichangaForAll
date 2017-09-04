<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PichangaForAll</title>

    <!-- Fonts -->
    <link rel="<?php echo e(elixir('css/font-awesome.min.css')); ?>" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">

    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo e(elixir('css/boostrap.min.css')); ?>" crossorigin="anonymous">
    <?php /* <link href="<?php echo e(elixir('css/app.css')); ?>" rel="stylesheet"> */ ?>
</head>
<body id="app-layout">

    <?php echo $__env->yieldContent('navbar'); ?>
    <?php echo $__env->yieldContent('content'); ?>

    <!-- JavaScripts -->
    <script src="<?php echo e(elixir('js/jquery-3.2.1.js')); ?>" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="<?php echo e(elixir('js/boostrap.min.js')); ?>" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <?php /* <script src="<?php echo e(elixir('js/app.js')); ?>"></script> */ ?>
</body>
</html>
