<?php

include_once '../Avion/Avion.php';
include_once '../BD/Conexion.php';
include_once '../Avion/Consultas/Consultas_Aviones.php';
include_once '../Tipo_Avion/Tipo_Avion.php';
include_once '../Tipo_Avion/Consultas/Consultas_Tipos_Aviones.php';
include_once '../Vuelo/Vuelo.php';
include_once '../Vuelo/Consultas/Consultas_Vuelos.php';
include_once '../Piloto/Piloto.php';
include_once '../Piloto/Consultas/Consultas_Pilotos.php';
include_once '../Pago/Pago.php';
include_once '../Pago/Consultas/Consultas_Pagos.php';
include_once '../Turno/Turno.php';
include_once '../Turno/Consultas/Consultas_Turnos.php';
include_once '../config.php';
Conexion::abrir_conexion();
if (isset($_POST['metodo'])) {
    $metodo = $_POST['metodo'];
    if ($metodo == 'Avion') {
        $pam = array();
        if (isset($_POST['matricula_avion'])) {
            $pam[] = $_POST['matricula_avion'];
        }
        if (isset($_POST['nombre_avion'])) {
            $pam[] = $_POST['nombre_avion'];
        }
        if (isset($_POST['descripcion_avion'])) {
            $pam[] = $_POST['descripcion_avion'];
        }
        if (isset($_POST['tipo_avion'])) {
            $pam[] = $_POST['tipo_avion'];
        }
        if (isset($_POST['largo'])) {
            $largo = $_POST['largo'];
        }
        if (isset($_POST['pag'])) {
            $pag = $_POST['pag'];
        }
        if (isset($pag)) {
            $desde = ((int) $pag * (int) $largo + 1);
            $hasta = $desde + $largo - 1;
        } else {
            $desde = 1;
            $hasta = $desde + $largo - 1;
        }
        $cantidad_reg = Consultas_Aviones::contRegistros(Conexion::getconexion(), $pam);
        if ($hasta > $cantidad_reg) {
            $hasta = $cantidad_reg;
        }
        $cantidad_most = ceil($cantidad_reg / $largo);
        echo '<div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="example_info" role="status" aria-live="polite">Mostrando de a ' . $largo . ' registros, desde ' . $desde . ' hasta ' . $hasta . ',del total de ' . $cantidad_reg . ' registros</div>
                            </div>';
        echo '<div class="col-sm-12 col-md-7">';
        echo '<nav aria-label="Page navigation example">';
        echo '<ul class="pagination">';
        echo '<li class="page-item"><button class="page-link" type="submit" onclick="return paganterior();">Anterior</button></li>';
        for ($index = 0; $index < $cantidad_most; $index++) {
            echo '<li class="page-item"><button class="page-link" type="submit" value=' . $index . ' onclick="return cambiar(' . $index . ');">' . ($index + 1) . '</button></li>';
        }
        echo '<li class="page-item"><button class="page-link" type="submit" onclick="return pagsiguiente(' . $cantidad_most . ');">Siguiente</button></li>';
        echo '</ul>';
        echo '</nav>';
        echo '</div>';
    } else {
        if ($metodo == 'TipoAvion') {
            $pam = array();
            if (isset($_POST['nombre_tipo_avion'])) {
                $pam[] = $_POST['nombre_tipo_avion'];
            }
            if (isset($_POST['precio_tipo_avion'])) {
                $pam[] = $_POST['precio_tipo_avion'];
            }
            if (isset($_POST['largo'])) {
                $largo = $_POST['largo'];
            }
            if (isset($_POST['pag'])) {
                $pag = $_POST['pag'];
            }
            if (isset($pag)) {
                $desde = ((int) $pag * (int) $largo + 1);
                $hasta = $desde + $largo - 1;
            } else {
                $desde = 1;
                $hasta = $desde + $largo - 1;
            }
            $cantidad_reg = Consultas_Tipos_Aviones::contRegistros(Conexion::getconexion(), $pam);
            if ($hasta > $cantidad_reg) {
                $hasta = $cantidad_reg;
            }
            $cantidad_most = ceil($cantidad_reg / $largo);
            echo '<div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="example_info" role="status" aria-live="polite">Mostrando de a ' . $largo . ' registros, desde ' . $desde . ' hasta ' . $hasta . ',del total de ' . $cantidad_reg . ' registros</div>
                            </div>';
            echo '<div class="col-sm-12 col-md-7">';
            echo '<nav aria-label="Page navigation example">';
            echo '<ul class="pagination">';
            echo '<li class="page-item"><button class="page-link" type="submit" onclick="return paganterior();">Anterior</button></li>';
            for ($index = 0; $index < $cantidad_most; $index++) {
                echo '<li class="page-item"><button class="page-link" type="submit" value=' . $index . ' onclick="return cambiar(' . $index . ');">' . ($index + 1) . '</button></li>';
            }
            echo '<li class="page-item"><button class="page-link" type="submit" onclick="return pagsiguiente(' . $cantidad_most . ');">Siguiente</button></li>';
            echo '</ul>';
            echo '</nav>';
            echo '</div>';
        } else {
            if ($metodo == 'Vuelo') {
                $pam = array();
                if (isset($_POST['fecha_vuelo'])) {
                    $pam[] = $_POST['fecha_vuelo'];
                }
                if (isset($_POST['salida_vuelo'])) {
                    $pam[] = $_POST['salida_vuelo'];
                }
                if (isset($_POST['llegada_vuelo'])) {
                    $pam[] = $_POST['llegada_vuelo'];
                }
                if (isset($_POST['origen_vuelo'])) {
                    $pam[] = $_POST['origen_vuelo'];
                }
                if (isset($_POST['destino_vuelo'])) {
                    $pam[] = $_POST['destino_vuelo'];
                }
                if (isset($_POST['aterrizajes_vuelo'])) {
                    $pam[] = $_POST['aterrizajes_vuelo'];
                }
                if (isset($_POST['piloto_vuelo'])) {
                    $pam[] = $_POST['piloto_vuelo'];
                }
                if (isset($_POST['copiloto_vuelo'])) {
                    $pam[] = $_POST['copiloto_vuelo'];
                }
                if (isset($_POST['avion_vuelo'])) {
                    $pam[] = $_POST['avion_vuelo'];
                }
                if (isset($_POST['largo'])) {
                    $largo = $_POST['largo'];
                }
                if (isset($_POST['pag'])) {
                    $pag = $_POST['pag'];
                }
                if (isset($pag)) {
                    $desde = ((int) $pag * (int) $largo + 1);
                    $hasta = $desde + $largo - 1;
                } else {
                    $desde = 1;
                    $hasta = $desde + $largo - 1;
                }
                $cantidad_reg = Consultas_Vuelos::contRegistros(Conexion::getconexion(), $pam);
                if ($hasta > $cantidad_reg) {
                    $hasta = $cantidad_reg;
                }
                $cantidad_most = ceil($cantidad_reg / $largo);
                echo '<div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="example_info" role="status" aria-live="polite">Mostrando de a ' . $largo . ' registros, desde ' . $desde . ' hasta ' . $hasta . ',del total de ' . $cantidad_reg . ' registros</div>
                            </div>';
                echo '<div class="col-sm-12 col-md-7">';
                echo '<nav aria-label="Page navigation example">';
                echo '<ul class="pagination">';
                echo '<li class="page-item"><button class="page-link" type="submit" onclick="return paganterior();">Anterior</button></li>';
                for ($index = 0; $index < $cantidad_most; $index++) {
                    echo '<li class="page-item"><button class="page-link" type="submit" value=' . $index . ' onclick="return cambiar(' . $index . ');">' . ($index + 1) . '</button></li>';
                }
                echo '<li class="page-item"><button class="page-link" type="submit" onclick="return pagsiguiente(' . $cantidad_most . ');">Siguiente</button></li>';
                echo '</ul>';
                echo '</nav>';
                echo '</div>';
            } else {
                if ($metodo == 'Piloto') {
                    $pam = array();
                    if (isset($_POST['dni_piloto'])) {
                        $pam[] = $_POST['dni_piloto'];
                    }
                    if (isset($_POST['apellido_piloto'])) {
                        $pam[] = $_POST['apellido_piloto'];
                    }
                    if (isset($_POST['nombre_piloto'])) {
                        $pam[] = $_POST['nombre_piloto'];
                    }
                    if (isset($_POST['nacimiento_piloto'])) {
                        $pam[] = $_POST['nacimiento_piloto'];
                    }
                    if (isset($_POST['mail_piloto'])) {
                        $pam[] = $_POST['mail_piloto'];
                    }
                    if (isset($_POST['deuda_piloto'])) {
                        $pam[] = $_POST['deuda_piloto'];
                    }
                    if (isset($_POST['largo'])) {
                        $largo = $_POST['largo'];
                    }
                    if (isset($_POST['pag'])) {
                        $pag = $_POST['pag'];
                    }
                    if (isset($pag)) {
                        $desde = ((int) $pag * (int) $largo + 1);
                        $hasta = $desde + $largo - 1;
                    } else {
                        $desde = 1;
                        $hasta = $desde + $largo - 1;
                    }
                    $cantidad_reg = Consultas_Pilotos::contRegistros(Conexion::getconexion(), $pam);
                    if ($hasta > $cantidad_reg) {
                        $hasta = $cantidad_reg;
                    }
                    $cantidad_most = ceil($cantidad_reg / $largo);
                    echo '<div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="example_info" role="status" aria-live="polite">Mostrando de a ' . $largo . ' registros, desde ' . $desde . ' hasta ' . $hasta . ',del total de ' . $cantidad_reg . ' registros</div>
                            </div>';
                    echo '<div class="col-sm-12 col-md-7">';
                    echo '<nav aria-label="Page navigation example">';
                    echo '<ul class="pagination">';
                    echo '<li class="page-item"><button class="page-link" type="submit" onclick="return paganterior();">Anterior</button></li>';
                    for ($index = 0; $index < $cantidad_most; $index++) {
                        echo '<li class="page-item"><button class="page-link" type="submit" value=' . $index . ' onclick="return cambiar(' . $index . ');">' . ($index + 1) . '</button></li>';
                    }
                    echo '<li class="page-item"><button class="page-link" type="submit" onclick="return pagsiguiente(' . $cantidad_most . ');">Siguiente</button></li>';
                    echo '</ul>';
                    echo '</nav>';
                    echo '</div>';
                } else {
                    if ($metodo == 'Pago') {
                        $pam = array();
                        if (isset($_POST['dni_pago'])) {
                            $pam[] = $_POST['dni_pago'];
                        }
                        if (isset($_POST['monto_pago'])) {
                            $pam[] = $_POST['monto_pago'];
                        }
                        if (isset($_POST['fecha_pago'])) {
                            $pam[] = $_POST['fecha_pago'];
                        }
                        if (isset($_POST['largo'])) {
                            $largo = $_POST['largo'];
                        }
                        if (isset($_POST['pag'])) {
                            $pag = $_POST['pag'];
                        }
                        if (isset($pag)) {
                            $desde = ((int) $pag * (int) $largo + 1);
                            $hasta = $desde + $largo - 1;
                        } else {
                            $desde = 1;
                            $hasta = $desde + $largo - 1;
                        }
                        $cantidad_reg = Consultas_Pagos::contRegistros(Conexion::getconexion(), $pam);
                        if ($hasta > $cantidad_reg) {
                            $hasta = $cantidad_reg;
                        }
                        $cantidad_most = ceil($cantidad_reg / $largo);
                        echo '<div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="example_info" role="status" aria-live="polite">Mostrando de a ' . $largo . ' registros, desde ' . $desde . ' hasta ' . $hasta . ',del total de ' . $cantidad_reg . ' registros</div>
                            </div>';
                        echo '<div class="col-sm-12 col-md-7">';
                        echo '<nav aria-label="Page navigation example">';
                        echo '<ul class="pagination">';
                        echo '<li class="page-item"><button class="page-link" type="submit" onclick="return paganterior();">Anterior</button></li>';
                        for ($index = 0; $index < $cantidad_most; $index++) {
                            echo '<li class="page-item"><button class="page-link" type="submit" value=' . $index . ' onclick="return cambiar(' . $index . ');">' . ($index + 1) . '</button></li>';
                        }
                        echo '<li class="page-item"><button class="page-link" type="submit" onclick="return pagsiguiente(' . $cantidad_most . ');">Siguiente</button></li>';
                        echo '</ul>';
                        echo '</nav>';
                        echo '</div>';
                    } else {
                        if ($metodo == 'Turno') {
                            $pam = array();
                            if (isset($_POST['piloto_turno'])) {
                                $pam[] = $_POST['piloto_turno'];
                            }
                            if (isset($_POST['copiloto_turno'])) {
                                $pam[] = $_POST['copiloto_turno'];
                            }
                            if (isset($_POST['fecha_turno'])) {
                                $pam[] = $_POST['fecha_turno'];
                            }
                            if (isset($_POST['salida_turno'])) {
                                $pam[] = $_POST['salida_turno'];
                            }
                            if (isset($_POST['llegada_turno'])) {
                                $pam[] = $_POST['llegada_turno'];
                            }
                            if (isset($_POST['avion_turno'])) {
                                $pam[] = $_POST['avion_turno'];
                            }
                            if (isset($_POST['aclaracion_turno'])) {
                                $pam[] = $_POST['aclaracion_turno'];
                            }
                            if (isset($_POST['largo'])) {
                                $largo = $_POST['largo'];
                            }
                            if (isset($_POST['pag'])) {
                                $pag = $_POST['pag'];
                            }
                            if (isset($_POST['turnometodo'])) {
                                $turnometodo = $_POST['turnometodo'];
                            }
                            if ($turnometodo == 0) {
                                $pam[7] = 0;
                            } else {
                                if ($turnometodo == 1) {
                                    $pam[7] = 1;
                                } else {
                                    if ($turnometodo == 2) {
                                        $pam[7] = 2;
                                    }
                                }
                            }
                            if (isset($pag)) {
                                $desde = ((int) $pag * (int) $largo + 1);
                                $hasta = $desde + $largo - 1;
                            } else {
                                $desde = 1;
                                $hasta = $desde + $largo - 1;
                            }
                            $cantidad_reg = Consultas_Turnos::contRegistros(Conexion::getconexion(), $pam);
                            if ($hasta > $cantidad_reg) {
                                $hasta = $cantidad_reg;
                            }
                            $cantidad_most = ceil($cantidad_reg / $largo);
                            echo '<div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="example_info" role="status" aria-live="polite">Mostrando de a ' . $largo . ' registros, desde ' . $desde . ' hasta ' . $hasta . ',del total de ' . $cantidad_reg . ' registros</div>
                            </div>';
                            echo '<div class="col-sm-12 col-md-7">';
                            echo '<nav aria-label="Page navigation example">';
                            echo '<ul class="pagination">';
                            echo '<li class="page-item"><button class="page-link" type="submit" onclick="return paganterior();">Anterior</button></li>';
                            for ($index = 0; $index < $cantidad_most; $index++) {
                                echo '<li class="page-item"><button class="page-link" type="submit" value=' . $index . ' onclick="return cambiar(' . $index . ');">' . ($index + 1) . '</button></li>';
                            }
                            echo '<li class="page-item"><button class="page-link" type="submit" onclick="return pagsiguiente(' . $cantidad_most . ');">Siguiente</button></li>';
                            echo '</ul>';
                            echo '</nav>';
                            echo '</div>';
                        }
                    }
                }
            }
        }
    }
}
Conexion::cerrar_conexion();
?>
