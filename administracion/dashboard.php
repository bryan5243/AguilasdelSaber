<?php
session_start();



if (!isset($_SESSION['id']) || empty($_SESSION['nombre']) || empty($_SESSION['rol'])) {
    session_destroy();


    header("location: login.php");
    exit();
}
error_reporting(E_ALL);
ini_set('display_errors', '1');

include_once "../layout/plantilla.php";
include_once "../administracion/menu.php";
include_once '../model/conexion.php';
?>
<!----------------Final del menu------------------->

<main>
    <h1>Dashboard</h1>

    <div class="date">
        <input type="date">
    </div>

    <div class="insights">
        <div class="sales">
            <span class="material-icons-sharp">analytics</span>
            <div class="middle">
                <div class="left">
                    <h3>Inactivos</h3>
                    <h1>5</h1>
                </div>

            </div>
            <small class="text-muted">Ahora</small>
        </div>


        <!----------fin sales------>


        <div class="expenses">
            <span class="material-icons-sharp">bar_chart</span>
            <div class="middle">
                <div class="left">
                    <h3>Matriculados</h3>
                    <h1>50</h1>
                </div>


            </div>
            <small class="text-muted">Ahora</small>
        </div>

        <div class="income">
            <span class="material-icons-sharp">stacked_line_chart</span>
            <div class="middle">
                <div class="left">
                    <h3>Total estudiantes</h3>
                    <h1>55</h1>
                </div>


            </div>
            <small class="text-muted">Ahora</small>
        </div>
    </div>


    <!----------Final estadistica------>


    <div class="recent-order">
        <h2>Recent orders</h2>
        <table>
            <thead>
                <tr>

                    <th>Cedula</th>
                    <th><span class="las la-sort"></span> Estudiante</th>
                    <th><span class="las la-sort"></span>Edad </th>
                    <th><span class="las la-sort"></span>Representante </th>
                    <th><span class="las la-sort"></span>Grado </th>
                    <th><span class="las la-sort"></span> ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>0705305843</td>
                    <td>Andrew Bruno</td>
                    <td>5</td>
                    <td>
                        Kennia Aguilar
                    </td>
                    <td>
                        Inicial 1
                    </td>
                    <td>
                        <div class="actions">
                            <span class="material-symbols-outlined">
                                contract
                            </span>
                            <span class="material-symbols-outlined">
                                delete
                            </span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>07012454646</td>
                    <td>Exty Bruno</td>
                    <td>10</td>
                    <td>
                        Lucas robertyo
                    </td>
                    <td>
                        Primero
                    </td>
                    <td>
                        <div class="actions">
                            <span class="material-symbols-outlined">
                                contract
                            </span>
                            <span class="material-symbols-outlined">
                                delete
                            </span>
                        </div>
                    </td>
                <tr>
                    <td>1157974561</td>
                    <td>Juan Rojas</td>
                    <td>
                        7
                    </td>
                    <td>
                        Marta Aguirre
                    </td>
                    <td>
                        Inicial 2
                    </td>
                    <td>
                        <div class="actions">
                            <span class="material-symbols-outlined">
                                contract
                            </span>
                            <span class="material-symbols-outlined">
                                delete
                            </span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>07059713643</td>
                    <td>Andrew Bruno</td>
                    </td>
                    <td>
                        9
                    </td>
                    <td>
                        Paulette Becerra
                    </td>
                    <td>
                        Segundo
                    </td>
                    <td>
                        <div class="actions">
                            <span class="material-symbols-outlined">
                                contract
                            </span>
                            <span class="material-symbols-outlined">
                                delete
                            </span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>08567168791</td>
                    <td>Lucas Valarezo</td>
                    <td>
                        8
                    </td>
                    <td>
                        Daniela Zumba
                    </td>
                    <td>
                        Primero
                    </td>

                    <td>
                        <div class="actions">
                            <span class="material-symbols-outlined">
                                contract
                            </span>
                            <span class="material-symbols-outlined">
                                delete
                            </span>
                        </div>
                    </td>

                </tr>
            </tbody>
        </table>
        <a href="#">Show all</a>

    </div>


</main>



<?php
include_once "./header.php";
?>
<script src="../js/tema.js"></script>
<script src="../js/menu.js"></script>