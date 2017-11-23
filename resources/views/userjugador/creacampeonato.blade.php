@extends('funcionesjs')

@if(session('torneos'))
<script type="text/javascript">
    $(document).ready(
        function () {
            alert("holaaaaaa");
        }
    );
</script>
@endif




<!--datepicker-->
{!!Html::style('assets/css/jquery.datetimepicker.min.css'); !!}
{!!Html::script('assets/js/jquery.datetimepicker.full.js'); !!}

<script type="text/javascript">
$(document).ready(
    function() {
        $("#listrecinto").change(
            function () {
                $("#id_recinto").val(
                    $('#listrecinto').find(":selected").val()
                );
                $("#id_recinto:text").val(
                    $('#listrecinto').find(":selected").val()
                );
            }
        );
        $.ajax({
            type: 'POST',
            url:  "<?php echo url('recinto/obtener'); ?>",
            headers: {
                'X-CSRF-TOKEN': "<?php echo csrf_token(); ?>"
            },
            data: {
                _token: {
                    'X-CSRF-TOKEN': "<?php echo csrf_token(); ?>"
                }
            },
            success: function(data) {
                console.log(data.respuesta);
                $("#listrecinto").empty();
                for (var i = data.respuesta.length - 1; i >= 0; i--) {
                    $("#listrecinto").append(
                        "<option value='"+data.respuesta[i].id+"'>"+ data.respuesta[i].nombre +"</option>"
                    );
                }
            },
            error: function(xhr, textStatus, thrownError) {
                console.log(thrownError +"error "+ textStatus);
            }
        });
    }
);
</script>

<!-- inicio modal-->
<div  class="modal face" id="creartorneo" tabindex="1" role="dialog" aria-labelledby="creartorneo" aria-hidden="true">
    <div class="modal-dialog" role="documen">
        <div class="modal-content">
            {!! Form::open(['route' => array('torneo.crear', )]) !!}

            <input type="hidden" name="id_encargado" value="{{  Auth::user()->id }}">
            <div class="modal-header">
                <h4 class="modal-title"> Crear Torneo</h4>
                <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div> <!-- fin modal-header-->
            <div class="modal-body">
                <label class="col-md-6 col">seleccione recinto</label>
                <select class="selectpicker" id="listrecinto" name="id_recinto">
                    <option value="0">waaa</option>
                </select>
                <span class="help-block"></span>
                <div class="form-horizontal row" >
                    <label class="col-md-6 col">fecha y hora de inicio</label>
                    <input id="partidotime" name="inicio" class="col-md-6 col">
                </div>
                <span class="help-block"></span>
                <div class="form-horizontal row">
                    <label class="col-md-6 col">fecha y hora de termino</label>
                    <input id="partidotime2" name="termino" class="col-md-6 col">
                    <script>

                        $("#partidotime").datetimepicker({
                            autoclose: true
                        });
                        $("#partidotime2").datetimepicker({
                            autoclose: true
                        });
                    </script>
                </div>
                <span class="help-block"></span>
                <div class="form-horizontal row">
                    <label class="col-md-6 col">numero de jugadores</label>
                    <input type="number" name="numjugadores" min="2" max="12" step="1"  required="required" class="col-md-6 col">
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::submit(
                    'Crear',
                    array(
                        'class'=>'btn btn-primary btn-lg btn-block'
                ))
                !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<div class="container-fluid">
            <div class="" style="display: inline-block; background-color: transparent; padding-bottom: 20px;">
                {!! Form::button(
                    'unirse a torneo',
                    array(
                        'class' => 'btn btn-primary',
                        'onclick' => ""
                    )
                )!!}

               <button  id ="creartorneo" class="btn btn-primary" data-toggle="modal" data-target="#creartorneo">crear torneo</button>


            </div>
            <br>
       <div class="card" style="padding-bottom: 1%;">
           <div class="table-responsive">
                <table id="" class="table table-hover table-striped">
                <thead>
                    <th>partido</th>
                    <th>inicio</th>
                    <th>termino</th>
                </thead>
               <tbody>
                    @if(!empty($torneos['respuesta'][0]['id']))
                        @foreach($torneos['respuesta'] as $torneo)
                            <td>{{ $torneo->id }}</td>
                            <td>{{ $torneo->inicio }}</td>
                            <td>{{ $torneo->termino }}</td>
                        @endforeach
                    @endif
                </tbody>
                </table>
            </div>
        </div>
   </div>


