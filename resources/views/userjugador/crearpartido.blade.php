@extends('layouts.diseñopichanga')
@extends('funcionesjs')


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
                               <div class="form-horizontal row">
                                <label class="col-md-6 col">seleccione recinto</label>
                                         <select class="custom-select col-md-6 col">
                                               <option selected>recinto</option>
                                             <option value="1">quilas</option>
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
                                {!! Form::submit(
                                            'crear partido',
                                            array(
                                            'class'=>'btn btn-primary  btn-block'))
                                !!}
                                </div>

                </div>
    </div>
</div>
