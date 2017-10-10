@extends('layouts.diseñopichanga')
@extends('funcionesjs')

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>﻿
<div class="container-fluid">  
            <div class="" style="display: inline-block; background-color: transparent; padding-bottom: 20px;">
                {!! Form::button(
                    'unirse a torneo',
                    array(
                        'class' => 'btn btn-primary',
                        'onclick' => ""
                    )
                )!!}
                {!! Form::button(
                    'Crear torneos',
                    array(
                        'class' => 'btn btn-primary',
                        'onclick' => ""
                    )
                )!!}
                
               <button  class="btn btn-primary" data-toggle="modal" data-target="#creartorneo">botonprueba</button>
                <!-- inicio modal-->
                <div class="modal face" id="creartorneo" tabindex="-1" role="dialog" aria-labelledby="creartorneo" aria-hidden="true">
                    <div class="modal-dialog" role="documen">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">encabezado emergente</h4>   
                            </div> <!-- fin modal-header-->
                            <div class="modal-body">
                                <label>seleccione recinto</label>
                                <select class="custom-select">
                                     <option selected>recinto</option>
                                        <option value="1">quilas</option>
                                        <option value="2">pueblo nuevo</option>
                                        <option value="3">cautin</option>
                                </select>
                                <br>
                                <label>fecha</label>
                                <input type="text" name="fecha">
                                <br>
                                <label>numero de equipos</label>
                                <input type="text" name="numero">

                            </div> <!-- fin del modal-body-->
                            <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">cancelar</button>
                            <button type="button" class="btn btn-primary">crear evento</button>  </div>

                        </div>
                    </div>
                </div>


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
                    <td>aqui</td>
                    <td>aca</td>
                    <td>alla</td>
                </tbody>
                </table>
            </div>
        </div>
   </div>


