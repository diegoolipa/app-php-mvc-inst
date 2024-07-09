<?php
use app\controllers\UsuarioController;
use app\models\MainModel;

$usuarioController = new UsuarioController();
$mainModel = new MainModel();

$id_usuario = $mainModel->limpiarCadena($url_vista[2]);

$usuario = $usuarioController->listarUsuarioPorId($id_usuario);

?>
<section class="section">
    <div class="columns is-fluid is-vcentered is-mobile">
        <div class="column">
            <h1 class="title">Usuario</h1>
            <h2 class="subtitle">Actualizar usuario</h2>
        </div>
        <div class="column is-narrow">
            <a href="<?php echo APP_URL ?>usuario/listar_usuario"
               class="button is-rounded is-success">
                <i class="fa-solid fa-left-long pr-1"></i> Regresar atrás
            </a>
        </div>
    </div>
    <div>
        <form action="<?php echo APP_URL ?>app/ajax/usuarioAjax.php"
              class="FormularioAjax"
              method="POST"
              autocomplete="off">
            <input
                    type="hidden"
                    name="modulo_usuario"
                    value="actualizar"
            >
            <input
                    type="hidden"
                    name="id_usuario"
                    value="<?php echo $usuario['id_usuario'] ?>"
            >
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <label class="label">
                            <i class="fa-solid fa-cable-car"></i>
                            Nombres
                        </label>
                        <input
                                class="input is-rounded"
                                type="text"
                                placeholder="Nombres"
                                required
                                name="usuario_nombre"
                                value="<?php echo $usuario['nombres'] ?>"
                        />
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <label class="label">
                            <i class="fa-solid fa-cable-car"></i>
                            Apellidos
                        </label>
                        <input
                                class="input is-rounded"
                                type="text"
                                placeholder="Apellidos"
                                required
                                name="usuario_apellido"
                                value="<?php echo $usuario['apellidos'] ?>"
                        />
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <label class="label">
                            <i class="fa-solid fa-cable-car"></i>
                            Usuario
                        </label>
                        <input
                                class="input is-rounded"
                                type="text"
                                placeholder="Usuario"
                                required
                                name="usuario_usuario"
                                value="<?php echo $usuario['usuario'] ?>"
                        />
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <label class="label">
                            <i class="fa-solid fa-cable-car"></i>
                            Email
                        </label>
                        <input
                                class="input is-rounded"
                                type="email"
                                placeholder="Email"
                                name="usuario_email"
                                value="<?php echo $usuario['email'] ?>"
                        />
                    </div>
                </div>
            </div>

            <div class="has-text-centered">
                <button
                        type="reset"
                        class="button is-link is-rounded">
                    Limpiar
                </button>
                <button
                        type="submit"
                        class="button is-info is-rounded">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</section>