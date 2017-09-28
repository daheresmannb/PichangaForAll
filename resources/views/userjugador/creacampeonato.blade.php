@extends('layouts.app')
@extends('funcionesjs')
@section('creacapeonato')

<style>
       #contus {
        height: 370px;
        width: 100%;
       }
</style>

<div id="contus" class="container">
  <div class="mainbody container-fluid">
    <div class="row">
        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">

        </div>
        
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

		
    </div>    
  </div>
</div>



@endsection