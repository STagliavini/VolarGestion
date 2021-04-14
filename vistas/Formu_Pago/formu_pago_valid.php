
<div class="row">
    <input type="hidden" name="id_pago" value="<?php echo $validator->getId_pago(); ?>"/>
    <div class="col-sm-6">	
        <p class="color-ash">Piloto*</p>
        <div class="pos-relative">
            <select name="dni_pago" id="dni_pago" class="form-control" <?php
            if ($validator->getId_pago() != -1) {
                echo 'disabled';
            }
            ?>>
                <?php include_once 'SpinnerPiloto.php'; ?>
            </select>
            <input type="hidden" id="dnii_pago" name="dnii_pago" value=""/>
        </div><!-- pos-relative -->
    </div><!-- col-sm-6 -->
    <div class="col-sm-6">							
        <p class="color-ash">Monto de Pago*</p>
        <div class="pos-relative">
            <input type="text" name="monto_pago" id='monto_pago' value="<?php echo $validator->getMonto_pago(); ?>"/>
            <i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
        </div><!-- pos-relative -->
    </div><!-- col-sm-6 -->
    <div class="col-sm-6">
        <?php echo $validator->getError_dni_pago(); ?>
    </div>
    <div class="col-sm-6">
        <?php echo $validator->getError_monto_pago(); ?>
    </div>
    <div class="col-sm-6">							
        <p class="color-ash">Fecha de Pago*</p>
        <div class="pos-relative">
            <input type="text" name="fecha_pago" id='fecha_pago' value="<?php echo $validator->getFecha_pago(); ?>"/>
            <i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
        </div><!-- pos-relative -->
    </div><!-- col-sm-6 -->
    <div class="col-sm-6">							
    </div><!-- col-sm-6 -->
    <div class="col-sm-6">
        <?php echo $validator->getError_fecha_pago(); ?>
    </div><!-- col-sm-6 -->
    <div class="col-sm-6">							
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
    $(document).ready(function(){
        $("#dnii_pago").val($("#dni_pago option:selected").val());
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


