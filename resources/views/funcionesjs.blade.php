@section('funcionesjs')
<script type="text/javascript">
	function InfoModal(titulo, texto) {
		$("#titulomodal").empty();
		$("#titulomodal").append("<p>"+titulo+"</p>");
		$("#textmodal").empty();
		$("#textmodal").append("<p>"+texto+"</p>");
		$("#confirma-del").hide();
		$('#myModal').modal('show');
	}
</script>
@endsection
