
<div class="row">

    <div class="col-sm-6">	
        <p class="color-ash">Piloto*</p>
        <div class="pos-relative">
            <select name="dni_pago" id="dni_pago" class="form-control">

            </select>
        </div><!-- pos-relative -->
    </div><!-- col-sm-6 -->
    <div class="col-sm-6">							
        <p class="color-ash">Monto de Pago*</p>
        <div class="pos-relative">
            <input type="text" name="monto_pago" id='monto_pago'/>
            <i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
        </div><!-- pos-relative -->
    </div><!-- col-sm-6 -->
    <div class="col-sm-6">							
        <p class="color-ash">Fecha de Pago*</p>
        <div class="pos-relative">
            <input type="text" name="fecha_pago" id='fecha_pago'/>
            <i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
        </div><!-- pos-relative -->
    </div><!-- col-sm-6 -->
    <div class="col-sm-6">							
    </div><!-- col-sm-6 -->
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
        $('#dni_pago').load('app/Pago/AJAX/SpinnerPiloto.php');
    });
    $('#agregar').click(function () {
        $.ajax({
            url: "app/Pago/AJAX/agregarPago.php",
            type: 'POST',
            data: $('#formu').serialize(),
            success: function (res) {
                $('#formu').html(res);
                $('#datospagos').load('app/Pago/AJAX/listadoPagos.php');
                paginar(0);
            }
        });
        return false;
    });
    $('#cancelar').click(function () {
        $('#formu').trigger('reset');
        return false;
    });
    $('#dni_pago').change(function () {
        var modobusc = $('input[id="modbusc"]:checked').length;
        if (modobusc > 0) {
            $.ajax({
                url: "app/Pago/AJAX/listadoPagos.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datospagos').html(res);
                }
            });
            paginar(0);
        } else {
            $('#datospagos').load('app/Pago/AJAX/listadoPagos.php');
        }
    });
    $('#monto_pago').keyup(function () {
        var modobusc = $('input[id="modbusc"]:checked').length;
        if (modobusc > 0) {
            $.ajax({
                url: "app/Pago/AJAX/listadoPagos.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datospagos').html(res);
                }
            });
            paginar(0);
        } else {
            $('#datospagos').load('app/Pago/AJAX/listadoPagos.php');
        }
    });
    $('#modbusc').click(function () {
        var modobusc = $('input[id="modbusc"]:checked').length;
        if (modobusc > 0) {
            $.ajax({
                url: "app/Pago/AJAX/listadoPagos.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datospagos').html(res);
                }
            });
            paginar(0);
        } else {
            $('#datospagos').load('app/Pago/AJAX/listadoPagos.php');
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
                        data: "metodo=Pago"+"&largo="+document.getElementById("largo").value+"&pag="+pagina,
                        success: function (res) {
                            $('#paginador').html(res);
                        }
                    });
                    return false;
                }
            }
</script>

