<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>PichangaForAll</title>
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
	<link href="css/sb-admin.css" rel="stylesheet">
	{!! Html::style('admin/assets/css/themify-icons.css'); !!}
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
	@yield('navbar')
	@yield('contenido')
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
	<script src="vendor/chart.js/Chart.min.js"></script>
	<script src="vendor/datatables/jquery.dataTables.js"></script>
	<script src="vendor/datatables/dataTables.bootstrap4.js"></script>
	<script src="js/sb-admin.min.js"></script>
	<script src="js/sb-admin-datatables.min.js"></script>
	<script src="js/sb-admin-charts.min.js"></script>
</body>


	<script src="growl/javascripts/jquery.growl.js" type="text/javascript"></script>
	<link href="growl/stylesheets/jquery.growl.css" rel="stylesheet" type="text/css" />

<script src="http://localhost:3200/socket.io/socket.io.js"></script>
<script>
  var socket = io.connect('http://localhost:3200');
  socket.on('message', function(msg){
  	console.log(msg);
    $.growl.notice({ title: "En linea", message: msg.mensaje });	 
  });
</script>
</html>