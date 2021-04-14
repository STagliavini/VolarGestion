<?php

include_once '../Piloto.php';
include_once '../../Usuario/Usuario.php';
include_once '../../BD/Conexion.php';
include_once '../Consultas/Consultas_Pilotos.php';
include_once '../../Usuario/Consultas/Consultas_Usuarios.php';
include_once '../../config.php';
include_once '../Validator/ValidadorPiloto.php';
Conexion::abrir_conexion();
$id_piloto = -1;
$ruta_imagenes = "recursos/fotos_usuarios/";
$nombre_archivo = $_FILES['archivo']['name'];
$tipo_archivo = $_FILES['archivo']['type'];
$tamanio = ($_FILES["archivo"]["size"] / 1024);
$temporal = $_FILES['archivo']['tmp_name'];
$ruta_imagenes = $ruta_imagenes . basename($_FILES['archivo']['name']);
$subir = "../../../" . $ruta_imagenes;
$archivo_subido = move_uploaded_file($temporal, $subir);
if (isset($_POST['id_piloto'])) {
    $id_piloto = $_POST['id_piloto'];
}
if ($id_piloto != -1 || !isset($id_piloto)) {
    $validator = new ValidadorPiloto($_POST['id_piloto'], $_POST['dni_piloto'], $_POST['apellido_piloto'], $_POST['nombre_piloto'], $_POST['nacimiento_piloto'],$_POST['mail_piloto'], $_POST['deuda_piloto']);
} else {
    $validator = new ValidadorPiloto(-1, $_POST['dni_piloto'], $_POST['apellido_piloto'], $_POST['nombre_piloto'], $_POST['nacimiento_piloto'],$_POST['mail_piloto'], $_POST['deuda_piloto']);
}
$piloto_insertado = '';
if ($validator->registroValido()) {
    if ($id_piloto != -1 || !isset($id_piloto)) {
        $piloto = new Piloto($_POST['id_piloto'], $validator->getDni_piloto(), $validator->getApellido_piloto(), $validator->getNombre_piloto(), $validator->getNacimiento_piloto(),$validator->getMail_piloto(), $validator->getDeuda_piloto());
    } else {
        $piloto = new Piloto(-1, $validator->getDni_piloto(), $validator->getApellido_piloto(), $validator->getNombre_piloto(), $validator->getNacimiento_piloto(),$validator->getMail_piloto(), $validator->getDeuda_piloto());
    }
    $piloto_insertado = Consultas_Pilotos::insertar_piloto(Conexion::getconexion(), $piloto);
    $validator->limpiar();
}
if ($piloto_insertado == 'Actualizado') {
    $validator->setId_piloto(-1);
}
include_once '../../../vistas/Formu_Piloto/formu_piloto_valid.php';
if ($piloto_insertado == 'Insertado') {
    echo '<br><div class="row"><br><div class="col-sm-6">
        <p class="alert alert-success">Piloto Insertado!!!!<br>
        DNI:' . $piloto->getDni_piloto() . '.<br>
        Apellido:' . $piloto->getApellido_piloto() . '.<br>
        Nombre:' . $piloto->getNombre_piloto() . '.<br>
        Fecha de Nacimiento:' . $piloto->getNacimiento_piloto() . '<br>
        Mail:' . $piloto->getMail_piloto() . '<br>
        Deuda:' . $piloto->getDeuda_piloto() . '</p>
    </div></div>';
    $usuario_insertado = '';
    $val_nac = explode("/", $piloto->getNacimiento_piloto());
    $contrasenia = $piloto->getApellido_piloto() . '' . $val_nac[2];
    $usuario = new Usuario(-1, $piloto->getDni_piloto(), $contrasenia, "Piloto", $ruta_imagenes, 1);
    $usuario_insertado = Consultas_Usuarios::insertar_usuario(Conexion::getconexion(), $usuario);
    if ($usuario_insertado == 'Insertado') {
        echo '<br><div class="row"><br><div class="col-sm-6">
        <p class="alert alert-success">Usuario Generado!!!!<br>
        Nombre de Usuario:' . $piloto->getDni_piloto() . '.<br>
        Contrasenia:' . $contrasenia . '.<br>
        Tipo de Usuario:' . $usuario->getTipo_usuario() . '</p>
    </div></div>';
        $archivo_subido = move_uploaded_file($temporal, $ruta_imagenes);
    }
} else if ($piloto_insertado == 'Actualizado') {
    echo '<br><div class="row"><br><div class="col-sm-6">
        <p class="alert alert-success">Piloto Actualizado!!!!<br>
        DNI:' . $piloto->getDni_piloto() . '.<br>
        Apellido:' . $piloto->getApellido_piloto() . '.<br>
        Nombre:' . $piloto->getNombre_piloto() . '.<br>
        Fecha de Nacimiento:' . $piloto->getNacimiento_piloto() . '<br>
        Mail:' . $piloto->getMail_piloto() . '<br>
        Deuda:' . $piloto->getDeuda_piloto() . '</p>
    </div></div>';
    $usuario_actu = '';
    $val_nac = explode("/", $piloto->getNacimiento_piloto());
    $contrasenia = $piloto->getApellido_piloto() . '' . $val_nac[2];
    $datos= Consultas_Usuarios::buscarporNombre(Conexion::getconexion(), $piloto->getDni_piloto());
    $perfil_usuario_valid=$datos[0]->getPerfil_usuario();
    if(!isset($_POST['reestablecer'])){
        $contrasenia=$datos[0]->getContrasenia_usuario();
    }
    if (($perfil_usuario_valid != '' && $ruta_imagenes == 'recursos/fotos_usuarios/')||($perfil_usuario_valid != '' && $ruta_imagenes == '')) {
        $ruta_imagenes=$perfil_usuario_valid;
    }
    $usuario = new Usuario(0, $piloto->getDni_piloto(), $contrasenia, "Piloto", $ruta_imagenes, 1);
    $usuario_actu = Consultas_Usuarios::insertar_usuario(Conexion::getconexion(), $usuario);
    if ($usuario_actu == 'Actualizado') {
        echo '<br><div class="row"><br><div class="col-sm-6">
        <p class="alert alert-success">Usuario Actualizado!!!!<br>
        Nombre de Usuario:' . $piloto->getDni_piloto() . '.<br>
        Contrasenia:' . $contrasenia . '.<br>
        Tipo de Usuario:' . $usuario->getTipo_usuario() . '</p>
    </div></div>';
        $archivo_subido = move_uploaded_file($temporal, $subir);
    }
} else if ($piloto_insertado == 'Error') {
    echo '<br><div class="row"><br><div class="col-sm-6">
        <p class="alert alert-danger">Error!!!!</div></div>';
}
Conexion::cerrar_conexion();
?>

