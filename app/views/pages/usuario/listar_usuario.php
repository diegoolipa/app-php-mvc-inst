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
            <a href="#"
               class="button is-rounded is-success">
                Nuevo Usuario
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
                        <a href="#" class="button is-rounded is-small is-link" >Actualizar</a>
                    </td>
                    <td>
                        <button class="button is-rounded is-warning is-small">Elininar</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</section>