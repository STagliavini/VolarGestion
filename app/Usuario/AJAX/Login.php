<?php

if(isset($_POST['username'])){
    $nom_usu=$_POST['username'];
}
if(isset($_POST['password'])){
    $cont_usu=$_POST['password'];
}
$usuario=new Usuario(-1,$nom_usu,$cont_usu,"","",1);
Conexion::abrir_conexion();
$existe_usu=new Usuario(-1,$nom_usu,$cont_usu,"","",1);
$existe_usu=Consultas_Usuarios::buscarporNomyCont(Conexion::getconexion(), $usuario);
if($existe_usu->getId_Usuario()==-1){
    echo '<div class="alert alert-danger">Datos Incorrectos</div>';
}
else{
    ControlSesion::iniciar_sesion($existe_usu->getId_usuario(), $existe_usu->getNombre_usuario(), $existe_usu->getTipo_Usuario());
    Redireccion::redirigir(RUTA_AVION);
}
Conexion::cerrar_conexion();

