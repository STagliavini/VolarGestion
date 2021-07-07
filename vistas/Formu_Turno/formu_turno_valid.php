<div class="row">
    <input type="hidden" name="id_turno" value="<?php echo $validator->getId_Turno(); ?>"/>
    <div class="col-sm-6">	
        <p class="color-ash">Piloto*</p>
        <div class="pos-relative">
            <select name="piloto_turno" id="piloto_turno" class="form-control" >
                <?php include_once 'SpinnerPiloto.php'; ?>
            </select>
        </div><!-- pos-relative -->
    </div><!-- col-sm-6 -->
    <div class="col-sm-6">	
        <div class="pos-relative">
        <button type="button" class="btn-sm btn-primary align-items-center" data-toggle="modal" data-target="#buscarPiloto">Buscar</button>
        </div><!-- pos-relative -->
    </div><!-- col-sm-6 -->
    <div class="col-sm-6">
        <?php echo $validator->getError_piloto_turno(); ?>
    </div>
    <div class="col-sm-6">
    </div>
    <div class="col-sm-6">	
        <p class="color-ash">CoPiloto</p>
        <div class="pos-relative">
            <select name="copiloto_turno" id="copiloto_turno" class="form-control" >
                <?php include_once 'SpinnerCopiloto.php'; ?>
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
            <input type="text" name="fecha_turno" id='fecha_turno' value="<?php echo $validator->getFecha_turno(); ?>"/>
            <i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
        </div><!-- pos-relative -->
    </div><!-- col-sm-6 -->
    <div class="col-sm-6">	
        <p class="color-ash">Hora de Salida*(hh:mm)</p>
        <div class="pos-relative">
            <input class="pr-20" type="text" name="salida_turno" id="salida_turno" value="<?php echo $validator->getSalida_turno(); ?>"/>
            <i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
        </div><!-- pos-relative -->
    </div><!-- col-sm-6 -->
    <div class="col-sm-6">
        <?php echo $validator->getError_fecha_turno(); ?>
    </div>
    <div class="col-sm-6">
        <?php echo $validator->getError_salida_turno(); ?>
    </div>
    <div class="col-sm-6">	
        <p class="color-ash">Hora de Llegada*(hh:mm)</p>
        <div class="pos-relative">
            <input class="pr-20" type="text" name="llegada_turno" id="llegada_turno" value="<?php echo $validator->getLlegada_turno(); ?>"/>
            <i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
        </div><!-- pos-relative -->
    </div><!-- col-sm-6 -->
    <div class="col-sm-6">	
        <p class="color-ash">Avion*</p>
        <div class="pos-relative">
            <select name="avion_turno" id="avion_turno" class="form-control">
                <?php include_once 'SpinnerAvion.php'; ?>
            </select>
        </div><!-- pos-relative -->
    </div><!-- col-sm-6 -->
    <div class="col-sm-6">
        <?php echo $validator->getError_llegada_turno(); ?>
    </div>
    <div class="col-sm-6">
        <?php echo $validator->getError_avion_turno(); ?>
    </div>
    <div class="col-sm-6">
        <p class="color-ash">Aclaracion</p>
        <div class="pos-relative">
            <textarea class="pr-20" name="aclaracion_turno" id="aclaracion_turno" rows="4" cols="50" value="<?php echo $validator->getAclaracion_turno(); ?>"></textarea>
            <i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
        </div><!-- pos-relative -->
    </div>
    
    <div class="col-sm-6">

    </div>
    <div class="col-sm-6">
        <?php echo $validator->getError_aclaracion_turno(); ?>
    </div>
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
                url: "app/Turno/AJAX/listadoTurnosPendientes.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datosturnospendientes').html(res);
                }
            });
            $.ajax({
                url: "app/Turno/AJAX/listadoTurnosConfirmados.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datosturnosconfirmados').html(res);
                }
            });
            $.ajax({
                url: "app/Turno/AJAX/listadoTurnosCancelados.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datosturnoscancelados').html(res);
                }
            });
            paginar(0);
        } else {
            $('#datosturnospendientes').load('app/Turno/AJAX/listadoTurnosPendientes.php');
            $('#datosturnosconfirmados').load('app/Turno/AJAX/listadoTurnosConfirmados.php');
            $('#datosturnoscancelados').load('app/Turno/AJAX/listadoTurnosCancelados.php');
            paginar(0);
        }
    });
    function paginar(pagina) {
                var modobusc = $('input[id="modbusc"]:checked').length;
                if (modobusc > 0) {
                    $.ajax({
                        url: "app/Paginador/Paginar.php",
                        type: 'POST',
                        data: "piloto_turno=" + document.getElementById("piloto_turno").value +"&copiloto_turno=" + document.getElementById("copiloto_turno").value +"&fecha_turno=" + document.getElementById("fecha_turno").value +"&salida_turno=" + document.getElementById("salida_turno").value +"&llegada_turno=" + document.getElementById("llegada_turno").value +"&avion_turno=" + document.getElementById("avion_turno").value +"&aclaracion_turno=" + document.getElementById("aclaracion_turno").value +"&turnometodo=0&metodo=Turno"+"&largo0="+document.getElementById("largo0").value+"&pag="+pagina,
                        success: function (res) {
                            $('#paginador0').html(res);
                        }
                    });
                    $.ajax({
                        url: "app/Paginador/Paginar.php",
                        type: 'POST',
                        data: "piloto_turno=" + document.getElementById("piloto_turno").value +"&copiloto_turno=" + document.getElementById("copiloto_turno").value +"&fecha_turno=" + document.getElementById("fecha_turno").value +"&salida_turno=" + document.getElementById("salida_turno").value +"&llegada_turno=" + document.getElementById("llegada_turno").value +"&avion_turno=" + document.getElementById("avion_turno").value +"&aclaracion_turno=" + document.getElementById("aclaracion_turno").value +"&turnometodo=1&metodo=Turno"+"&largo1="+document.getElementById("largo1").value+"&pag="+pagina,
                        success: function (res) {
                            $('#paginador1').html(res);
                        }
                    });
                    $.ajax({
                        url: "app/Paginador/Paginar.php",
                        type: 'POST',
                        data: "piloto_turno=" + document.getElementById("piloto_turno").value +"&copiloto_turno=" + document.getElementById("copiloto_turno").value +"&fecha_turno=" + document.getElementById("fecha_turno").value +"&salida_turno=" + document.getElementById("salida_turno").value +"&llegada_turno=" + document.getElementById("llegada_turno").value +"&avion_turno=" + document.getElementById("avion_turno").value +"&aclaracion_turno=" + document.getElementById("aclaracion_turno").value +"&turnometodo=2&metodo=Turno"+"&largo2="+document.getElementById("largo2").value+"&pag="+pagina,
                        success: function (res) {
                            $('#paginador2').html(res);
                        }
                    });
                    return false;
                } else {
                    $.ajax({
                        url: "app/Paginador/Paginar.php",
                        type: 'POST',
                        data: "turnometodo=0&metodo=Turno"+"&largo0="+document.getElementById("largo0").value+"&pag="+pagina,
                        success: function (res) {
                            $('#paginador0').html(res);
                        }
                    });
                    $.ajax({
                        url: "app/Paginador/Paginar.php",
                        type: 'POST',
                        data: "turnometodo=1&metodo=Turno"+"&largo1="+document.getElementById("largo1").value+"&pag="+pagina,
                        success: function (res) {
                            $('#paginador1').html(res);
                        }
                    });
                    $.ajax({
                        url: "app/Paginador/Paginar.php",
                        type: 'POST',
                        data: "turnometodo=2&metodo=Turno"+"&largo2="+document.getElementById("largo2").value+"&pag="+pagina,
                        success: function (res) {
                            $('#paginador2').html(res);
                        }
                    });
                    return false;
                }
            }
        $('#piloto_turno').change(function () {
        var modobusc = $('input[id="modbusc"]:checked').length;
        if (modobusc > 0) {
            $.ajax({
                url: "app/Turno/AJAX/listadoTurnosPendientes.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datosturnospendientes').html(res);
                }
            });
            $.ajax({
                url: "app/Turno/AJAX/listadoTurnosConfirmados.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datosturnosconfirmados').html(res);
                }
            });
            $.ajax({
                url: "app/Turno/AJAX/listadoTurnosCancelados.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datosturnoscancelados').html(res);
                }
            });
            paginar(0);
        } else {
            $('#datosturnospendientes').load('app/Turno/AJAX/listadoTurnosPendientes.php');
            $('#datosturnosconfirmados').load('app/Turno/AJAX/listadoTurnosConfirmados.php');
            $('#datosturnoscancelados').load('app/Turno/AJAX/listadoTurnosCancelados.php');
            paginar(0);
        }
    });
    $('#avion_turno').change(function () {
        var modobusc = $('input[id="modbusc"]:checked').length;
        if (modobusc > 0) {
            $.ajax({
                url: "app/Turno/AJAX/listadoTurnosPendientes.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datosturnospendientes').html(res);
                }
            });
            $.ajax({
                url: "app/Turno/AJAX/listadoTurnosConfirmados.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datosturnosconfirmados').html(res);
                }
            });
            $.ajax({
                url: "app/Turno/AJAX/listadoTurnosCancelados.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datosturnoscancelados').html(res);
                }
            });
            paginar(0);
        } else {
            $('#datosturnospendientes').load('app/Turno/AJAX/listadoTurnosPendientes.php');
            $('#datosturnosconfirmados').load('app/Turno/AJAX/listadoTurnosConfirmados.php');
            $('#datosturnoscancelados').load('app/Turno/AJAX/listadoTurnosCancelados.php');
            paginar(0);
        }
    });
    $('#copiloto_turno').change(function () {
        var modobusc = $('input[id="modbusc"]:checked').length;
        if (modobusc > 0) {
            $.ajax({
                url: "app/Turno/AJAX/listadoTurnosPendientes.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datosturnospendientes').html(res);
                }
            });
            $.ajax({
                url: "app/Turno/AJAX/listadoTurnosConfirmados.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datosturnosconfirmados').html(res);
                }
            });
            $.ajax({
                url: "app/Turno/AJAX/listadoTurnosCancelados.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datosturnoscancelados').html(res);
                }
            });
            paginar(0);
        } else {
            $('#datosturnospendientes').load('app/Turno/AJAX/listadoTurnosPendientes.php');
            $('#datosturnosconfirmados').load('app/Turno/AJAX/listadoTurnosConfirmados.php');
            $('#datosturnoscancelados').load('app/Turno/AJAX/listadoTurnosCancelados.php');
            paginar(0);
        }
    });
    $('#fecha_turno').keyup(function () {
        var modobusc = $('input[id="modbusc"]:checked').length;
        if (modobusc > 0) {
            $.ajax({
                url: "app/Turno/AJAX/listadoTurnosPendientes.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datosturnospendientes').html(res);
                }
            });
            $.ajax({
                url: "app/Turno/AJAX/listadoTurnosConfirmados.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datosturnosconfirmados').html(res);
                }
            });
            $.ajax({
                url: "app/Turno/AJAX/listadoTurnosCancelados.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datosturnoscancelados').html(res);
                }
            });
            paginar(0);
        } else {
            $('#datosturnospendientes').load('app/Turno/AJAX/listadoTurnosPendientes.php');
            $('#datosturnosconfirmados').load('app/Turno/AJAX/listadoTurnosConfirmados.php');
            $('#datosturnoscancelados').load('app/Turno/AJAX/listadoTurnosCancelados.php');
            paginar(0);
        }
    });
    $('#salida_turno').keyup(function () {
        var modobusc = $('input[id="modbusc"]:checked').length;
        if (modobusc > 0) {
            $.ajax({
                url: "app/Turno/AJAX/listadoTurnosPendientes.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datosturnospendientes').html(res);
                }
            });
            $.ajax({
                url: "app/Turno/AJAX/listadoTurnosConfirmados.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datosturnosconfirmados').html(res);
                }
            });
            $.ajax({
                url: "app/Turno/AJAX/listadoTurnosCancelados.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datosturnoscancelados').html(res);
                }
            });
            paginar(0);
        } else {
            $('#datosturnospendientes').load('app/Turno/AJAX/listadoTurnosPendientes.php');
            $('#datosturnosconfirmados').load('app/Turno/AJAX/listadoTurnosConfirmados.php');
            $('#datosturnoscancelados').load('app/Turno/AJAX/listadoTurnosCancelados.php');
            paginar(0);
        }
    });
    $('#llegada_turno').keyup(function () {
        var modobusc = $('input[id="modbusc"]:checked').length;
        if (modobusc > 0) {
            $.ajax({
                url: "app/Turno/AJAX/listadoTurnosPendientes.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datosturnospendientes').html(res);
                }
            });
            $.ajax({
                url: "app/Turno/AJAX/listadoTurnosConfirmados.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datosturnosconfirmados').html(res);
                }
            });
            $.ajax({
                url: "app/Turno/AJAX/listadoTurnosCancelados.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datosturnoscancelados').html(res);
                }
            });
            paginar(0);
        } else {
            $('#datosturnospendientes').load('app/Turno/AJAX/listadoTurnosPendientes.php');
            $('#datosturnosconfirmados').load('app/Turno/AJAX/listadoTurnosConfirmados.php');
            $('#datosturnoscancelados').load('app/Turno/AJAX/listadoTurnosCancelados.php');
            paginar(0);
        }
    });
    $('#aclaracion_turno').keyup(function () {
        var modobusc = $('input[id="modbusc"]:checked').length;
        if (modobusc > 0) {
            $.ajax({
                url: "app/Turno/AJAX/listadoTurnosPendientes.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datosturnospendientes').html(res);
                }
            });
            $.ajax({
                url: "app/Turno/AJAX/listadoTurnosConfirmados.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datosturnosconfirmados').html(res);
                }
            });
            $.ajax({
                url: "app/Turno/AJAX/listadoTurnosCancelados.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datosturnoscancelados').html(res);
                }
            });
            paginar(0);
        } else {
            $('#datosturnospendientes').load('app/Turno/AJAX/listadoTurnosPendientes.php');
            $('#datosturnosconfirmados').load('app/Turno/AJAX/listadoTurnosConfirmados.php');
            $('#datosturnoscancelados').load('app/Turno/AJAX/listadoTurnosCancelados.php');
            paginar(0);
        }
    });
</script>


