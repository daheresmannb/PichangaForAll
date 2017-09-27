@extends('layouts.app')
@extends('funcionesjs')
@section('creacapeonato')
<class ="container">
<script>

</script>

<h1>campeonatos</h1>
<label>buscar campeonato</label>
<label>crear campeonato</label>
<div>
{!! Form::button('unirse a torneo', array('onclick' => "")) !!}
{!! Form::button('Crear torneos', array('onclick' => "")) !!}

</div>

<div>
	<table id="" class="table table-hover table-striped">
<thead>
	<th>partido</th>
	<th>lugar</th>
	<th>ver</th>    
 </thead>
<tbody>
	<td>aqui</td>
	<td>aca</td>
	<td>alla</td>
</tbody>
</table>

</div>






</class>


@endsection