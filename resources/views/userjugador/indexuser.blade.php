@extends('layouts.diseñopichanga')
@extends('funcionesjs')
@include('userjugador.sidebar')
@include('userjugador.navbar')

@section('contenido')
<script type="text/javascript">

	$(document).ready(

		function (e) {
			InfoModal("No hay jugadores en un radio de ");
			$('#content').empty();
            $('#content').load(
                "<?php echo url('homeuser'); ?>"
            );
		}
	);
</script>
@endsection