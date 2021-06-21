<div class="row">
    <div class="col-sm-6">	
        <p class="color-ash">Piloto*</p>
        <div class="pos-relative">
            <select name="piloto_turno" id="piloto_turno" class="form-control" >

            </select>
        </div><!-- pos-relative -->
    </div><!-- col-sm-6 -->
    <div class="col-sm-6">	
        <div class="pos-relative">
        <button type="button" class="btn-sm btn-primary align-items-center" data-toggle="modal" data-target="#buscarPiloto">Buscar</button>
        </div><!-- pos-relative -->
    </div><!-- col-sm-6 -->
    <div class="col-sm-6">	
        <p class="color-ash">CoPiloto</p>
        <div class="pos-relative">
            <select name="copiloto_turno" id="copiloto_turno" class="form-control" >

            </select>
        </div><!-- pos-relative -->
    </div><!-- col-sm-6 -->
    <div class="col-sm-6">	
        <div class="pos-relative">
        <button type="button" class="btn-sm btn-primary align-items-center" data-toggle="modal" data-target="#buscarCoPiloto">Buscar</button>
        </div><!-- pos-relative -->
    </div><!-- col-sm-6 -->
    <div class="col-sm-6">							
        <p class="color-ash">Fecha*</p>
        <div class="pos-relative">
            <input type="text" name="fecha_turno" id='fecha_turno'/>
            <i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
        </div><!-- pos-relative -->
    </div><!-- col-sm-6 -->
    <div class="col-sm-6">	
        <p class="color-ash">Hora de Salida*(hh:mm)</p>
        <div class="pos-relative">
            <input class="pr-20" type="text" name="salida_turno" id="salida_turno"/>
            <i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
        </div><!-- pos-relative -->
    </div><!-- col-sm-6 -->
    <div class="col-sm-6">	
        <p class="color-ash">Hora de Llegada*(hh:mm)</p>
        <div class="pos-relative">
            <input class="pr-20" type="text" name="llegada_turno" id="llegada_turno"/>
            <i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
        </div><!-- pos-relative -->
    </div><!-- col-sm-6 -->
    <div class="col-sm-6">	
        <p class="color-ash">Avion*</p>
        <div class="pos-relative">
            <select name="avion_turno" id="avion_turno" class="form-control">

            </select>
        </div><!-- pos-relative -->
    </div><!-- col-sm-6 -->
    <div class="col-sm-6">	
        <p class="color-ash">Aclaracion</p>
        <div class="pos-relative">
            <textarea class="pr-20" name="aclaracion_turno" id="aclaracion_turno" rows="4" cols="50"></textarea>
            <i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
        </div><!-- pos-relative -->
    </div><!-- col-sm-6 -->
    
    <div class="col-sm-6">

    </div>
    <div class="col-sm-6">
        <Button class="btn-sm btn-primary" type="submit" name="agregar" id="agregar">Agregar</Button>
    </div>
    <div class="col-sm-6">
        <Button class="btn-sm btn-primary" type="reset" name="cancelar" id="cancelar">Cancelar</Button>
    </div>
    <div class="col-sm-6">
        <input type="checkbox" class="form-check-input" id="modbusc">
        <label class="form-check-label" for="modbusc">Modo Busqueda</label>
    </div>
    <div class="col-sm-6">

    </div>
