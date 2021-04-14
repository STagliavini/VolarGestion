<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="https://fonts.googleapis.com/css?family=Encode+Sans+Expanded:400,600,700" rel="stylesheet"/>
        <link href="assets/fonts/ionicons.css" rel="stylesheet" type="text/css"/>
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/styles.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/login.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="d-flex justify-content-center h-100">
                <div class="card">
                    <div class="card-header">
                        <h3>Inicio de Sesion</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Nombre de Usuario" id="username" name="username">

                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control" placeholder="Contrasenia" id="password" name="password">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Login" class="btn float-right login_btn" id="login" name="login">
                            </div>
                        </form>
                    </div>
                    <?php
                        include_once 'app/Usuario/Consultas/Consultas_Usuarios.php';
                        include_once 'app/Usuario/Usuario.php';
                        include_once 'app/Sesion/ControlSesion.inc.php';
                        include_once 'app/Redireccion/Redireccion.inc.php';
                        include_once 'app/config.php';
                        include_once 'app/BD/Conexion.php';
                        if(ControlSesion::sesion_iniciada()){
                            ControlSesion::cerrar_sesion();
                        }
                        if (isset($_POST['login'])) {
                            include_once 'app/Usuario/AJAX/Login.php';
                        }
                        ?>
                </div>
            </div>
        </div>
        <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/js/jquery.min.js" type="text/javascript"></script>
        <script src="assets/js/scripts.js" type="text/javascript"></script>
        <script src="assets/js/tether.min.js" type="text/javascript"></script>
    </body>
</html>
