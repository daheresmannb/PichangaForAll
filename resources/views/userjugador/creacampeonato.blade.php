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
                $("#recinto_id").val(
                    $('#listrecinto').find(":selected").val()
                );
                $("#recinto_id:text").val(
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
                            <div class="modal-header">
                                <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title"> Crear Torneo</h4>   
                            </div> <!-- fin modal-header-->
                            <div class="modal-body">
{!! Form::open(['route' => array('torneo.crear', ), 'autocomplete' => 'off']) !!}

                                
    <label class="col-md-6 col">seleccione recinto</label>
    <select class="selectpicker" id="listrecinto" name="nombre">
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
                            </div> <!-- fin del modal-body-->
                            <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">crear torneo</button>
                           {!! Form::close() !!}
                            </div>
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
                    <th>lugar</th>
                    <th>ver</th>    
                </thead>
               <tbody>
                    @if(!empty($torneos['respuesta'][0]['id']))
                        @foreach($torneos['respuesta'] as $torneo)
                            
                            <td>{{ $torneo->id }}</td>
                        @endforeach
                    @endif
                </tbody>
                </table>
            </div>
        </div>
   </div>


