@extends('layouts.app')
@section('busquedajugador')

<div class="container">

   {{ Html::style('css/busqueda.css') }}
    {{ Html::script('js/busqueda.js') }}
	<div class="row">

		<section class="content">
			

			<h1>Buscar Jugador por nombre</h1>


			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="pull-right">
							<div class="btn-group">

							<div class="input-group input-group-sm">
  <span class="input-group-addon">@</span>
  <input type="text" class="form-control" placeholder="Nombre de usuario">
</div>
								<button type="button" class="btn btn-success btn-filter" data-target="pagado">Buscar</button>
							</div>
						</div>
						<div class="table-container">
							<table class="table table-filter">
								<tbody>
									<tr data-status="">
										<td>
										</td>
										<td>
											<a href="javascript:;" class="star">
												<i class="glyphicon glyphicon-star"></i>
											</a>
										</td>
										<td>
											<div class="media">
												<a href="#" class="pull-left">
													<img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">
												</a>
												<div class="media-body">
													<h4 class="title">Daniel Heresmann
													</h4>
													<p>jonhy f.c</p>
												</div>
											</div>
										</td>
									</tr>
									<tr data-status="pendiente">
										<td>
										</td>
										<td>
											<a href="javascript:;" class="star">
												<i class="glyphicon glyphicon-star"></i>
											</a>
										</td>
										<td>
											<div class="media" >
												<a href="#" class="pull-left">
													{{ HTML::image('assets/img/yodaa.png', "Imagen no encontrada", array('id' => 'yoda', 'title' => 'yoda')) }}
												</a>
										





												<div class="media-body">
													<h4 class="title">
														Tintolio
													</h4>
													<p class="summary"> los yoda f.c</p>
												</div>
											</div>
										</td>
									</tr>
									<tr data-status="cancelado">
										<td>

										</td>
										<td>
											<a href="javascript:;" class="star">
												<i class="glyphicon glyphicon-star"></i>
											</a>
										</td>
										<td>
											<div class="media">
												<a href="#" class="pull-left">
													<img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">
												</a>
												<div class="media-body">
													<h4 class="title">
														alex contrera
													</h4>

												</div>
											</div>
										</td>
									</tr>
									<tr data-status="pagado" class="selected">
										<td>

										</td>
										<td>
											<a href="javascript:;" class="star star-checked">
												<i class="glyphicon glyphicon-star"></i>
											</a>
										</td>
										<td>
											<div class="media">
												<a href="#" class="pull-left">
													<img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">
												</a>
												<div class="media-body">
													<h4 class="title">
														arturo vidal		
													</h4>
													<p class="summary">team pilsen f.c.</p>
												</div>
											</div>
										</td>
									</tr>
									<tr data-status="pendiente">
										<td>

										</td>
										<td>
											<a href="javascript:;" class="star">
												<i class="glyphicon glyphicon-star"></i>
											</a>
										</td>
										<td>
											<div class="media">
												<a href="#" class="pull-left">
													<img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">
												</a>
												<div class="media-body">
													<h4 class="title">
													ivan zamorano
													</h4>
												</div>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				
			</div>
		</section>
		
	</div>






</div>

@endsection