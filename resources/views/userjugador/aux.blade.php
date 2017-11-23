<script type="text/javascript">
$(document).ready(function(){

    $("#sel_depart").change(function(){
        var deptid = $(this).val();

        $.ajax({
            url: 'getUsers.php',
            type: 'post',
            data: {depart:deptid},
            dataType: 'json',
            success:function(response){

                var len = response.length;

                $("#sel_user").empty();
                for( var i = 0; i<len; i++){
                    var id = response[i]['id'];
                    var name = response[i]['name'];
                    
                    $("#sel_user").append("<option value='"+id+"'>"+name+"</option>");

                }
            }
        });
    });

});
</script>


<script type="text/javascript">
$(document).ready(
  function(e) {
    $("#listrecinto").click(
      alert("hola pendejo");
      function(e) {
        $.ajax({
            url: 'recinto.obtener',
            type: 'post',
            data: {id,nombre},
            dataType: 'json',
            success:function(response){
              
               var len = response.length;

                $("#listrecinto").empty();
              /*
                for( var i = 0; i<len; i++){
                    var id = response[i]['id'];
                    var name = response[i]['name'];
                    
                    $("#sel_user").append("<option value='"+id+"'>"+nombre+"</option>");*/

                }
            }
        );
    
</script>







































































<script type="text/javascript">
$(document).ready(
  function(e) {
    $("#listrecinto").click(
      alert("hola pendejo");
      function(e) {
        $.ajax({
          type: "POST",
                 url:  "<?php echo url('recinto.obtener'); ?>",
                headers: {'X-CSRF-TOKEN': "<?php echo csrf_token(); ?>"},
                data:{id,nombre}
                success: function (data)
            },
            );
      }
    );  
  }
);
</script>
<!--datepicker-->
{!!Html::style('assets/css/jquery.datetimepicker.min.css'); !!}
{!!Html::script('assets/js/jquery.datetimepicker.full.js'); !!}

<div class="container-fluid">
      <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h3><strong>Crea tu Partido</strong> </h3>
             
                        </div>
      </div>
 <div class="row">
      <div class="col-sm-6 col-sm-offset-3 form-box">                         
          <div class="form-group row">
          <!-- ruta : partido.crear-->
{!! Form::open(['route' => array('partido.crear', )]) !!}
                    <div class="form-horizontal row">
                        <label class="col-md-6 col">seleccione recinto</label>
                           <select id="listrecinto">
                               <option value="0">- Select -</option>
                            </select>
                                </div>
                                <span class="help-block"></span> 
                                <div class="form-horizontal row" >
                                  <label class="col-md-6 col">fecha y hora de inicio</label>
                                  <input id="partidotime" class="col-md-6 col">
                                  <script>
                                       $("#partidotime").datetimepicker({
                                        autoclose: true
                                       });    
                                  </script>
                                </div>
                                <span class="help-block"></span>
                                <div class="form-horizontal row">
                                <label class="col-md-6 col">fecha y hora de termino</label>
                                  <input id="partidotime2" class="col-md-6 col">
                                  <script>
                                       $("#partidotime2").datetimepicker({
                                        autoclose: true
                                       });
                                   </script>
                                </div>
                                <span class="help-block"></span>   
                                <div class="col-md-6 col-md-offset-3 ">
                                <input class="btn btn-primary  btn-block" type="submit" value="crearpartido" id="btnpartido">
                                </div>
   {!! Form::close() !!}

                </div>
    </div>
</div>











              <div  class="modal face" id="creartorneo" tabindex="1" role="dialog" aria-labelledby="creartorneo" aria-hidden="true">
                    <div class="modal-dialog" role="documen">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title"> Crear Torneo</h4>   
                            </div> <!-- fin modal-header-->
                            <div class="modal-body">


   <form role="form" action="{{ url('/torneos/crear') }}" method="POST" class="form-horizontal">
          {{ csrf_field() }}


    <label class="col-md-6 col">nombre de torneo</label> 
    <input type="text" name="nombre_torneo">
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
   <!--button type="submit" class="btn btn-default" data-dismiss="modal">crear torneo</button-->
          <button id="registrar" class="btn btn-lg btn-primary btn-block" type="submit" data-dismiss="modal">
            Registrar
          </button> 
           </form>  
                            </div>

                        </div>
                    </div>
                </div> 



























