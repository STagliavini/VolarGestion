
<div class="row">

    <div class="col-sm-6">	
        <p class="color-ash">Nombre del Tipo de Avion*</p>
        <div class="pos-relative">
            <input class="pr-20" type="text" name="nombre_tipo_avion" id="nombre_tipo_avion"/>
        </div><!-- pos-relative -->
    </div><!-- col-sm-6 -->
    <div class="col-sm-6">							
        <p class="color-ash">Precio del Tipo de Avion*</p>
        <div class="pos-relative">
            <input type="text" name="precio_tipo_avion" id='precio_tipo_avion'/>
            <i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
        </div><!-- pos-relative -->
    </div><!-- col-sm-6 -->
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
<script>
    $('#agregar').click(function () {
        $.ajax({
            url: "app/Tipo_Avion/AJAX/agregarTipo_Avion.php",
            type: 'POST',
            data: $('#formu').serialize(),
            success: function (res) {
                $('#formu').html(res);
                $('#datostiposaviones').load('app/Tipo_Avion/AJAX/listadoTipo_Aviones.php');
                paginar(0);
            }
        });
        return false;
    });
    $('#cancelar').click(function () {
        $('#formu').trigger('reset');
        return false;
    });
    $('#nombre_tipo_avion').keyup(function () {
        var modobusc = $('input[id="modbusc"]:checked').length;
        if (modobusc > 0) {
            $.ajax({
                url: "app/Tipo_Avion/AJAX/listadoTipo_Aviones.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datostiposaviones').html(res);
                }
            });
            paginar(0);
        } else {
            $('#datostiposaviones').load('app/Tipo_Avion/AJAX/listadoTipo_Aviones.php');
        }
    });
    $('#precio_tipo_avion').keyup(function () {
        var modobusc = $('input[id="modbusc"]:checked').length;
        if (modobusc > 0) {
            $.ajax({
                url: "app/Tipo_Avion/AJAX/listadoTipo_Aviones.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datostiposaviones').html(res);
                }
            });
            paginar(0);
        } else {
            $('#datostiposaviones').load('app/Tipo_Avion/AJAX/listadoTipo_Aviones.php');
        }
    });
    $('#modbusc').click(function () {
        var modobusc = $('input[id="modbusc"]:checked').length;
        if (modobusc > 0) {
            $.ajax({
                url: "app/Tipo_Avion/AJAX/listadoTipo_Aviones.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datostiposaviones').html(res);
                }
            });
            paginar(0);
        } else {
            $('#datostipoaviones').load('app/Tipo_Avion/AJAX/listadoTipo_Aviones.php');
            paginar(0);
        }
    });
    function paginar(pagina) {
                var modobusc = $('input[id="modbusc"]:checked').length;
                if (modobusc > 0) {
                    $.ajax({
                        url: "app/Paginador/Paginar.php",
                        type: 'POST',
                        data: "nombre_tipo_avion="+document.getElementById("nombre_tipo_avion").value+"&precio_tipo_avion="+document.getElementById("precio_tipo_avion").value+ "&metodo=TipoAvion"+"&largo="+document.getElementById("largo").value+"&pag="+pagina,
                        success: function (res) {
                            $('#paginador').html(res);
                        }
                    });
                    return false;
                } else {
                    $.ajax({
                        url: "app/Paginador/Paginar.php",
                        type: 'POST',
                        data: "metodo=TipoAvion"+"&largo="+document.getElementById("largo").value+"&pag="+pagina,
                        success: function (res) {
                            $('#paginador').html(res);
                        }
                    });
                    return false;
                }
            }
</script>

