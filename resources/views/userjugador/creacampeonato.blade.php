@extends('layouts.diseñopichanga')
@extends('funcionesjs')

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>﻿

<div class="container-fluid">  
            <div class="" style="display: inline-block; background-color: transparent; padding-bottom: 20px;">
                {!! Form::button(
                    'unirse a torneo',
                    array(
                        'class' => 'btn btn-primary',
                        'onclick' => ""
                    )
                )!!}
               
               <button  class="btn btn-primary" data-toggle="modal" data-target="#creartorneo">crear torneo</button>
                

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


