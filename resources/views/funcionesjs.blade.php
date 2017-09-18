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

	$(document).ready(
		function(e) {
			$("#jugc").click(
				function(e) {
					e.preventDefault();
					alert('holaaaaaaaaaaaaaaaa');
					$('#content').load('/gmaps');
				
					
				}
			);

			$("userli").click(
				function(e) {
					$(this).attr('class', 'active');
					$('#mapli').attr('class', '.');
					
				}
			);


			navli
		}
	);
</script>
@endsection