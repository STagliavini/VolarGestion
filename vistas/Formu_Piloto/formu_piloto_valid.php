
<div class="row">
    <input type="hidden" name="id_piloto" value="<?php echo $validator->getId_Piloto(); ?>"/>
    <div class="col-sm-6">	
        <p class="color-ash">DNI*</p>
        <div class="pos-relative">
            <input class="pr-20" type="text" id='dni_piloto' name="dni_piloto" value="<?php echo $validator->getDni_piloto(); ?>" <?php
            if ($validator->getId_piloto() != -1) {
                echo 'readonly';
            }
            ?>/>
        </div><!-- pos-relative -->
    </div><!-- col-sm-6 -->
    <div class="col-sm-6">							
        <p class="color-ash">Apellido*</p>
        <div class="pos-relative">
            <input type="text" name="apellido_piloto" id='apellido_piloto' value="<?php echo $validator->getApellido_piloto(); ?>"/>
            <i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
        </div><!-- pos-relative -->
    </div><!-- col-sm-6 -->
    <div class="col-sm-6">
        <?php echo $validator->getError_dni_piloto(); ?>
    </div>
    <div class="col-sm-6">
        <?php echo $validator->getError_apellido_piloto(); ?>
    </div>
    <div class="col-sm-6">	
        <p class="color-ash">Nombre*</p>
        <div class="pos-relative">
            <input class="pr-20" type="text" name="nombre_piloto" id='nombre_piloto' value="<?php echo $validator->getNombre_piloto(); ?>"/>
            <i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
        </div><!-- pos-relative -->
    </div><!-- col-sm-6 -->
    <div class="col-sm-6">
        <p class="color-ash">Fecha de Nacimiento*</p>
        <div class="pos-relative">
            <input class="pr-20" type="text" name="nacimiento_piloto" id='nacimiento_piloto' value="<?php echo $validator->getNacimiento_piloto(); ?>"/>
            <i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
        </div><!-- pos-relative -->
    </div>
    <div class="col-sm-6">
        <?php echo $validator->getError_nombre_piloto(); ?>
    </div>
    <div class="col-sm-6">
        <?php echo $validator->getError_nacimiento_piloto(); ?>
    </div>
    <div class="col-sm-6">
        <p class="color-ash">Mail</p>
        <div class="pos-relative">
            <input class="pr-20" type="text" name="mail_piloto" id="mail_piloto"/>
            <i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
        </div><!-- pos-relative -->
    </div>
    <div class="col-sm-6">
        <div class="pr-20"><label><p class="color-ash">Foto de Perfil</p></label><input type="file" name="archivo" id="archivo"/></div>
    </div>
    <div class="col-sm-6">
        <p class="color-ash">Deuda</p>
        <div class="pos-relative">
            <input class="pr-20" type="text" name="deuda_piloto" id="deuda_piloto" value="<?php echo $validator->getDeuda_Piloto(); ?>"/>
            <i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
        </div><!-- pos-relative -->
    </div>
    <div class="col-sm-6">
        <?php echo $validator->getError_mail_piloto(); ?>
    </div>
    <div class="col-sm-6">
        <?php echo $validator->getError_deuda_piloto(); ?>
    </div>
    <?php if($validator->getId_Piloto()!=-1){
        echo '<div class="col-sm-6">
        <label><p class="color-ash">Reestablecer Contrasenia</p></label>
        <input type="checkbox" class="form-check-input" id="reestrablecer" name="reestablecer">
    </div>
    <div class="col-sm-6">
        
    </div>';
    } ?>
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
<script>
    $('#agregar').click(function () {
        var form=$('#formu')[0];
        var form_data=new FormData(form);
        $.ajax({
            url: "app/Piloto/AJAX/agregarPiloto.php",
            type: 'POST',
            data: form_data,
            processData: false,
            contentType: false,
            success: function (res) {
                $('#formu').html(res);
                $('#datospilotos').load('app/Piloto/AJAX/listadoPilotos.php');
                paginar(0);
            }
        });
        return false;
    });
    $('#cancelar').click(function () {
        $('#formu').trigger('reset');
        return false;
    });
    $('#dni_piloto').keyup(function () {
        var modobusc = $('input[id="modbusc"]:checked').length;
        if (modobusc > 0) {
            $.ajax({
                url: "app/Piloto/AJAX/listadoPilotos.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datospilotos').html(res);
                }
            });
            paginar(0);
        } else {
            $('#datospilotos').load('app/Piloto/AJAX/listadoPilotos.php');
        }
    });
    $('#apellido_piloto').keyup(function () {
        var modobusc = $('input[id="modbusc"]:checked').length;
        if (modobusc > 0) {
            $.ajax({
                url: "app/Piloto/AJAX/listadoPilotos.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datospilotos').html(res);
                }
            });
            paginar(0);
        } else {
            $('#datospilotos').load('app/Piloto/AJAX/listadoPilotos.php');
        }
    });
    $('#nombre_piloto').keyup(function () {
        var modobusc = $('input[id="modbusc"]:checked').length;
        if (modobusc > 0) {
            $.ajax({
                url: "app/Piloto/AJAX/listadoPilotos.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datospilotos').html(res);
                }
            });
            paginar(0);
        } else {
            $('#datospilotos').load('app/Piloto/AJAX/listadoPilotos.php');
        }
    });
    $('#nacimiento_piloto').keyup(function () {
        var modobusc = $('input[id="modbusc"]:checked').length;
        if (modobusc > 0) {
            $.ajax({
                url: "app/Piloto/AJAX/listadoPilotos.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datospilotos').html(res);
                }
            });
            paginar(0);
        } else {
            $('#datospilotos').load('app/Piloto/AJAX/listadoPilotos.php');
        }
    });
    $('#deuda_piloto').keyup(function () {
        var modobusc = $('input[id="modbusc"]:checked').length;
        if (modobusc > 0) {
            $.ajax({
                url: "app/Piloto/AJAX/listadoPilotos.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datospilotos').html(res);
                }
            });
            paginar(0);
        } else {
            $('#datospilotos').load('app/Piloto/AJAX/listadoPilotos.php');
        }
    });
    $('#mail_piloto').keyup(function () {
        var modobusc = $('input[id="modbusc"]:checked').length;
        if (modobusc > 0) {
            $.ajax({
                url: "app/Piloto/AJAX/listadoPilotos.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datospilotos').html(res);
                }
            });
            paginar(0);
        } else {
            $('#datospilotos').load('app/Piloto/AJAX/listadoPilotos.php');
        }
    });
    $('#modbusc').click(function () {
        var modobusc = $('input[id="modbusc"]:checked').length;
        if (modobusc > 0) {
            $.ajax({
                url: "app/Piloto/AJAX/listadoPilotos.php",
                type: 'POST',
                data: $('#formu').serialize(),
                success: function (res) {
                    $('#datospilotos').html(res);
                }
            });
            paginar(0);
        } else {
            $('#datospilotos').load('app/Piloto/AJAX/listadoPilotos.php');
            paginar(0);
        }
    });
    function paginar(pagina) {
                var modobusc = $('input[id="modbusc"]:checked').length;
                if (modobusc > 0) {
                    $.ajax({
                        url: "app/Paginador/Paginar.php",
                        type: 'POST',
                        data: "dni_piloto=" + document.getElementById("dni_piloto").value + "&apellido_piloto=" + document.getElementById("apellido_piloto").value + "&nombre_piloto=" + document.getElementById("nombre_piloto").value +"&nacimiento_piloto=" + document.getElementById("nacimiento_piloto").value +"&mail_piloto="+document.getElementById("mail_piloto").value+"&deuda_piloto="+document.getElementById("deuda_piloto").value+"&metodo=Piloto"+"&largo="+document.getElementById("largo").value+"&pag="+pagina,
                        success: function (res) {
                            $('#paginador').html(res);
                        }
                    });
                    return false;
                } else {
                    $.ajax({
                        url: "app/Paginador/Paginar.php",
                        type: 'POST',
                        data: "metodo=Piloto"+"&largo="+document.getElementById("largo").value+"&pag="+pagina,
                        success: function (res) {
                            $('#paginador').html(res);
                        }
                    });
                    return false;
                }
            }
</script>


