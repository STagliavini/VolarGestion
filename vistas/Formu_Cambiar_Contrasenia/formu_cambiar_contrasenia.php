
<div class="row">

    <div class="col-sm-6">	
        <p class="color-ash">Nueva Contrasenia</p>
        <div class="pos-relative">
            <input class="pr-20" type="password" name="nueva_contrasenia" id="nueva_contrasenia"/>
        </div><!-- pos-relative -->
    </div><!-- col-sm-6 -->
    <div class="col-sm-6">							
        <p class="color-ash">Repetir Contrasenia</p>
        <div class="pos-relative">
            <input type="password" name="repetir_contrasenia" id='repetir_contrasenia'/>
            <i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
        </div><!-- pos-relative -->
    </div><!-- col-sm-6 -->
    <div class="col-sm-6">
        <Button class="btn-sm btn-primary" type="submit" name="modificar" id="modificar">Modificar</Button>
    </div>
    <div class="col-sm-6">
        <Button class="btn-sm btn-primary" type="reset" name="cancelar" id="cancelar">Cancelar</Button>
    </div>
</div><!-- row -->
<script>
    $('#modificar').click(function () {
        $.ajax({
            url: "app/Usuario/AJAX/cambiarContrasenia.php",
            type: 'POST',
            data: $('#formu').serialize(),
            success: function (res) {
                $('#formu').html(res);
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
            paginar();
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
            paginar();
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
            paginar();
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
            paginar();
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
            paginar();
        } else {
            $('#datosaviones').load('app/Avion/AJAX/listadoAviones.php');
            paginar();
        }
    });
    function paginar() {
        var modobusc = $('input[id="modbusc"]:checked').length;
        if (modobusc > 0) {
            $.ajax({
                url: "app/Paginador/Paginar.php",
                type: 'POST',
                data: "matricula_avion=" + document.getElementById("matricula_avion").value + "&nombre_avion=" + document.getElementById("nombre_avion").value + "&descripcion_avion=" + document.getElementById("descripcion_avion").value + "&tipo_avion=" + document.getElementById("tipo_avion").value + "&metodo=Avion",
                success: function (res) {
                    $('#paginador').html(res);
                }
            });
            return false;
        } else {
            $.ajax({
                url: "app/Paginador/Paginar.php",
                type: 'POST',
                data: "&metodo=Avion",
                success: function (res) {
                    $('#paginador').html(res);
                }
            });
            return false;
        }
    }
</script>

