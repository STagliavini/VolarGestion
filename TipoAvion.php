<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>Avatars - Atlantis Lite Bootstrap 4 Admin Dashboard</title>
        <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
        <link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>
        <link href="https://fonts.googleapis.com/css?family=Encode+Sans+Expanded:400,600,700" rel="stylesheet"/>
        <link href="assets/fonts/ionicons.css" rel="stylesheet" type="text/css"/>
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/styles.css" rel="stylesheet" type="text/css"/>
        <!-- Fonts and icons -->
        <script src="assets/js/plugin/webfont/webfont.min.js"></script>
        <script>
            WebFont.load({
                google: {"families": ["Lato:300,400,700,900"]},
                custom: {"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['assets/css/fonts.min.css']},
                active: function () {
                    sessionStorage.fonts = true;
                }
            });
        </script>

        <!-- CSS Files -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/atlantis.min.css">
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link rel="stylesheet" href="assets/css/demo.css">
    </head>
    <body>
    <?php
        include_once 'app/Usuario/Consultas/Consultas_Usuarios.php';
        include_once 'app/Usuario/Usuario.php';
        include_once 'app/Piloto/Consultas/Consultas_Pilotos.php';
        include_once 'app/Piloto/Piloto.php';
        include_once 'app/Sesion/ControlSesion.inc.php';
        include_once 'app/BD/Conexion.php';
        include_once 'app/config.php';
        include_once 'app/Redireccion/Redireccion.inc.php';
        Conexion::abrir_conexion();
        if(ControlSesion::sesion_iniciada()){
            $usuario=Consultas_Usuarios::buscarporNombre(Conexion::getconexion(), $_SESSION['nombre_usuario']);
            $piloto=Consultas_Pilotos::buscarporDni(Conexion::getconexion(), $_SESSION['nombre_usuario']);
        }
        else{
            Redireccion::redirigir(RUTA_HOME);
        }
        Conexion::cerrar_conexion();
        ?>
        <div class="wrapper">
            <div class="main-header">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="blue">

                    <a href="TipoAvion.php" class="logo">
                        <img src="logos/logo-mac.jpg" alt="navbar brand" class="navbar-brand" height="100%" width="100%">
                    </a>
                    <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <i class="icon-menu"></i>
                        </span>
                    </button>
                    <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="icon-menu"></i>
                        </button>
                    </div>
                </div>
                <!-- End Logo Header -->

                <!-- Navbar Header -->
                <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

                    <div class="container-fluid">
                        
                        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                            <li class="nav-item toggle-nav-search hidden-caret">
                                <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
                                    <i class="fa fa-search"></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown hidden-caret">
                                <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                                    <i class="fas fa-layer-group"></i>
                                </a>
                                <div class="dropdown-menu quick-actions quick-actions-info animated fadeIn">
                                    <div class="quick-actions-header">
                                        <span class="title mb-1">Quick Actions</span>
                                        <span class="subtitle op-8">Shortcuts</span>
                                    </div>
                                    <div class="quick-actions-scroll scrollbar-outer">
                                        <div class="quick-actions-items">
                                            <div class="row m-0">
                                                <a class="col-6 col-md-4 p-0" href="#">
                                                    <div class="quick-actions-item">
                                                        <i class="flaticon-file-1"></i>
                                                        <span class="text">Generated Report</span>
                                                    </div>
                                                </a>
                                                <a class="col-6 col-md-4 p-0" href="#">
                                                    <div class="quick-actions-item">
                                                        <i class="flaticon-database"></i>
                                                        <span class="text">Create New Database</span>
                                                    </div>
                                                </a>
                                                <a class="col-6 col-md-4 p-0" href="#">
                                                    <div class="quick-actions-item">
                                                        <i class="flaticon-pen"></i>
                                                        <span class="text">Create New Post</span>
                                                    </div>
                                                </a>
                                                <a class="col-6 col-md-4 p-0" href="#">
                                                    <div class="quick-actions-item">
                                                        <i class="flaticon-interface-1"></i>
                                                        <span class="text">Create New Task</span>
                                                    </div>
                                                </a>
                                                <a class="col-6 col-md-4 p-0" href="#">
                                                    <div class="quick-actions-item">
                                                        <i class="flaticon-list"></i>
                                                        <span class="text">Completed Tasks</span>
                                                    </div>
                                                </a>
                                                <a class="col-6 col-md-4 p-0" href="#">
                                                    <div class="quick-actions-item">
                                                        <i class="flaticon-file"></i>
                                                        <span class="text">Create New Invoice</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown hidden-caret">
                                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                                    <div class="avatar-sm">
                                        <img src="<?php if($usuario[0]->getPerfil_Usuario()!='recursos/fotos_usuarios/'&&$usuario[0]->getPerfil_Usuario()!=''){echo $usuario[0]->getPerfil_Usuario();}else{echo 'recursos/fotos_usuarios/desconocido.jpg';} ?>" alt="..." class="avatar-img rounded-circle">
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-user animated fadeIn">
                                    <div class="dropdown-user-scroll scrollbar-outer">
                                        <li>
                                            <div class="user-box">
                                                <div class="avatar-lg"><img src="<?php if($usuario[0]->getPerfil_Usuario()!='recursos/fotos_usuarios/'&&$usuario[0]->getPerfil_Usuario()!=''){echo $usuario[0]->getPerfil_Usuario();}else{echo 'recursos/fotos_usuarios/desconocido.jpg';} ?>" alt="image profile" class="avatar-img rounded"></div>
                                                <div class="u-text">
                                                    <h4><?php echo $usuario[1]; ?></h4>
                                                    <p class="text-muted"><?php if($piloto->getMail_piloto()!=''){echo $piloto->getMail_piloto();}else{echo 'No existe e-mail';} ?></p><a href="profile.html" class="btn btn-xs btn-secondary btn-sm">Mi Perfil</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="CambiarContrasenia.php">Cambiar Contrasenia</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="index.php">Cerrar Sesion</a>
                                        </li>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
            <!-- Sidebar -->
            <div class="sidebar sidebar-style-2">

                <div class="sidebar-wrapper scrollbar scrollbar-inner">
                    <div class="sidebar-content">
                        <div class="user">
                            <div class="avatar-sm float-left mr-2">
                                <img src="<?php if($usuario[0]->getPerfil_Usuario()!='recursos/fotos_usuarios/'&&$usuario[0]->getPerfil_Usuario()!=''){echo $usuario[0]->getPerfil_Usuario();}else{echo 'recursos/fotos_usuarios/desconocido.jpg';} ?>" alt="..." class="avatar-img rounded-circle">
                            </div>
                            <div class="info">
                                <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                    <span>
                                        <?php echo $usuario[1]; ?>
                                        <span class="user-level"><?php echo $usuario[0]->getTipo_Usuario(); ?></span>
                                        <span class="caret"></span>
                                    </span>
                                </a>
                                <div class="clearfix"></div>

                                <div class="collapse in" id="collapseExample">
                                    <ul class="nav">
                                        <li>
                                            <a href="#profile">
                                                <span class="link-collapse">My Profile</span>
                                            </a>
                                        </li>
                                        <br>
                                        <li>
                                            <a href="#edit">
                                                <span class="link-collapse">Edit Profile</span>
                                            </a>
                                        </li>
                                        <br>
                                        <li>
                                            <a href="#settings">
                                                <span class="link-collapse">Settings</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-primary">
                            <li class="nav-section">
                                <span class="sidebar-mini-icon">
                                    <i class="fa fa-ellipsis-h"></i>
                                </span>
                                <h4 class="text-section">Modulos</h4>
                            </li>
                            <li class="nav-item">
                                <a href="Avion.php">
                                    <i class="fas fa-plane"></i>
                                    <p>Avion</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="Piloto.php">
                                    <i class="fas fa-user"></i>
                                    <p>Piloto</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="TipoAvion.php">
                                    <i class="fas fa-plane"></i>
                                    <p>Avion por Tipo</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="Vuelo.php">
                                    <i class="fas fa-plane-departure"></i>
                                    <p>Vuelo</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="Pago.php">
                                    <i class="fas fa-money-bill"></i>
                                    <p>Pagos</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="Turno.php">
                                    <i class="fas fa-bell"></i>
                                    <p>Turno</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="main-panel">
                <div class="content">
                    <div class="page-inner">
                        
                        <div class="row">
                            <div class="col-sm-12 col-md-8">
                        <h3><b>FORMULARIO TIPOS DE AVIONES</b></h3>
                        <p class="mb-30 mr-100 mr-sm-0">Ingrese los datos de los tipos de aviones</p>
                        <form class="form-block form-bold form-mb-20 form-h-35 form-brdr-b-grey pr-50 pr-sm-0" method="POST" id="formu">

                        </form>
                        <br>
                        <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <label>Mostrar<select name="largo" id="largo" aria-controls="example" class="custom-select custom-select-sm form-control form-control-sm"><option value="1" selected>10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select></label>
                                    </div>
                                </div>
                        <table class="table">
                            <thead>
                            <th>Nombre de Tipo</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                            </thead>
                            <tbody id="datostiposaviones">

                            </tbody>
                        </table>
                        <input type="hidden" id='actualpage' value='0'/>
                    </div><!-- col-md-6 -->

                    <div class="col-sm-12 col-md-4">
                        <h3 class="mb-20 mt-sm-50"><b>INFORMACION DE CAMPOS</b></h3>

                        <ul class="font-11 list-relative list-li-pl-30 list-block list-li-mb-15">
                            <li><i class="abs-tl ion-android-add-circle"></i>Codigo: numerico, maximo de 11 digitos no vacio.</li>
                            <li><i class="abs-tl ion-android-add-circle"></i>Nombre: numerico, maximo de 100 digitos.</li>
                            <li><i class="abs-tl ion-android-add-circle"></i>Descripcion: texto, maximo de 30 caracteres.</li>
                        </ul>
                    </div><!-- col-md-6 -->
                        </div>
                        <div class="row" id="paginador">
                            
                        </div>
                        <div class="row" id="pag">
                            
                        </div>
                    </div>
                </div>
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="copyright ml-auto">
                            2020, &copy; MANOGASTA AVIATION CENTER S.R.L
                        </div>				
                    </div>
                </footer>
            </div>
        </div>

        <!-- Custom template | don't include it in your project! -->
        <div class="custom-template">
            <div class="title">Settings</div>
            <div class="custom-content">
                <div class="switcher">
                    <div class="switch-block">
                        <h4>Logo Header</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeLogoHeaderColor" data-color="dark"></button>
                            <button type="button" class="selected changeLogoHeaderColor" data-color="blue"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="green"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="red"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="white"></button>
                            <br/>
                            <button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Navbar Header</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeTopBarColor" data-color="dark"></button>
                            <button type="button" class="changeTopBarColor" data-color="blue"></button>
                            <button type="button" class="changeTopBarColor" data-color="purple"></button>
                            <button type="button" class="changeTopBarColor" data-color="light-blue"></button>
                            <button type="button" class="changeTopBarColor" data-color="green"></button>
                            <button type="button" class="changeTopBarColor" data-color="orange"></button>
                            <button type="button" class="changeTopBarColor" data-color="red"></button>
                            <button type="button" class="changeTopBarColor" data-color="white"></button>
                            <br/>
                            <button type="button" class="changeTopBarColor" data-color="dark2"></button>
                            <button type="button" class="selected changeTopBarColor" data-color="blue2"></button>
                            <button type="button" class="changeTopBarColor" data-color="purple2"></button>
                            <button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
                            <button type="button" class="changeTopBarColor" data-color="green2"></button>
                            <button type="button" class="changeTopBarColor" data-color="orange2"></button>
                            <button type="button" class="changeTopBarColor" data-color="red2"></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Sidebar</h4>
                        <div class="btnSwitch">
                            <button type="button" class="selected changeSideBarColor" data-color="white"></button>
                            <button type="button" class="changeSideBarColor" data-color="dark"></button>
                            <button type="button" class="changeSideBarColor" data-color="dark2"></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Background</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeBackgroundColor" data-color="bg2"></button>
                            <button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
                            <button type="button" class="changeBackgroundColor" data-color="bg3"></button>
                            <button type="button" class="changeBackgroundColor" data-color="dark"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--   Core JS Files   -->
        <script src="assets/js/core/jquery.3.2.1.min.js"></script>
        <script src="assets/js/core/popper.min.js"></script>
        <script src="assets/js/core/bootstrap.min.js"></script>
        <!-- jQuery UI -->
        <script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
        <script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

        <!-- jQuery Scrollbar -->
        <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
        <!-- Atlantis JS -->
        <script src="assets/js/atlantis.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#formu').load('vistas/Formu_Tipo_Avion/formu_tipo_avion.php');
                $('#datostiposaviones').load('app/Tipo_Avion/AJAX/listadoTipo_Aviones.php');
                paginar(0);
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
            
            function verificar(id_tipo_avion) {
                $.ajax({
                    url: "app/Tipo_Avion/AJAX/modificarTipo_Avion.php",
                    type: 'POST',
                    data: "id_tipo_avion=" + id_tipo_avion,
                    success: function (res) {
                        $('#formu').html(res);
                    }
                });
                return false;
            }
            function eliminar(id_tipo_avion) {
                if (confirm('Desea confirmar el borrado del tipo de avion?')) {
                    $.ajax({
                        url: "app/Tipo_Avion/AJAX/borrarTipo_Avion.php",
                        type: 'POST',
                        data: "id_tipo_avion=" + id_tipo_avion,
                        success: function (res) {
                            $('#formu').html(res);
                            $('#datostiposaviones').load('app/Tipo_Avion/AJAX/listadoTipo_Aviones.php');
                            paginar(0);
                        }
                    });
                    return false;
                } else {
                    return false;
                }
            }
            function cambiar(pagina) {
                var modobusc = $('input[id="modbusc"]:checked').length;
                document.getElementById("actualpage").value = pagina;
                if (modobusc > 0) {
                    $.ajax({
                        url: "app/Tipo_Avion/AJAX/listadoTipo_Aviones.php",
                        type: 'POST',
                        data: "pagina=" + pagina + "&nombre_tipo_avion="+document.getElementById("nombre_tipo_avion").value+"&precio_tipo_avion="+document.getElementById("precio_tipo_avion").value+"&largo="+document.getElementById("largo").value,
                        success: function (res) {
                            $('#datostiposaviones').html(res);
                            paginar(pagina);
                        }
                    });
                    return false;
                } else {
                    $.ajax({
                        url: "app/Tipo_Avion/AJAX/listadoTipo_Aviones.php",
                        type: 'POST',
                        data: "pagina=" + pagina+"&largo="+document.getElementById("largo").value,
                        success: function (res) {
                            $('#datostiposaviones').html(res);
                            paginar(pagina);
                        }
                    });
                    return false;
                }
            }
            function pagsiguiente(cantmost) {
                var modobusc = $('input[id="modbusc"]:checked').length;
                if (parseInt(document.getElementById('actualpage').value) < cantmost - 1) {
                    pagina = parseInt(document.getElementById("actualpage").value) + 1;
                    document.getElementById("actualpage").value = parseInt(document.getElementById("actualpage").value) + 1;
                }
                else{
                    pagina=parseInt(document.getElementById('actualpage').value);
                }
                if (modobusc > 0) {
                    $.ajax({
                        url: "app/Tipo_Avion/AJAX/listadoTipo_Aviones.php",
                        type: 'POST',
                        data: "pagina=" + pagina + "&nombre_tipo_avion="+document.getElementById("nombre_tipo_avion").value+"&precio_tipo_avion="+document.getElementById("precio_tipo_avion").value+"&largo="+document.getElementById("largo").value,
                        success: function (res) {
                            $('#datostiposaviones').html(res);
                            paginar(pagina);
                        }
                    });
                    return false;
                } else {
                    $.ajax({
                        url: "app/Tipo_Avion/AJAX/listadoTipo_Aviones.php",
                        type: 'POST',
                        data: "pagina=" + pagina+"&largo="+document.getElementById("largo").value,
                        success: function (res) {
                            $('#datostiposaviones').html(res);
                            paginar(pagina);
                        }
                    });
                    return false;
                }
            }
            function paganterior() {
                var modobusc = $('input[id="modbusc"]:checked').length;
                if (parseInt(document.getElementById('actualpage').value) > 0) {
                    pagina = parseInt(document.getElementById("actualpage").value) - 1;
                    document.getElementById("actualpage").value = parseInt(document.getElementById("actualpage").value) - 1;
                }
                else{
                    pagina=parseInt(document.getElementById('actualpage').value);
                }
                if (modobusc > 0) {
                    $.ajax({
                        url: "app/Tipo_Avion/AJAX/listadoTipo_Aviones.php",
                        type: 'POST',
                        data: "pagina=" + pagina + "&nombre_tipo_avion="+document.getElementById("nombre_tipo_avion").value+"&precio_tipo_avion="+document.getElementById("precio_tipo_avion").value+"&largo="+document.getElementById("largo").value,
                        success: function (res) {
                            $('#datostiposaviones').html(res);
                            paginar(pagina);
                        }
                    });
                    return false;
                } else {
                    $.ajax({
                        url: "app/Tipo_Avion/AJAX/listadoTipo_Aviones.php",
                        type: 'POST',
                        data: "pagina=" + pagina+"&largo="+document.getElementById("largo").value,
                        success: function (res) {
                            $('#datostiposaviones').html(res);
                            paginar(pagina);
                        }
                    });
                    return false;
                }
            }
            $('#largo').change(function () {
        var modobusc = $('input[id="modbusc"]:checked').length;
        if (modobusc > 0) {
            $.ajax({
                url: "app/Tipo_Avion/AJAX/listadoTipo_Aviones.php",
                type: 'POST',
                data: $('#formu').serialize()+"&largo="+document.getElementById("largo").value,
                success: function (res) {
                    $('#datostiposaviones').html(res);
                }
            });
            paginar(0);
        } else {
            $.ajax({
                        url: "app/Tipo_Avion/AJAX/listadoTipo_Aviones.php",
                        type: 'POST',
                        data: "largo="+document.getElementById("largo").value,
                        success: function (res) {
                            $('#datostiposaviones').html(res);
                        }
                    });
                    paginar(0);
                    return false;
        }
    });
        </script>
    </body>
</html>