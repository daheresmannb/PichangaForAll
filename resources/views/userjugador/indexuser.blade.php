@extends('layouts.diseñopichanga')
@extends('funcionesjs')
@include('userjugador.sidebar')
@include('userjugador.navbar')

@section('contenido')
@if(session('respuesta'))
    <?php 
        $resp = session('respuesta');
    ?>
    <script type="text/javascript">
        $(document).ready(
            function(e) {
                alert("<?php echo $resp['respuesta'];?>");
            }
        );
    </script>
@endif



<script type="text/javascript">
	$(document).ready(
		function(e) {
			$('#content').empty();
            $('#content').load(
                "<?php echo url('homeuser'); ?>"
            );
		}
	);
</script>
@endsection