</div><!-- row -->
<div class="modal fade" id="buscarPiloto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Buscar Piloto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method="POST" id="formmodal">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">DNI</label>
            <input type="text" class="form-control" id="dnimod" name="dni_piloto">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Apellido</label>
            <input type="text" class="form-control" id="apellidomod" name="apellido_piloto">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre</label>
            <input type="text" class="form-control" id="nombremod" name="nombre_piloto">
          </div>
        </form>
          <table class="table table-responsive">
                            <thead>
                            <th>DNI</th>
                            <th>Apellido</th>
                            <th>Nombre</th>
                            <th>Accion</th>
                            </thead>
                            <tbody id="datospilotosmod">

                            </tbody>
                        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn-sm btn-primary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="buscarCoPiloto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Buscar CoPiloto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method="POST" id="formcmodal">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">DNI</label>
            <input type="text" class="form-control" id="cdnimod" name="dni_piloto">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Apellido</label>
            <input type="text" class="form-control" id="capellidomod" name="apellido_piloto">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre</label>
            <input type="text" class="form-control" id="cnombremod" name="nombre_piloto">
          </div>
        </form>
          <table class="table table-responsive">
                            <thead>
                            <th>DNI</th>
                            <th>Apellido</th>
                            <th>Nombre</th>
                            <th>Accion</th>
                            </thead>
                            <tbody id="datoscopilotosmod">

                            </tbody>
                        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn-sm btn-primary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<script>
    $(document).ready(function () {
        $('#avion_turno').load('app/Vuelo/AJAX/SpinnerAvion.php');
        $('#piloto_turno').load('app/Vuelo/AJAX/SpinnerPiloto.php');
        $('#copiloto_turno').load('app/Vuelo/AJAX/SpinnerCopiloto.php');
        $('#datospilotosmod').load('app/Piloto/AJAX/listadoPilotosModal.php');
        $('#datoscopilotosmod').load('app/Piloto/AJAX/listadoCoPilotosModal.php');
    });
    function verificarmod(id_piloto) {
                $.ajax({
                    url: "app/Piloto/AJAX/asentarPiloto.php",
                    type: 'POST',
                    data: "id_piloto=" + id_piloto,
                    success: function (res) {
                        document.getElementById("piloto_turno").value=res.trim();
                        $('#buscarPiloto').modal("hide");
                    }
                });
                return false;
            }
    function verificarcmod(id_piloto) {
                $.ajax({
                    url: "app/Piloto/AJAX/asentarPiloto.php",
                    type: 'POST',
                    data: "id_piloto=" + id_piloto,
                    success: function (res) {
                        document.getElementById("copiloto_turno").value=res.trim();
                        $('#buscarCoPiloto').modal("hide");
                    }
                });
                return false;
            }
    $('#agregar').click(function () {
        $.ajax({
            url: "app/Turno/AJAX/agregarTurno.php",
            type: 'POST',
            data: $('#formu').serialize(),
            success: function (res) {
                $('#formu').html(res);
                $('#datosturnospendientes').load('app/Turno/AJAX/listadoTurnosPendientes.php');
                paginar(0);
            }
        });
        return false;
    });
    $('#cancelar').click(function () {
        $('#formu').trigger('reset');
        return false;
    });
    $('#modbusc').click(function () {
        var modobusc = $('input[id="modbusc"]:checked').length;
        if (modobusc > 0) {
            $.ajax({
                url: "app/Vuelo/AJAX/listadoVuelos.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datosvuelos').html(res);
                }
            });
            paginar(0);
        } else {
            $('#datosvuelos').load('app/Vuelo/AJAX/listadoVuelos.php');
            paginar(0);
        }
    });
    function paginar(pagina) {
                var modobusc = $('input[id="modbusc"]:checked').length;
                if (modobusc > 0) {
                    $.ajax({
                        url: "app/Paginador/Paginar.php",
                        type: 'POST',
                        data: "dni_pago=" + document.getElementById("dni_pago").value + "&monto_pago=" + document.getElementById("monto_pago").value+"&fecha_pago=" + document.getElementById("fecha_pago").value+"&metodo=Pago"+"&largo="+document.getElementById("largo").value+"&pag="+pagina,
                        success: function (res) {
                            $('#paginador').html(res);
                        }
                    });
                    return false;
                } else {
                    $.ajax({
                        url: "app/Paginador/Paginar.php",
                        type: 'POST',
                        data: "turnometodo=0&metodo=Turno"+"&largo="+document.getElementById("largo").value+"&pag="+pagina,
                        success: function (res) {
                            $('#paginador0').html(res);
                        }
                    });
                    $.ajax({
                        url: "app/Paginador/Paginar.php",
                        type: 'POST',
                        data: "turnometodo=1&metodo=Turno"+"&largo="+document.getElementById("largo").value+"&pag="+pagina,
                        success: function (res) {
                            $('#paginador1').html(res);
                        }
                    });
                    $.ajax({
                        url: "app/Paginador/Paginar.php",
                        type: 'POST',
                        data: "turnometodo=2&metodo=Turno"+"&largo="+document.getElementById("largo").value+"&pag="+pagina,
                        success: function (res) {
                            $('#paginador2').html(res);
                        }
                    });
                    return false;
                }
            }
        $('#piloto_vuelo').change(function () {
        var modobusc = $('input[id="modbusc"]:checked').length;
        if (modobusc > 0) {
            $.ajax({
                url: "app/Vuelo/AJAX/listadoVuelos.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datosvuelos').html(res);
                }
            });
            paginar(0);
        } else {
            $('#datosvuelos').load('app/Vuelo/AJAX/listadoVuelos.php');
        }
    });
    $('#avion_vuelo').change(function () {
        var modobusc = $('input[id="modbusc"]:checked').length;
        if (modobusc > 0) {
            $.ajax({
                url: "app/Vuelo/AJAX/listadoVuelos.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datosvuelos').html(res);
                }
            });
            paginar(0);
        } else {
            $('#datosvuelos').load('app/Vuelo/AJAX/listadoVuelos.php');
        }
    });
    $('#fecha_vuelo').keyup(function () {
        var modobusc = $('input[id="modbusc"]:checked').length;
        if (modobusc > 0) {
            $.ajax({
                url: "app/Vuelo/AJAX/listadoVuelos.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datosvuelos').html(res);
                }
            });
            paginar(0);
        } else {
            $('#datosvuelos').load('app/Vuelo/AJAX/listadoVuelos.php');
        }
    });
    $('#salida_vuelo').keyup(function () {
        var modobusc = $('input[id="modbusc"]:checked').length;
        if (modobusc > 0) {
            $.ajax({
                url: "app/Vuelo/AJAX/listadoVuelos.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datosvuelos').html(res);
                }
            });
            paginar(0);
        } else {
            $('#datosvuelos').load('app/Vuelo/AJAX/listadoVuelos.php');
        }
    });
    $('#llegada_vuelo').keyup(function () {
        var modobusc = $('input[id="modbusc"]:checked').length;
        if (modobusc > 0) {
            $.ajax({
                url: "app/Vuelo/AJAX/listadoVuelos.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datosvuelos').html(res);
                }
            });
            paginar(0);
        } else {
            $('#datosvuelos').load('app/Vuelo/AJAX/listadoVuelos.php');
        }
    });
    $('#origen_vuelo').keyup(function () {
        var modobusc = $('input[id="modbusc"]:checked').length;
        if (modobusc > 0) {
            $.ajax({
                url: "app/Vuelo/AJAX/listadoVuelos.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datosvuelos').html(res);
                }
            });
            paginar(0);
        } else {
            $('#datosvuelos').load('app/Vuelo/AJAX/listadoVuelos.php');
        }
    });
    $('#destino_vuelo').keyup(function () {
        var modobusc = $('input[id="modbusc"]:checked').length;
        if (modobusc > 0) {
            $.ajax({
                url: "app/Vuelo/AJAX/listadoVuelos.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datosvuelos').html(res);
                }
            });
            paginar(0);
        } else {
            $('#datosvuelos').load('app/Vuelo/AJAX/listadoVuelos.php');
        }
    });
    $('#copiloto_vuelo').change(function () {
        var modobusc = $('input[id="modbusc"]:checked').length;
        if (modobusc > 0) {
            $.ajax({
                url: "app/Vuelo/AJAX/listadoVuelos.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datosvuelos').html(res);
                }
            });
            paginar(0);
        } else {
            $('#datosvuelos').load('app/Vuelo/AJAX/listadoVuelos.php');
        }
    });
    $('#aterrizajes_vuelo').keyup(function () {
        var modobusc = $('input[id="modbusc"]:checked').length;
        if (modobusc > 0) {
            $.ajax({
                url: "app/Vuelo/AJAX/listadoVuelos.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datosvuelos').html(res);
                }
            });
            paginar(0);
        } else {
            $('#datosvuelos').load('app/Vuelo/AJAX/listadoVuelos.php');
        }
    });
    $('#dnimod').keyup(function () {
        $.ajax({
                url: "app/Piloto/AJAX/listadoPilotosModal.php",
                type: 'POST',
                data: $('#formmodal').serialize(),
                success: function (res) {
                    $('#datospilotosmod').html(res);
                }
            });
    });
    $('#apellidomod').keyup(function () {
        $.ajax({
                url: "app/Piloto/AJAX/listadoPilotosModal.php",
                type: 'POST',
                data: $('#formmodal').serialize(),
                success: function (res) {
                    $('#datospilotosmod').html(res);
                }
            });
    });
    $('#nombremod').keyup(function () {
        $.ajax({
                url: "app/Piloto/AJAX/listadoPilotosModal.php",
                type: 'POST',
                data: $('#formmodal').serialize(),
                success: function (res) {
                    $('#datospilotosmod').html(res);
                }
            });
    });
    $('#cdnimod').keyup(function () {
        $.ajax({
                url: "app/Piloto/AJAX/listadoCoPilotosModal.php",
                type: 'POST',
                data: $('#formcmodal').serialize(),
                success: function (res) {
                    $('#datoscopilotosmod').html(res);
                }
            });
    });
    $('#capellidomod').keyup(function () {
        $.ajax({
                url: "app/Piloto/AJAX/listadoCoPilotosModal.php",
                type: 'POST',
                data: $('#formcmodal').serialize(),
                success: function (res) {
                    $('#datoscopilotosmod').html(res);
                }
            });
    });
    $('#cnombremod').keyup(function () {
        $.ajax({
                url: "app/Piloto/AJAX/listadoCoPilotosModal.php",
                type: 'POST',
                data: $('#formcmodal').serialize(),
                success: function (res) {
                    $('#datoscopilotosmod').html(res);
                }
            });
    });
</script>

