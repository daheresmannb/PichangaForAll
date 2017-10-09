@extends('layouts.diseñopichanga')
@extends('funcionesjs')

<div class="container" style="margin-top:30px">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title"><strong>Crear Partido </strong></h3></div>
            <div class="panel-body">
                <form role="form">
                    <div class="form-group">
                        <label">Recinto</label>
                        <div class="control-group">
                            <div class="controls">
                                <select id="recinto" name="recinto" class="input-xlarge">
                                    <option value="" selected="selected">Selecionar recinto</option>
                                    <option value="">recinto1</option>
                                    <option value="">recinto2</option>
                                    <option value="">recinto3</option>
                                    <option value="">recinto4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    

                    <div class="form-group">
                        <label>Fecha Partido</label>
                        <input type="date" class="form-control" id="date" name="date">
                    </div>
                    <table>
                        <tr>
                            <td><label>Hora Inico: </label></td>
                            <td><label>Hora Termino: </label></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">                                
                                    <input type="time" name="hora" value="11:45:00" max="22:30:00" min="10:00:00" step="1">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">                                
                                    <input type="time" name="hora" value="11:45:00" max="22:30:00" min="10:00:00" step="1">
                                    
                                </div>
                            </td>
                        </tr>
                        
                    </table>

                    
                    
                    
                    <button type="submit" class="btn btn-sm btn-default">Crear</button>
              

                </form>
          </div>
    </div>
</div>
<div class="col-md-4">


</div>
