<?php

    if(isset($_SESSION['no_control'])){

    

?>
<link rel="stylesheet" href="<?=SERVIDOR?>css/form.css">


<div class="container mt-4">

    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#agregar_usuario">
        Agregar Usuario
    </button>
    <div class="row mt-2" style="text-align:center;">
    

        <?php
            require_once 'app/conexion.php';

            $conexion = conexion();
            
            $query = "SELECT id_usuario, no_control, nombre_usuario, apellido_paterno_usuario, apellido_materno_usuario,ocupacion, carrera, email, pass FROM usuarios";
            $result = mysqli_query($conexion, $query);
        ?>

        <table class="table table-dark opacidad" id="tabla_agregar_usuario">
            <thead>
                <td>ID Matricula</td>
                <td>No Control</td>
                <td>Nombre del Usuario</td>
                <td>Apellido Paterno</td>
                <td>Apellido Materno</td>
                <td>Carrera</td>
                <td>Email</td>
                <td>Ocupacion</td>
                <td>Contraseña</td>
                <td>Editar</td>
                <td>Eliminar</td>
            </thead>
            <tbody>
                <?php
                    while($usuarios = mysqli_fetch_array($result)){
                ?>
                <tr>
                    <th><?php echo $usuarios['id_usuario'];?></th>
                    <th><?php echo $usuarios['no_control'];?></th>
                    <th><?php echo $usuarios['nombre_usuario'];?></th>
                    <th><?php echo $usuarios['apellido_paterno_usuario'];?></th>
                    <th><?php echo $usuarios['apellido_materno_usuario'];?></th>
                    <th><?php echo $usuarios['carrera'];?></th>
                    <th><?php echo $usuarios['email'];?></th>
                    <th><?php echo $usuarios['ocupacion'];?></th>
                    <th><?php echo $usuarios['pass'];?></th>
                    <th>
                        <span id="btn_editar"
                            class="btn btn-outline-warning btn-sm"
                            type="button"
                            onclick="informacionUsuario(<?php echo $usuarios['id_usuario'];?>)"
                            data-bs-toggle="modal" data-bs-target="#actualizar_usuario">
                            <i class="far fa-edit"></i></span>
                    </th>
                    <th>
                        <span id="btn_eliminar"
                            class="btn btn-outline-danger btn-sm"
                            type="button"
                            onclick="eliminarUsuario(<?php echo $usuarios['id_usuario'];?>,`<?php echo $usuarios['nombre_usuario'];?>`)" >
                            <i class="fas fa-trash"></i>
                        </span>
                    </th>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>

    </div>
</div>

<!-- Modal Agregar Usuario -->

<div class="modal fade" id="agregar_usuario" tabindex="-1" aria-labelledby="agregar_usuarioLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="login-heading mb-4">Agregar Usuario</h3>
                <form action="POST" id="frm_agregar_usuario">
                    <div class="form-label-group">
                        <input type="text" id="inputControl" class="form-control" placeholder="Numero de Control"
                            required autofocus>
                        <label for="inputControl">Numero de Control</label>
                    </div>
                    <div class="form-label-group">
                        <input type="text" id="inputUsuario" class="form-control" placeholder="Nombre del Usuario"
                            required autofocus>
                        <label for="inputUsuario">Nombre del Usuario</label>
                    </div>
                    <div class="form-label-group">
                        <input type="text" id="inputApellido_p" class="form-control" placeholder="Apellido Paterno"
                            required autofocus>
                        <label for="inputApellido_p">Apellido Paterno</label>
                    </div>
                    <div class="form-label-group">
                        <input type="text" id="inputApellido_m" class="form-control" placeholder="Apellido Materno"
                            required autofocus>
                        <label for="inputApellido_m">Apellido Materno</label>
                    </div>

                    <div class="form-label-group">
                        <input type="email" id="inputCorreo" class="form-control" placeholder="Correo del Usuario"
                            required autofocus>
                        <label for="inputCorreo">Correo</label>
                    </div>

                    <div class="form-label-group">
                        <select class="form-control rounded-pill" aria-label=".form-select-lg example"
                            id="inputOcupacion">
                            <option selected value="">Ocupacion</option>
                            <option value="Estudiante">Estudiante</option>
                            <option value="Profesor">Profesor</option>
                            <option value="Administrador">Administrador</option>
                        </select>
                    </div>

                    <div class="form-label-group">
                        <select class="form-control rounded-pill" aria-label=".form-select-lg example"
                            id="inputCarrera">
                            <option selected value="">Carrera</option>
                            <option value="Sistemas">Sistemas</option>
                            <option value="Gestion">Gestion</option>
                            <option value="Industrial">Industrial</option>
                        </select>
                    </div>
                    <div class="form-label-group">
                        <input type="password" id="inputContraseña" class="form-control" placeholder="Contraseña"
                            required>
                        <label for="inputContraseña">Contraseña</label>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btn_guardar_info">Guardar </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Actualizar Usuario -->

<div class="modal fade" id="actualizar_usuario" tabindex="-1" aria-labelledby="actualizar_usuarioLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="login-heading mb-4">Actualizar Usuario</h3>
                <form action="POST" id="frm_actualizar_usuario">
                    <div class="">
                        <input type="hidden" id="id_usuario_actualizar">
                    </div>
                    <div class="form-label-group">
                        <input type="text" id="inputControlActualizar" class="form-control" placeholder="Numero de Control"
                            required autofocus >
                        <label for="inputControlActualizar">Numero de Control</label>
                    </div>
                    <div class="form-label-group">
                        <input type="text" id="inputUsuarioActualizar" class="form-control" placeholder="Nombre del Usuario"
                            required autofocus>
                        <label for="inputUsuarioActualizar">Nombre del Usuario</label>
                    </div>
                    <div class="form-label-group">
                        <input type="text" id="inputApellido_pActualizar" class="form-control" placeholder="Apellido Paterno"
                            required autofocus>
                        <label for="inputApellido_pActualizar">Apellido Paterno</label>
                    </div>
                    <div class="form-label-group">
                        <input type="text" id="inputApellido_mActualizar" class="form-control" placeholder="Apellido Materno"
                            required autofocus>
                        <label for="inputApellido_mActualizar">Apellido Materno</label>
                    </div>

                    <div class="form-label-group">
                        <input type="email" id="inputCorreoActualizar" class="form-control" placeholder="Correo del Usuario"
                            required autofocus>
                        <label for="inputCorreoActualizar">Correo</label>
                    </div>

                    <div class="form-label-group">
                        <select class="form-control rounded-pill" aria-label=".form-select-lg example"
                            id="inputOcupacionActualizar">
                            <option selected value="">Ocupacion</option>
                            <option value="Estudiante">Estudiante</option>
                            <option value="Profesor">Profesor</option>
                            <option value="Administrador">Administrador</option>
                        </select>
                    </div>
                    <div class="form-label-group">
                        <select class="form-control rounded-pill" aria-label=".form-select-lg example"
                            id="inputCarreraActualizar">
                            <option selected value="">Carrera</option>
                            <option value="Sistemas">Sistemas</option>
                            <option value="Gestion">Gestion</option>
                            <option value="Industrial">Industrial</option>
                        </select>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btn_actualizar_info">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="<?=SERVIDOR?>js/admin/agregar_usuario.js"></script>

<?php

    }else{
        header("location:login");
    }

?>