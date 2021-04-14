
<div class="row">
    <input type="hidden" name="id_vuelo" value="<?php echo $validator->getId_vuelo(); ?>"/>
    <div class="col-sm-6">	
        <p class="color-ash">Avion*</p>
        <div class="pos-relative">
            <select class="form-control" name="avion_vuelo" id="avion_vuelo">
                <?php include_once 'SpinnerAvion.php'; ?>
            </select>
        </div><!-- pos-relative -->
    </div><!-- col-sm-6 -->
    <div class="col-sm-6">							
        <p class="color-ash">Fecha*</p>
        <div class="pos-relative">
            <input type="text" name="fecha_vuelo" id='fecha_vuelo' value="<?php echo $validator->getFecha_vuelo(); ?>"/>
            <i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
        </div><!-- pos-relative -->
    </div><!-- col-sm-6 -->
    <div class="col-sm-6">
        <?php echo $validator->getError_avion_vuelo(); ?>
    </div>
    <div class="col-sm-6">
        <?php echo $validator->getError_fecha_vuelo(); ?>
    </div>
    <div class="col-sm-6">	
        <p class="color-ash">Hora de Salida*(hh:mm)</p>
        <div class="pos-relative">
            <input class="pr-20" type="text" name="salida_vuelo" id="salida_vuelo" value="<?php echo $validator->getSalida_vuelo(); ?>"/>
            <i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
        </div><!-- pos-relative -->
    </div><!-- col-sm-6 -->
    <div class="col-sm-6">	
        <p class="color-ash">Hora de Llegada*(hh:mm)</p>
        <div class="pos-relative">
            <input class="pr-20" type="text" name="llegada_vuelo" id="llegada_vuelo" value="<?php echo $validator->getLlegada_vuelo(); ?>"/>
            <i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
        </div><!-- pos-relative -->
    </div><!-- col-sm-6 -->
    <div class="col-sm-6">
        <?php echo $validator->getError_salida_vuelo(); ?>
    </div>
    <div class="col-sm-6">
        <?php echo $validator->getError_llegada_vuelo(); ?>
    </div>
    <div class="col-sm-6">	
        <p class="color-ash">Aeropuerto de Origen*</p>
        <div class="pos-relative">
            <input class="pr-20" type="text" name="origen_vuelo" id="origen_vuelo" value="<?php echo $validator->getOrigen_vuelo(); ?>"/>
            <i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
        </div><!-- pos-relative -->
    </div><!-- col-sm-6 -->
    <div class="col-sm-6">	
        <p class="color-ash">Aeropuerto de Destino*</p>
        <div class="pos-relative">
            <input class="pr-20" type="text" name="destino_vuelo" id="destino_vuelo" value="<?php echo $validator->getDestino_vuelo(); ?>"/>
            <i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
        </div><!-- pos-relative -->
    </div><!-- col-sm-6 -->
    <div class="col-sm-6">
        <?php echo $validator->getError_origen_vuelo(); ?>
    </div>
    <div class="col-sm-6">
        <?php echo $validator->getError_destino_vuelo(); ?>
    </div>
    <div class="col-sm-6">	
        <p class="color-ash">Piloto*</p>
        <div class="pos-relative">
            <select class="form-control" name="piloto_vuelo" id="piloto_vuelo">
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
        <?php echo $validator->getError_piloto_vuelo(); ?>
    </div>
    <div class="col-sm-6">
        
    </div>
    <div class="col-sm-6">	
        <p class="color-ash">Copiloto</p>
        <div class="pos-relative">
            <select class="form-control" name="copiloto_vuelo" id="copiloto_vuelo">
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
        <p class="color-ash">Aterrizajes*</p>
        <div class="pos-relative">
            <input class="pr-20" type="text" name="aterrizajes_vuelo" id="aterrizajes_vuelo" value="<?php echo $validator->getAterrizajes_vuelo(); ?>"/>
            <i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
        </div><!-- pos-relative -->
    </div><!-- col-sm-6 -->
    <div class="col-sm-6">	
    </div><!-- col-sm-6 -->
    <div class="col-sm-6">
        <?php echo $validator->getError_aterrizajes_vuelo(); ?>
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
        $('#datospilotosmod').load('app/Piloto/AJAX/listadoPilotosModal.php');
        $('#datoscopilotosmod').load('app/Piloto/AJAX/listadoCoPilotosModal.php');
    });
    function verificarmod(id_piloto) {
                $.ajax({
                    url: "app/Piloto/AJAX/asentarPiloto.php",
                    type: 'POST',
                    data: "id_piloto=" + id_piloto,
                    success: function (res) {
                        document.getElementById("piloto_vuelo").value=res.trim();
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
                        document.getElementById("copiloto_vuelo").value=res.trim();
                        $('#buscarCoPiloto').modal("hide");
                    }
                });
                return false;
            }
    $('#agregar').click(function () {
        $.ajax({
            url: "app/Vuelo/AJAX/agregarVuelo.php",
            type: 'POST',
            data: $('#formu').serialize(),
            success: function (res) {
                $('#formu').html(res);
                $('#datosvuelos').load('app/Vuelo/AJAX/listadoVuelos.php');
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
                        data: "fecha_vuelo=" + document.getElementById('fecha_vuelo').value + "&salida_vuelo=" + document.getElementById('salida_vuelo').value + "&llegada_vuelo=" + document.getElementById('llegada_vuelo').value + "&origen_vuelo=" + document.getElementById('origen_vuelo').value + "&destino_vuelo=" + document.getElementById('destino_vuelo').value + "&aterrizajes_vuelo=" + document.getElementById('aterrizajes_vuelo').value + "&piloto_vuelo=" + document.getElementById('piloto_vuelo').value + "&copiloto_vuelo=" + document.getElementById('copiloto_vuelo').value + "&avion_vuelo=" + document.getElementById('avion_vuelo').value + "&metodo=Vuelo"+"&largo="+document.getElementById("largo").value+"&pag="+pagina,
                        success: function (res) {
                            $('#paginador').html(res);
                        }
                    });
                    return false;
                } else {
                    $.ajax({
                        url: "app/Paginador/Paginar.php",
                        type: 'POST',
                        data: "metodo=Vuelo"+"&largo="+document.getElementById("largo").value+"&pag="+pagina,
                        success: function (res) {
                            $('#paginador').html(res);
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


