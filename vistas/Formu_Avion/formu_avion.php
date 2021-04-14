
<div class="row">

    <div class="col-sm-6">	
        <p class="color-ash">Matricula*</p>
        <div class="pos-relative">
            <input class="pr-20" type="text" name="matricula_avion" id="matricula_avion"/>
        </div><!-- pos-relative -->
    </div><!-- col-sm-6 -->
    <div class="col-sm-6">							
        <p class="color-ash">Nombre del Avion*</p>
        <div class="pos-relative">
            <input type="text" name="nombre_avion" id='nombre_avion'/>
            <i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
        </div><!-- pos-relative -->
    </div><!-- col-sm-6 -->
    <div class="col-sm-6">	
        <p class="color-ash">Descripcion</p>
        <div class="pos-relative">
            <input class="pr-20" type="text" name="descripcion_avion" id="descripcion_avion"/>
            <i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
        </div><!-- pos-relative -->
    </div><!-- col-sm-6 -->
    <div class="col-sm-6">
        <p class="color-ash">Tipo de Avion*</p>
        <div class="pos-relative">
            <select id="tipo_avion" name="tipo_avion" class="form-control">

            </select>
            <i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
        </div><!-- pos-relative -->
    </div>
    <div class="col-sm-6">
        <Button class="btn-sm btn-primary" type="submit" name="agregar" id="agregar">Agregar</Button>
    </div>
    <div class="col-sm-6">
        <Button class="btn-sm btn-primary" type="reset" name="cancelar" id="cancelar">Cancelar</Button>
    </div>';
    <div class="col-sm-6">
        <input type="checkbox" class="form-check-input" id="modbusc">
        <label class="form-check-label" for="modbusc">Modo Busqueda</label>
    </div>
    <div class="col-sm-6">

    </div>
</div><!-- row -->
<script>
    $(document).ready(function () {
        $('#tipo_avion').load('app/Avion/AJAX/SpinnerTipoAvion.php');
    });
    $('#agregar').click(function () {
        $.ajax({
            url: "app/Avion/AJAX/agregarAvion.php",
            type: 'POST',
            data: $('#formu').serialize(),
            success: function (res) {
                $('#formu').html(res);
                $('#datosaviones').load('app/Avion/AJAX/listadoAviones.php');
                paginar(0);
            }
        });
        return false;
    });
    $('#cancelar').click(function () {
        $('#formu').trigger('reset');
        return false;
    });
    $('#matricula_avion').keyup(function () {
        var modobusc = $('input[id="modbusc"]:checked').length;
        if (modobusc > 0) {
            $.ajax({
                url: "app/Avion/AJAX/listadoAviones.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datosaviones').html(res);
                }
            });
            paginar(0);
        } else {
            $('#datosaviones').load('app/Avion/AJAX/listadoAviones.php');
        }
    });
    $('#nombre_avion').keyup(function () {
        var modobusc = $('input[id="modbusc"]:checked').length;
        if (modobusc > 0) {
            $.ajax({
                url: "app/Avion/AJAX/listadoAviones.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datosaviones').html(res);
                }
            });
            paginar(0);
        } else {
            $('#datosaviones').load('app/Avion/AJAX/listadoAviones.php');
        }
    });
    $('#descripcion_avion').keyup(function () {
        var modobusc = $('input[id="modbusc"]:checked').length;
        if (modobusc > 0) {
            $.ajax({
                url: "app/Avion/AJAX/listadoAviones.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datosaviones').html(res);
                }
            });
            paginar(0);
        } else {
            $('#datosaviones').load('app/Avion/AJAX/listadoAviones.php');
        }
    });
    $('#tipo_avion').change(function () {
        var modobusc = $('input[id="modbusc"]:checked').length;
        if (modobusc > 0) {
            $.ajax({
                url: "app/Avion/AJAX/listadoAviones.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datosaviones').html(res);
                }
            });
            paginar(0);
        } else {
            $('#datosaviones').load('app/Avion/AJAX/listadoAviones.php');
        }
    });
    $('#modbusc').click(function () {
        var modobusc = $('input[id="modbusc"]:checked').length;
        if (modobusc > 0) {
            $.ajax({
                url: "app/Avion/AJAX/listadoAviones.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datosaviones').html(res);
                }
            });
            paginar(0);
        } else {
            $('#datosaviones').load('app/Avion/AJAX/listadoAviones.php');
            paginar(0);
        }
    });
    function paginar(pagina) {
                var modobusc = $('input[id="modbusc"]:checked').length;
                if (modobusc > 0) {
                    $.ajax({
                        url: "app/Paginador/Paginar.php",
                        type: 'POST',
                        data: "matricula_avion=" + document.getElementById("matricula_avion").value + "&nombre_avion=" + document.getElementById("nombre_avion").value + "&descripcion_avion=" + document.getElementById("descripcion_avion").value + "&tipo_avion=" + document.getElementById("tipo_avion").value + "&metodo=Avion"+"&largo="+document.getElementById("largo").value+"&pag="+pagina,
                        success: function (res) {
                            $('#paginador').html(res);
                        }
                    });
                    return false;
                } else {
                    $.ajax({
                        url: "app/Paginador/Paginar.php",
                        type: 'POST',
                        data: "metodo=Avion"+"&largo="+document.getElementById("largo").value+"&pag="+pagina,
                        success: function (res) {
                            $('#paginador').html(res);
                        }
                    });
                    return false;
                }
            }
</script>

