<?php
use app\controllers\UsuarioController;
$usuarioController = new UsuarioController();

$usuarios =$usuarioController->listarUsuarios();
?>

<section class="section">
    <div class="columns is-fluid is-vcentered is-mobile">
        <div class="column">
            <h1 class="title">Usuarios</h1>
            <h2 class="subtitle">Lista de usuarios</h2>
        </div>
        <div class="column is-narrow">
            <a href="<?php echo APP_URL ?>usuario/crear_usuario"
               class="button is-rounded is-success">
                <i class="fa-solid fa-user-plus pr-1"></i> Nuevo Usuario
            </a>
            <a href="<?php echo APP_URL ?>usuario/pdf_usuario"
               class="button is-rounded is-danger">
                <i class="fa-solid fa-file-pdf pr-1"></i> PDF
            </a>
            <a href="<?php echo APP_URL ?>usuario/excel_usuario"
               class="button is-rounded is-primary">
                <i class="fa-solid fa-file-excel pr-1"></i> EXCEL
            </a>
        </div>
    </div>

    <div class="table-container">
        <table class="table is-rounded is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Usuario</th>
                    <th>Correo</th>
                    <th class="has-text-centered"
                        colspan="2">Opciones
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($usuarios as $usuario):
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($usuario['id_usuario']) ?></td>
                    <td><?php echo htmlspecialchars($usuario['nombres']) ?></td>
                    <td><?php echo htmlspecialchars($usuario['apellidos']) ?></td>
                    <td><?php echo htmlspecialchars($usuario['usuario']) ?></td>
                    <td><?php echo htmlspecialchars($usuario['email']) ?></td>
                    <td>
                        <a href="<?php echo APP_URL ?>usuario/actualizar_usuario"
                           class="button is-rounded is-small is-link" >
                            <i class="fa-solid fa-pencil pr-1"></i> Actualizar</a>
                    </td>
                    <td>
                        <button class="button is-rounded is-warning is-small">
                            <i class="fa-solid fa-trash-can pr-1"></i> Elininar</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</section>