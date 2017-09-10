
<html>
<head>
	<script type="text/javascript">
		var centreGot = false;
	</script>
	{!! $map['js'] !!} 
	
</head>
<body>
{!! Form::open(['route' => array('latlng.dir',)]) !!}

<div class="form-group has-feedback">
    {!! Form::label('Direccion') !!}
    {!! Form::text(
            'direccion', 
            null, 
            array(
              'required', 
              'class'=>'form-control', 
              'id'=>'direccion',
              'name'=>'direccion'
            )) 
          !!}
</div>
<div class="form-group has-feedback" style="padding-left:3%; padding-right:35%; padding-top: 1%">
    {!! Form::submit(
      'Actualizar', 
      array(
        'class'=>'btn btn-primary btn-lg btn-block'
      ))
    !!}
</div>
{!! Form::close() !!}

{!! $map['html'] !!}
	
</body>
</html>


