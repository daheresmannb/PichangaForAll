@extends('layouts.diseñopichanga')
@extends('funcionesjs')
@include('userjugador.sidebar')
@include('userjugador.navbar')

@section('contenido')
<script type="text/javascript">
	$(document).ready(
		function (e) {
			$('#content').empty();
            $('#content').load(
                "<?php echo url('homeuser'); ?>"
            );
		}
	);
</script>
@endsection