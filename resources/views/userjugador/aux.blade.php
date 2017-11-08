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