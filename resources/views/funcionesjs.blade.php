@section('funcionesjs')
<script type="text/javascript">


	$(document).ready(
		function(e) {
			$("#jugc").click(
				function(e) {
					e.preventDefault();
					
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