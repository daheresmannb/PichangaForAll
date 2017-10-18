@extends('layouts.diseñopichanga')
@extends('funcionesjs')


<!--datepicker-->
{!!Html::style('assets/css/jquery.datetimepicker.min.css'); !!}
{!!Html::script('assets/js/jquery.datetimepicker.full.js'); !!}

<div class="container-fluid">
    <div class="col-md-4">
                 <div class="row">
                            <h1>crea tu partido </h1>
                    </div>

                <form role="form-gruop">

                                <div class="form-horizontal">
                                <label>seleccione recinto</label>
                                         <select class="custom-select">
                                               <option selected>recinto</option>
                                             <option value="1">quilas</option>
                                         </select>
                                </div>
                                <div>
                                    <label>fecha y hora de inicio</label>
                                   
                                   <input id="partidotime">
                                   <script>
                                       $("#partidotime").datetimepicker({
                                        autoclose: true
                                       });
                                   </script>
                                   <br>
                                <label>fecha y hora de termino</label>
                                   
                                   <input id="partidotime2">
                                   <script>
                                       $("#partidotime2").datetimepicker({
                                        autoclose: true
                                       });
                                   </script>
                                </div>
                                <div class="form-horizontal">
                                {!! Form::submit(
                                            'crear partido',
                                            array(
                                            'class'=>'btn btn-primary  btn-block'))
                                !!}
                                </div>

                </form>
    </div>
</div>
